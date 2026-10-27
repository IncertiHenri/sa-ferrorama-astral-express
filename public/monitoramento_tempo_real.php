<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: tela_login.php");
    exit();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Monitoramento em Tempo Real</title>
</head>

<header>
    <div id="navbar">
        <p class="acesso_admin">Olá, <?php echo $_SESSION['user']; ?>!</p>
        <img src="../assets/img/usuario.png" alt="admin" class="imagem_usuario">
        <div class="sem_flex">
            <button id="botao_sair" onclick="sair()">Sair do Sistema</button>
        </div>
    </div>
</header>

<div class="menu">
    <div class="conteiner_menu_logo">
        <img src="../assets/img/trem.PNG" alt="trem" class="trem_menu">

        <div class="inline_block">
            <div class="inline_flex">
                <h1 class="titulo_menu">ASTRAL</h1>
                <h4 class="titulo2_menu">EXPRESS</h4>
            </div>

            <p class="subtitulo_menu">SISTEMA DE MONITORAMENTO FERROVIÁRIO</p>
        </div>
    </div>

    <div id="botoes_menu">
        <button class="botao_menu" id="botao_menu_tela_inicial" onclick="telaInicial()">
            Tela Inicial
        </button>

        <button class='botao_menu' id='botao_menu_landing_page' onclick='landingPage()'>
            Landing Page
        </button>

        <button class="botao_menu_atual" id="botao_menu_monitoramento" onclick="monitoramentoTempoReal()">
            Monitoramento em Tempo Real
        </button>

        <button class="botao_menu" id="botao_menu_cadastro_sensores" onclick="visualizacaoSensores()">
            Visualização de Sensores
        </button>

        <button class="botao_menu" id="botao_menu_cadastro_trens" onclick="visualizacaoTrens()">
            Visualização de Trens
        </button>

        <button class="botao_menu" id="botao_menu_cadastro_rotas" onclick="visualizacaoRotas()">
            Visualização de Rotas
        </button>

        <button class="botao_menu" id="botao_menu_cadastro_relatorios" onclick="cadastroRelatorios()">
            Visualização de Relatórios
        </button>

        <button class='botao_menu' id='botao_menu_usuarios_cadastrados' onclick='usuariosCadastrados()'>
            Usuários Cadastrados
        </button>

    </div>

</div>

<script src="../scripts/script.js"></script>

</body>

</html>