<?php
    $str = "mysql:host=localhost;dbname=projetophp";
    $user = "root";
    $pwd = "";

    try{
        $con = new PDO($str, $user, $pwd);
    } catch(PDOException $e){
        die("Não foi possivel conectar o banco!");
    }