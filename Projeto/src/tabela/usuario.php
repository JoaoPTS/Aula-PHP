<?php
    require_once "../database/conexao.php";
    require_once "../interface/cadastro.php";
    class Usuario implements Cadastro 
    {
        public string $login;
        public string $senha;
        public int $codFuncionario;

        public function cadastrar(): bool
        {
            global $con;

            $sql = "INSERT INTO Usuario ('login', senha, codFuncionario) VALUES (:'login', :senha, :codFuncionario)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':login', $this->login);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':codFuncionario', $this->senha);

            return $stmt->execute();
        }
    }