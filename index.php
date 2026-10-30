<?php

session_start();


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/style/style.css?v=2">
    <title>Login</title>
</head>

<body>

    <div id="corpo_login">
        <div class="login_esquerdo">
            <div class="titulo_site">
                <img src="assets/img/trem.PNG" alt="trem" class="trem">
                <div class="inline_block">
                    <div class="inline_flex">
                        <h1 class="titulo_login">ASTRAL</h1>
                        <h4 class="titulo2_login">EXPRESS</h4>
                    </div>
                    <p class="subtitulo_login">SISTEMA DE MONITORAMENTO FERROVIÁRIO</p>
                </div>
            </div>
            <p class="titulo_index">TECNOLOGIA EM MOVIMENTO</p>
            <div class="titulo_landing ">
                <h3> O sistema de monitoramento ferroviário do futuro. </h3>
            </div>
            <div class="descricao">
                <h2> Acompanhe trens e rotas em um só lugar. Com sensores e registros periódicos, a Astral Express transforma dados ferroviários <br> em informações claras para uma operação mais eficiente e confiável. </h2>
            </div>
        <div>
        <button id="botao_landing" onclick="window.location.href='public/tela_login.php'">Acesar Login</button>
        </div>
        </div>
        </div>

        <script src="scripts/script.js"></script>

    </div>

</body>

</html>