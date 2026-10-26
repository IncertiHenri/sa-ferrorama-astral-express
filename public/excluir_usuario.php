<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$id = $_GET["id"];

$sql = "SELECT id_usuario FROM trem WHERE id_usuario = ? UNION SELECT id_usuario FROM rota WHERE id_usuario = ? UNION SELECT id_usuario FROM sensor WHERE id_usuario = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iii", $id, $id, $id);
mysqli_stmt_execute($stmt);

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "<script>
        alert('Não é possível excluir esse usuário, pois ele possui registros vinculados!');
        window.location.href = 'usuarios_cadastrados.php';
    </script>";
    exit();
} else {

    $sql = "DELETE FROM usuario WHERE id_usuario = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    header("Location: usuarios_cadastrados.php");
}

?>