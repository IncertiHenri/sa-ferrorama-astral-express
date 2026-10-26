<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$hora = $_POST["hora"];
$origem = $_POST["origem"];
$destino = $_POST["destino"];
$tempo = $_POST["tempo"];
$id_rota = $_GET["id"];
$id_usuario = $_POST["usuario_associado"];
$id_trem = $_POST["trem_associado"];

$sql = "UPDATE rota SET hora = ?, origem = ?, destino = ?, tempo = ?, id_usuario = ?
        WHERE id_rota = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssii", $hora, $origem, $destino, $tempo, $id_usuario, $id_rota);
$stmt->execute();

$sql = "UPDATE trem_rota SET id_trem = ? WHERE id_rota = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_trem, $id_rota);
$stmt->execute();

header("Location: visualizacao_rotas.php");
exit();

?>