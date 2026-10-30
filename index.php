<?php

session_start();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/style.css?v=2">
    <title>Astral Express</title>
</head>

<body class="landing_page">
    <div id="landing_corpo">
      <div class="landing_conteudo">
        
            <div class="landing_logo">
                <img src="assets/img/trem.PNG" alt="trem" class="landing_trem">
                <div class="landing_identidade">
                    <div class="landing_nome">
                        <h1>ASTRAL</h1>
                        <h2>EXPRESS</h2>
                    </div>
                    <p>SISTEMA DE MONITORAMENTO FERROVIÁRIO</p>
                </div>
            </div>

            <p class="landing_destaque">TECNOLOGIA EM MOVIMENTO</p>

            <div class="landing_titulo">
                <h3> Uma nova visão para o <span>monitoramento</span> ferroviário. </h3>
            </div>


            <div class="landing_descricao">
                <p>
                    Acompanhe trens e rotas em um só lugar. Com sensores e registros periódicos, a Astral Express transforma dados
                    ferroviários em informações claras para uma operação mais eficiente e confiável.
                </p>
            </div>

            <button id="landing_botao" onclick="window.location.href='public/tela_login.php'">Acessar Login <span>→</span></button>

        <script src="scripts/script.js"></script>
     </div>


    </div>


</body>


</html>