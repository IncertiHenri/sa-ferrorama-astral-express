<?php

session_start();

require_once('../infra/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['tipo'] = $usuario['perfil'];
            $_SESSION['user'] = ucfirst($usuario['usuario']);

            header('Location: tela_inicial.php');
            exit();

        } else {
            echo "<script>alert('E-mail ou senha incorretos, tente novamente!');
        window.location.href = '../index.php';
        </script>";
        }
        exit();
    } else {
        echo "<script>alert('E-mail ou senha incorretos, tente novamente!');
        window.location.href = '../index.php';
        </script>";
    }
    exit();
}


?>