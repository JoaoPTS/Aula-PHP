<?php

require_once __DIR__ . '/entidade.php';

class Usuario extends Entidade
{
    private string $Senha;
    private string $Login;
    private string $Funcao;
    private ?int $CodFuncionario = null;

    public function __construct(
        string $login,
        string $senha,
        string $funcao,
        int $codFuncionario
    ) {
        $this->Login = $login;
        $this->Senha = password_hash($senha, PASSWORD_DEFAULT);
        $this->Funcao = $funcao;
        $this->CodFuncionario = $codFuncionario;
    }

    protected function definirTabela(): string
    {
        return 'Usuario';
    }

    protected function definirChavePrimaria(): string
    {
        return 'codUsuario';
    }

    protected function dadosParaPersistencia(): array
    {
        $dados = [
            'login' => $this->Login,
            'senha' => $this->Senha,
            'funcao' => $this->Funcao,
        ];

        if ($this->CodFuncionario !== null) {
            $dados['codFuncionario'] = $this->CodFuncionario;
        }

        return $dados;
    }
}
