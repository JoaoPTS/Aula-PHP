<?php
    require_once "../database/conexao.php";
    require_once "../interface/cadastro.php";
    require_once "pessoa.php";

    class Funcionario extends Pessoa implements Cadastro
    {
        public string $cargo;
        public float $salario;
        public string $dataAdmissao;
        public function cadastrar(): bool
        {
            global $con;

            if (parent::cadastrar()) {
                $codPessoa = $con->lastInsertId();
                $sql = "INSERT INTO funcionario (codPessoa, cargo, salario, dataAdmissao) VALUES (:codPessoa, :cargo, :salario, :dataAdmissao)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':codPessoa', $codPessoa);
                $stmt->bindParam(':cargo', $this->cargo);
                $stmt->bindParam(':salario', $this->salario);
                $stmt->bindParam(':dataAdmissao', $this->dataAdmissao);

                return $stmt->execute();
            }
            return false;
        }
    }