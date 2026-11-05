<?php
$str = 'mysql:host=localhost;dbname=projetophp;charset=utf8mb4';
$user = 'root';
$pwd = '';

$con = new PDO($str, $user, $pwd, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);