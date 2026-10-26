<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location:tela_login.php");
    exit();
}

$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$perfil = $_POST["perfil"];
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];

if (mb_strlen($nome) < 3 || !preg_match('/^[\p{L}]+$/u', $nome)) {
    echo "<script>alert('Nome inválido! O nome deve conter apenas letras e no mínimo 3');
    window.location.href = 'cadastro_usuarios.php?id=$id';
    </script>";
    exit;
} else if (strlen($usuario) < 5) {
    echo "<script>alert('Usuário inválido! O nome deve conter pelo menos 5 caracteres');
    window.location.href = 'cadastro_usuarios.php?id=$id';
    </script>";
    exit;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('E-mail inválido! Insira um E-mail válido');
    window.location.href = 'cadastro_usuarios.php?id=$id';
    </script>";
    exit;
} else if (strlen($senha) < 8) {
    echo "<script>alert('Senha inválida! A senha deve conter no mínimo 8 caracteres');
    window.location.href = 'cadastro_usuarios.php?id=$id';
    </script>";
    exit;
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome, usuario, email, senha, perfil, cep, logradouro, bairro, cidade, uf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssssssssss", $nome, $usuario, $email, $senha, $perfil, $cep, $logradouro, $bairro, $cidade, $uf);

mysqli_stmt_execute($stmt);

header("Location: ../public/usuarios_cadastrados.php");
exit;

?>