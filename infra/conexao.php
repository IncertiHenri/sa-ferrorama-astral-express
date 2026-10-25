<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "sistema_ferroviario_astral_express";
$port = 3308;

$conn = new mysqli($host, $user, $pass, $database, $port);

if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}
;

$conn->set_charset("utf8mb4");
?>
