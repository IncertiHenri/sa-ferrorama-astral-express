<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Cadastro de sensores</title>
</head>

<body>

<div class="conteudo">

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

                <button class="botao_menu" id="botao_menu_monitoramento" onclick="monitoramentoTempoReal()">
                    Monitoramento em Tempo Real
                </button>

                <button class="botao_menu_atual" id="botao_menu_cadastro_sensores" onclick="visualizacaoSensores()">
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

    <button id="botao_voltar" onclick="visualizacaoSensores()">
        Retornar
    </button>

    <main>

        <div class="fundo_form_cadastros">
            <div class="flex_column">
            <div class="borda_verde_flex">
                <h1 class="titulo_cadastro_form">Cadastro de sensores</h1>
            </div>
            <div class="inserir_dados_cadastro">

                <form action="#" id="form_cadastro">

                    <div class="flex_column">
                            <div class="flex_column">
                                <label for="nome" class="label_form">Nome:</label>
                                <input type="text" name="nome" class="input_form">
                            </div>

                            <div class="flex_column">
                                <label for="loc" class="label_form">Localização:</label>
                                <input type="text" name="loc" class="input_form">
                            </div>

                            <div class="flex_column">
                                <label for="dado" class="label_form">Tipo de dado:</label>
                                <select name="dado" class="input_form">
                                    <option value="">Selecione</option>
                                    <option value="1">Velocidade</option>
                                    <option value="2">Temperatura</option>
                                    <option value="3">Falha</option>
                                </select>
                            </div>
                        
    </div>
</div>
                            <div class="borda_verde_flex">
                <button type="submit" class="botao_form_cadastro">Cadastrar</button>
            </div>
                    

                    
                </form>

            
        </div>
        </div>
        
    </main>

    <script src="../scripts/script.js"></script>
</div>
</body>

</html>