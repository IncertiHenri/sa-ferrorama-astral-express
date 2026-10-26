<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$usuario = $_POST["funcionario"];
$nome_trem = $_POST["nome_trem"];
$modelo = $_POST["modelo"];
$capacidade = $_POST["capacidade"];
$status = $_POST["status"];
$id = $_GET["id"];

if (mb_strlen($nome_trem) < 3 || !preg_match('/^[\p{L} ]+$/u', $nome_trem)) {
    echo "<script>
        alert('Nome inválido! O nome do trem deve conter apenas letras e no mínimo 3 caracteres.');
        window.location.href = 'formulario_editar_trem.php';
    </script>";
    exit;

} else if (mb_strlen($modelo) < 3) {
    echo "<script>
        alert('Modelo inválido! O modelo deve conter pelo menos 3 caracteres.');
        window.location.href = 'formulario_editar_trem.php';
    </script>";
    exit;

} else if (!is_numeric($capacidade) || $capacidade <= 0) {
    echo "<script>
        alert('Capacidade inválida! Informe um valor numérico maior que zero.');
        window.location.href = 'formulario_editar_trem.php';
    </script>";
    exit;

} else if (!in_array($status, ['ativo', 'inativo'])) {
    echo "<script>
        alert('Status inválido! Escolha um status válido.');
        window.location.href = 'formulario_editar_trem.php';
    </script>";
    exit;
}


$sql = "UPDATE trem SET id_usuario = ?, nome_trem = ?, modelo = ?, capacidade = ?, status = ? WHERE id_trem = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("issisi", $usuario, $nome_trem, $modelo, $capacidade, $status, $id);

$stmt->execute();

header("Location: visualizacao_trens.php");
exit;

?>