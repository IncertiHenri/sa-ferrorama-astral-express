
<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro_usuarios.php");
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

if (mb_strlen($nome) < 3 || !preg_match('/^[\p{L}\s]+$/u', $nome)) {
    echo "<script>
        alert('Nome inválido! O nome deve conter apenas letras e no mínimo 3 caracteres');
        window.location.href = 'cadastro_usuarios.php';
    </script>";
    exit();

} else if (strlen($usuario) < 5) {
    echo "<script>
        alert('Usuário inválido! O nome deve conter pelo menos 5 caracteres');
        window.location.href = 'cadastro_usuarios.php';
    </script>";
    exit();

} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        alert('E-mail inválido! Insira um e-mail válido');
        window.location.href = 'cadastro_usuarios.php';
    </script>";
    exit();

} else if (strlen($senha) < 8) {
    echo "<script>
        alert('Senha inválida! A senha deve conter no mínimo 8 caracteres');
        window.location.href = 'cadastro_usuarios.php';
    </script>";
    exit();
}

$sql_verificar = "SELECT usuario FROM usuario WHERE usuario = ?";

$stmt_verificar = mysqli_prepare($conn, $sql_verificar);

mysqli_stmt_bind_param($stmt_verificar, "s", $usuario);

mysqli_stmt_execute($stmt_verificar);

$resultado = mysqli_stmt_get_result($stmt_verificar);

if (mysqli_num_rows($resultado) > 0) {
    echo "<script>
        alert('Esse nome de usuário já está cadastrado!');
        window.location.href = 'cadastro_usuarios.php';
    </script>";
    exit();
}

mysqli_stmt_close($stmt_verificar);

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario 
(nome, usuario, email, senha, perfil, cep, logradouro, bairro, cidade) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Erro ao preparar consulta: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssss",
    $nome,
    $usuario,
    $email,
    $senha,
    $perfil,
    $cep,
    $logradouro,
    $bairro,
    $cidade
);

if (mysqli_stmt_execute($stmt)) {

    header("Location: ../public/usuarios_cadastrados.php");
    exit();

} else {

    echo "Erro ao cadastrar usuário: " . mysqli_stmt_error($stmt);

}

mysqli_stmt_close($stmt);

?>
