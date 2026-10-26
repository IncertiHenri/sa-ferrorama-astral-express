<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$id = $_GET["id"];

$sql = "SELECT id_rota FROM sensor WHERE id_rota = ? UNION SELECT id_rota FROM trem_rota WHERE id_rota = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $id);
mysqli_stmt_execute($stmt);

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "<script>
        alert('Não é possível excluir essa rota, pois ela possui registros vinculados!');
        window.location.href = 'visualizacao_rotas.php';
    </script>";
    exit();
} else {

    $sql = "DELETE FROM trem_rota WHERE id_rota = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $sql = "DELETE FROM rota WHERE id_rota = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: visualizacao_rotas.php");
        exit();

    } else {
        echo "Erro ao excluir a rota: " . mysqli_error($conn);
    }

}

?>