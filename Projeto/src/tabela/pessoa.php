<?php
    require_once "../database/conexao.php";
    require_once "..cadastro/cadastro.php";
    class Pessoa implements Cadastro 
    {
        public string $nome;
        public string $cpf;
        public string $rg;
        public string $email;
        public string $telefone;
        public string $endereco;        

        public function cadastrar(): bool
        {
            global $con;
            $sql = "INSERT INTO pessoa (nome, cpf, rg, email, telefone, endereco) VALUES (:nome, :cpf, :rg, :email, :telefone, :endereco)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':endereco', $this->endereco);

            return $stmt->execute();
        }
    }
