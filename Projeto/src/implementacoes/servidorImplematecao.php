<?php

require_once __DIR__ . '/../interfaces/servidorInterface.php';
require_once __DIR__ . '/../entidades/entidade.php';

class ServidorImplementacao implements ServidorInterface
{
    public function __construct(private PDO $conexao)
    {
    }

    public function executarSql(string $sql, array $parametros = []): array
    {
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($parametros);

            $temResultado = $stmt->columnCount() > 0;
            $resultado = $temResultado ? $stmt->fetchAll() : true;
            $idInserido = !$temResultado && preg_match('/^\s*INSERT\b/i', $sql) === 1
                ? $this->conexao->lastInsertId()
                : null;

            return [
                'sucesso' => true,
                'erro' => null,
                'resultado' => $resultado,
                'linhasAfetadas' => $stmt->rowCount(),
                'idInserido' => $idInserido === '0' ? null : $idInserido,
            ];
        } catch (PDOException $erro) {
            return [
                'sucesso' => false,
                'erro' => $erro->getMessage(),
                'resultado' => false,
                'linhasAfetadas' => 0,
                'idInserido' => null,
            ];
        }
    }

    public function consultar(
        string $tabela,
        array $campos = ['*'],
        array $condicoes = []
    ): array {
        try {
            if ($campos === []) {
                throw new InvalidArgumentException('Informe ao menos um campo para consultar.');
            }

            $camposSql = array_map(
                fn ($campo): string => $campo === '*'
                    ? '*'
                    : $this->identificador((string) $campo),
                $campos
            );
            $where = [];
            $parametros = [];

            foreach ($condicoes as $campo => $valor) {
                $coluna = $this->identificador((string) $campo);

                if ($valor === null) {
                    $where[] = $coluna . ' IS NULL';
                    continue;
                }

                $parametro = ':consulta_' . count($parametros);
                $where[] = $coluna . ' = ' . $parametro;
                $parametros[$parametro] = $valor;
            }

            $sql = 'SELECT ' . implode(', ', $camposSql)
                . ' FROM ' . $this->identificador($tabela);

            if ($where !== []) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($parametros);

            return [
                'sucesso' => true,
                'erro' => null,
                'dados' => $stmt->fetchAll(),
            ];
        } catch (PDOException | InvalidArgumentException $erro) {
            return [
                'sucesso' => false,
                'erro' => $erro->getMessage(),
                'dados' => [],
            ];
        }
    }

    public function cadastrar(Entidade $entidade): int|string|null
    {
        $dados = $entidade->dados();

        if ($dados === []) {
            throw new InvalidArgumentException('Informe ao menos um campo para cadastrar.');
        }

        return $this->inserir(
            $entidade->nomeTabela(),
            $dados,
            $entidade->chavePrimaria()
        );
    }

    private function inserir(
        string $tabela,
        array $dados,
        ?string $chavePrimaria = null
    ): int|string|null {
        if ($dados === []) {
            throw new InvalidArgumentException('Informe ao menos um campo para cadastrar.');
        }

        $colunas = array_keys($dados);
        $colunasSql = array_map(
            fn ($coluna): string => $this->identificador((string) $coluna),
            $colunas
        );
        $parametros = array_map(
            static fn (int $indice): string => ':valor' . $indice,
            array_keys($colunas)
        );
        $valores = [];

        foreach ($colunas as $indice => $coluna) {
            $valores[$parametros[$indice]] = $dados[$coluna];
        }

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->identificador($tabela),
            implode(', ', $colunasSql),
            implode(', ', $parametros)
        );
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($valores);

        if ($chavePrimaria !== null && array_key_exists($chavePrimaria, $dados)) {
            return $dados[$chavePrimaria];
        }

        $id = $this->conexao->lastInsertId();

        return $id === '0' ? null : $id;
    }

    public function cadastrarComRelacionamento(
        array $entidades,
        array $dependencias
    ): array {
        if (count($entidades) < 2 || !array_is_list($entidades)) {
            throw new InvalidArgumentException(
                'Informe pelo menos duas entidades em uma lista ordenada.'
            );
        }

        foreach ($entidades as $indice => $entidade) {
            if (!$entidade instanceof Entidade) {
                throw new InvalidArgumentException(
                    'Todos os itens da cadeia devem ser entidades.'
                );
            }

            if ($indice === 0) {
                continue;
            }

            if (empty($dependencias[$indice]) || !is_array($dependencias[$indice])) {
                throw new InvalidArgumentException(
                    "Informe as dependências da entidade no índice {$indice}."
                );
            }

            foreach ($dependencias[$indice] as $chaveEstrangeira => $indiceOrigem) {
                if (
                    !is_string($chaveEstrangeira)
                    || !is_int($indiceOrigem)
                    || $indiceOrigem < 0
                    || $indiceOrigem >= $indice
                ) {
                    throw new InvalidArgumentException(
                        'Cada chave estrangeira deve apontar para uma entidade anterior.'
                    );
                }
            }
        }

        return $this->transacao(function () use ($entidades, $dependencias): array {
            $ids = [];

            foreach ($entidades as $indice => $entidade) {
                $dados = $entidade->dados();

                foreach ($dependencias[$indice] ?? [] as $chaveEstrangeira => $indiceOrigem) {
                    $dados[$chaveEstrangeira] = $ids[$indiceOrigem];
                }

                $id = $this->inserir(
                    $entidade->nomeTabela(),
                    $dados,
                    $entidade->chavePrimaria()
                );

                if ($id === null) {
                    throw new RuntimeException(
                        "Não foi possível obter a chave primária da entidade no índice {$indice}."
                    );
                }

                $ids[$indice] = $id;
            }

            return $ids;
        });
    }

    public function atualizar(
        Entidade $entidade,
        int|string $valorChave
    ): bool {
        $dados = $entidade->dados();
        if ($dados === []) {
            throw new InvalidArgumentException('Informe ao menos um campo para atualizar.');
        }

        $valores = [];
        $atribuicoes = [];

        foreach ($dados as $indice => $valor) {
            $coluna = (string) $indice;
            $parametro = ':valor' . count($valores);
            $atribuicoes[] = $this->identificador($coluna) . ' = ' . $parametro;
            $valores[$parametro] = $valor;
        }

        $valores[':valorChave'] = $valorChave;
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = :valorChave',
            $this->identificador($entidade->nomeTabela()),
            implode(', ', $atribuicoes),
            $this->identificador($entidade->chavePrimaria())
        );
        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute($valores);
    }

    public function excluir(
        Entidade $entidade,
        int|string $valorChave
    ): bool {
        $sql = sprintf(
            'DELETE FROM %s WHERE %s = :valorChave',
            $this->identificador($entidade->nomeTabela()),
            $this->identificador($entidade->chavePrimaria())
        );
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':valorChave' => $valorChave]);

        return $stmt->rowCount() > 0;
    }

    public function listar(Entidade $entidade): array
    {
        $stmt = $this->conexao->query(
            'SELECT * FROM ' . $this->identificador($entidade->nomeTabela())
        );

        return $stmt->fetchAll();
    }

    public function buscarPorId(
        Entidade $entidade,
        int|string $valorChave
    ): ?array {
        return $this->buscarPorCampo(
            $entidade,
            $entidade->chavePrimaria(),
            $valorChave
        );
    }

    public function buscarPorCampo(
        Entidade $entidade,
        string $campo,
        int|string $valor
    ): ?array {
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s = :valor LIMIT 1',
            $this->identificador($entidade->nomeTabela()),
            $this->identificador($campo)
        );
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':valor' => $valor]);
        $resultado = $stmt->fetch();

        return $resultado === false ? null : $resultado;
    }

    public function autenticar(string $login, string $senha): ?array
    {
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s = :login LIMIT 1',
            $this->identificador('Usuario'),
            $this->identificador('login')
        );
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':login' => $login]);
        $usuario = $stmt->fetch();

        if (
            $usuario === false
            || !isset($usuario['senha'])
            || !password_verify($senha, $usuario['senha'])
        ) {
            return null;
        }

        unset($usuario['senha']);

        return $usuario;
    }

    public function transacao(callable $operacao): mixed
    {
        if ($this->conexao->inTransaction()) {
            return $operacao();
        }

        $this->conexao->beginTransaction();

        try {
            $resultado = $operacao();

            if ($resultado === false) {
                $this->conexao->rollBack();
                return false;
            }

            $this->conexao->commit();

            return $resultado;
        } catch (Throwable $erro) {
            if ($this->conexao->inTransaction()) {
                $this->conexao->rollBack();
            }

            throw $erro;
        }
    }

    private function identificador(string $nome): string
    {
        if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $nome)) {
            throw new InvalidArgumentException('Nome de tabela ou coluna inválido.');
        }

        return '`' . $nome . '`';
    }
}
