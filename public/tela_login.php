<?php

session_start();


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Login</title>
</head>

<body>

    <div id="corpo_login">
        <div class="login_esquerdo">
            <div class="titulo_site">
                <img src="../assets/img/trem.PNG" alt="trem" class="trem">
                <div class="inline_block">
                    <div class="inline_flex">
                        <h1 class="titulo_login">ASTRAL</h1>
                        <h4 class="titulo2_login">EXPRESS</h4>
                    </div>
                    <p class="subtitulo_login">SISTEMA DE MONITORAMENTO FERROVIÁRIO</p>
                </div>
            </div>

            <div class="campo_login">

                <h3 class="titulo3">Faça login para continuar sua jornada!</h3>

                <form id="login" action="login.php" method="POST">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name='email'>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name='senha'>


                    <button type="submit" id="botao_login">Entrar</button>

                </form>

                <div>
                <button id="botao_login" onclick="window.location.href='../index.php'">
                    Voltar
                </button>

                </div>

            </div>
        </div>

        <div id="imagem_inicial">
            <img id="imagem_estacao" src="../assets/img/estacao_2.png" alt="estacao">
        </div>

        <script src="../scripts/script.js"></script>

    </div>

</body>

</html>