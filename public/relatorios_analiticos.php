<?php

include("../infra/conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: tela_login.php");
    exit();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios Analíticos</title>
</head>

<body>

    <script src="../scripts/script.js"></script>

</body>

</html>