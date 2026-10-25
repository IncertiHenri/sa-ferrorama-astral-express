<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$hora = $_POST['hora'];
$origem = $_POST['origem'];
$destino = $_POST['destino'];
$tempo = $_POST['tempo'];
$id_usuario = $_POST['usuario_associado'];
$id_trem = $_POST['trem_associado'];

$sql = "INSERT INTO rota (hora, origem, destino, tempo, id_usuario)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $hora, $origem, $destino, $tempo, $id_usuario);


  if ($stmt->execute()) {

        $id_rota = $conn->insert_id;

        $sql = "INSERT INTO trem_rota (id_trem, id_rota)
                VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id_trem, $id_rota);

        if ($stmt->execute()) {
            header("Location: visualizacao_rotas.php");
            exit();
        } else {
            echo "Erro ao associar o trem à rota.";
        }

    } else {
        echo "Erro ao cadastrar a rota.";
        header("Location: cadastro_rota.php");
        exit();
    }

?>