<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$id = $_GET["id"];

$sql = "SELECT id_trem FROM sensor WHERE id_trem = ? UNION SELECT id_trem FROM trem_rota WHERE id_trem = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $id);
mysqli_stmt_execute($stmt);

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "<script>
        alert('Não é possível excluir esse trem, pois ele possui registros vinculados!');
        window.location.href = 'visualizacao_trens.php';
    </script>";
    exit();
} else {

    $sql = "DELETE FROM trem_rota WHERE id_trem = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $sql = "DELETE FROM trem WHERE id_trem = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    header("Location: visualizacao_trens.php");
}

?>