<?php

interface ServidorInterface
{
    /**
     * @return array{
     *     sucesso: bool,
     *     resultado: bool|array,
     *     linhasAfetadas: int,
     *     idInserido: string|null,
     *     erro: string|null
     * }
     */
    public function executarSql(string $sql, array $parametros = []): array;

    /**
     * @param string[] $campos
     * @param array<string, scalar|null> $condicoes
     * @return array{
     *     sucesso: bool,
     *     dados: array,
     *     erro: string|null
     * }
     */
    public function consultar(
        string $tabela,
        array $campos = ['*'],
        array $condicoes = []
    ): array;

    public function cadastrar(Entidade $entidade): int|string|null;

    public function cadastrarComRelacionamento(
        array $entidades,
        array $dependencias
    ): array;

    public function atualizar(
        Entidade $entidade,
        int|string $valorChave,
    ): bool;

    public function excluir(
        Entidade $entidade,
        int|string $valorChave
    ): bool;

    public function listar(Entidade $entidade): array;

    public function buscarPorId(
        Entidade $entidade,
        int|string $valorChave
    ): ?array;

    public function buscarPorCampo(
        Entidade $entidade,
        string $campo,
        int|string $valor
    ): ?array;

    public function autenticar(string $login, string $senha): ?array;

    public function transacao(callable $operacao): mixed;
}
