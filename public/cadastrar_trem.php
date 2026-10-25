<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$nome_trem = $_POST["nome_trem"];
$modelo = $_POST["modelo"];
$capacidade = $_POST["capacidade"];
$status = ucfirst($_POST["status"]);
$usuario = $_POST["funcionario"];


if (mb_strlen($nome_trem) < 3 || !preg_match('/^[\p{L} ]+$/u', $nome_trem)) {
    echo "<script>
        alert('Nome inválido! O nome do trem deve conter apenas letras e no mínimo 3 caracteres.');
        window.location.href = 'cadastro_trens.php';
    </script>";
    exit;

} else if (mb_strlen($modelo) < 3) {
    echo "<script>
        alert('Modelo inválido! O modelo deve conter pelo menos 3 caracteres.');
        window.location.href = 'cadastro_trens.php';
    </script>";
    exit;

} else if (!is_numeric($capacidade) || $capacidade <= 0) {
    echo "<script>
        alert('Capacidade inválida! Informe um valor numérico maior que zero.');
        window.location.href = 'cadastro_trens.php';
    </script>";
    exit;

} else if (!in_array($status, ['Ativo', 'Inativo'])) {
    echo "<script>
        alert('Status inválido! Escolha um status válido.');
        window.location.href = 'cadastro_trens.php';
    </script>";
    exit;
}

$sql = "INSERT INTO trem (nome_trem, modelo, capacidade, status, id_usuario) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssi", $nome_trem, $modelo, $capacidade, $status, $usuario);

$stmt->execute();

header("Location: visualizacao_trens.php");
exit;

?>