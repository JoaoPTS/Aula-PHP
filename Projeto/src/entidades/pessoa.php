<?php

require_once __DIR__ . '/entidade.php';

class Pessoa extends Entidade
{
    private string $nome;
    private string $cpf;
    private string $rg;
    private string $telefone;
    private string $email;
    private string $endereco;
    private int $numero;
    private string $bairro;

    public function __construct(
        string $nome,
        string $cpf,
        string $rg,
        string $telefone,
        string $email,
        string $endereco,
        int $numero,
        string $bairro
    ) {
        $this->nome = strtoupper($nome);
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->endereco = strtoupper($endereco);
        $this->numero = $numero;
        $this->bairro = strtoupper($bairro);
    }

    public function obterNome(): string
    {
        return $this->nome;
    }

    public function obterCpf(): string
    {
        return $this->cpf;
    }

    public function obterRg(): string
    {
        return $this->rg;
    }

    public function obterTelefone(): string
    {
        return $this->telefone;
    }

    public function obterEmail(): string
    {
        return $this->email;
    }

    public function obterEndereco(): string
    {
        return $this->endereco;
    }

    public function obterNumero(): int
    {
        return $this->numero;
    }

    public function obterBairro(): string
    {
        return $this->bairro;
    }

    protected function definirTabela(): string
    {
        return 'Pessoa';
    }

    protected function definirChavePrimaria(): string
    {
        return 'codPessoa';
    }

    protected function dadosParaPersistencia(): array
    {
        return [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
        ];
    }
}
