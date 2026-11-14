
<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

// RECEBER DADOS
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: usuarios_cadastrados.php");
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

// VERIFICAR SE O USUÁRIO EXISTE
$sql_id = "SELECT id_usuario, senha FROM usuario WHERE id_usuario = ?";

$stmt_id = mysqli_prepare($conn, $sql_id);

mysqli_stmt_bind_param($stmt_id, "i", $id);

mysqli_stmt_execute($stmt_id);

$resultado_id = mysqli_stmt_get_result($stmt_id);

$dados_usuario = mysqli_fetch_assoc($resultado_id);

if (!$dados_usuario) {
    echo "<script>
        alert('Usuário não encontrado!');
        window.location.href = 'usuarios_cadastrados.php';
    </script>";
    exit();
}

mysqli_stmt_close($stmt_id);

// VALIDAÇÃO DO NOME
if (mb_strlen($nome) < 3 || !preg_match('/^[\p{L}\s]+$/u', $nome)) {

    echo "<script>
        alert('Nome inválido! O nome deve conter apenas letras e no mínimo 3 caracteres');
        window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit();

} else if (strlen($usuario) < 5) {

    echo "<script>
        alert('Usuário inválido! O nome deve conter pelo menos 5 caracteres');
        window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit();

} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo "<script>
        alert('E-mail inválido! Insira um e-mail válido');
        window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit();

} else if (!empty($senha) && strlen($senha) < 8) {

    echo "<script>
        alert('Senha inválida! A senha deve conter no mínimo 8 caracteres');
        window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit();
}

// VERIFICAR USUÁRIO DUPLICADO
$sql_verificar = "SELECT id_usuario FROM usuario WHERE usuario = ? AND id_usuario <> ?";

$stmt_verificar = mysqli_prepare($conn, $sql_verificar);

mysqli_stmt_bind_param($stmt_verificar, "si", $usuario, $id);

mysqli_stmt_execute($stmt_verificar);

$resultado = mysqli_stmt_get_result($stmt_verificar);

if (mysqli_num_rows($resultado) > 0) {

    echo "<script>
        alert('Esse nome de usuário já está cadastrado!');
        window.location.href = 'formulario_editar_usuario.php?id=$id';
    </script>";
    exit();
}

mysqli_stmt_close($stmt_verificar);

// VERIFICAR SENHA
if (!empty($senha)) {

    $senha = password_hash($senha, PASSWORD_DEFAULT);

} else {

    $senha = $dados_usuario["senha"];

}

// ATUALIZAR USUÁRIO
$sql = "UPDATE usuario SET
nome = ?,
usuario = ?,
senha = ?,
email = ?,
perfil = ?,
cep = ?,
logradouro = ?,
bairro = ?,
cidade = ?
WHERE id_usuario = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssssssssi",
    $nome,
    $usuario,
    $senha,
    $email,
    $perfil,
    $cep,
    $logradouro,
    $bairro,
    $cidade,
    $id
);

// EXECUTAR ATUALIZAÇÃO
if (mysqli_stmt_execute($stmt)) {

    header("Location: usuarios_cadastrados.php");
    exit();

} else {

    echo "Erro ao atualizar usuário: " . mysqli_stmt_error($stmt);

}

mysqli_stmt_close($stmt);

?>
