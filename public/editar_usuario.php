<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$perfil = $_POST["perfil"];
$id = $_GET["id"];

if (mb_strlen($nome) < 3 || !preg_match('/^[\p{L}]+$/u', $nome)) {
    echo "<script>alert('Nome inválido! O nome deve conter apenas letras e no mínimo 3');
    window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit;
} else if (strlen($usuario) < 5) {
    echo "<script>alert('Usuário inválido! O nome deve conter pelo menos 5 caracteres');
    window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('E-mail inválido! Insira um E-mail válido');
    window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit;
} else if (strlen($senha) < 8) {
    echo "<script>alert('Senha inválida! A senha deve conter no mínimo 8 caracteres');
    window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit;
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE usuario SET nome = ?, usuario = ?, senha = ?, email = ?, perfil = ? WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssssi", $nome, $usuario, $senha, $email, $perfil, $id);

$stmt->execute();

header("Location: usuarios_cadastrados.php");
exit;

?>