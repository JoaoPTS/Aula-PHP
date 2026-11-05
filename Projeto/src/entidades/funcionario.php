<?php

require_once __DIR__ . '/entidade.php';
require_once __DIR__ . '/pessoa.php';

class Funcionario extends Pessoa
{
    private string $cargo;
    private float $salario;
    private string $dataAdmissao;

    public function __construct(
        string $nome,
        string $cpf,
        string $rg,
        string $telefone,
        string $email,
        string $endereco,
        int $numero,
        string $bairro,
        string $cargo,
        float $salario,
        string $dataAdmissao
    ) {
        parent::__construct(
            $nome,
            $cpf,
            $rg,
            $telefone,
            $email,
            $endereco,
            $numero,
            $bairro
        );

        $this->cargo = $cargo;
        $this->salario = $salario;
        $this->dataAdmissao = $dataAdmissao;
    }

    public function tabelasAssociadas(): array
    {
        return [
            new Pessoa(
                $this->obterNome(),
                $this->obterCpf(),
                $this->obterRg(),
                $this->obterTelefone(),
                $this->obterEmail(),
                $this->obterEndereco(),
                $this->obterNumero(),
                $this->obterBairro()
            ),
        ];
    }

    public function obterCargo(): string
    {
        return $this->cargo;
    }

    public function obterSalario(): float
    {
        return $this->salario;
    }

    public function obterDataAdmissao(): string
    {
        return $this->dataAdmissao;
    }

    protected function definirTabela(): string
    {
        return 'Funcionario';
    }

    protected function definirChavePrimaria(): string
    {
        return 'codFuncionario';
    }

    protected function dadosParaPersistencia(): array
    {
        return [
            'cargo' => $this->cargo,
            'salario' => $this->salario,
            'dataAdmissao' => $this->dataAdmissao,
        ];
    }
}
