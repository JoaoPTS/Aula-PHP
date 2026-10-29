<?php
    require_once "../database/conexao.php";

    interface Cadastro
    {
        public function cadastrar(): bool;
    }