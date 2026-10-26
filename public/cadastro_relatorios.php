<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || ($_SESSION['tipo'] !== 'admin')) {
    header("Location: tela_login.php");
    exit();

}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Cadastro de Relatórios</title>
</head>

<body id="body_cadastro_relatorios">

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

            <button class="botao_menu" id="botao_menu_cadastro_sensores" onclick="visualizacaoSensores()">
                Visualização de Sensores
            </button>

            <button class="botao_menu" id="botao_menu_cadastro_trens" onclick="visualizacaoTrens()">
                Visualização de Trens
            </button>

            <button class="botao_menu" id="botao_menu_cadastro_rotas" onclick="visualizacaoRotas()">
                Visualização de Rotas
            </button>

            <button class="botao_menu_atual" id="botao_menu_cadastro_relatorios" onclick="cadastroRelatorios()">
                Visualização de Relatórios
            </button>

            <button class='botao_menu' id='botao_menu_usuarios_cadastrados' onclick='usuariosCadastrados()'>
                Usuários Cadastrados
            </button>

        </div>
    </div>

    <main>
        <div class="fundo_form_cadastros">
            <div>
                <h1 class="titulo_relatorios">Visualização de Relatórios</h1>
                <div class="borda_verde_flex">
                    <div id="filtros_relatorios">
                        <h1 class="titulo_relatorios">Filtros<img class="imagem_filtrar" src="../assets/img/filtro.png"
                                alt="filtro"></h1>
                    </div>
                    <div>
                        <form action="#" class="flex" id="formulario_visualizacao_relatorios">
                            <div class="flex_column">
                                <label for="data_inicio" class="label_form">Data início:</label>
                                <input type="date" name="data_inicio" class="input_form">
                            </div>
                            <div class="flex_column">
                                <label for="data_fim" class="label_form">Data fim:</label>
                                <input type="date" name="data_fim" class="input_form">
                            </div>
                            <div class="flex_column">
                                <label for="tipo_relatorio" class="label_form">Tipo de relatório:</label>
                                <select name="tipo_relatorio" id="texto_cadastros" class="input_form">
                                    <option value="1">Todos</option>
                                    <option value="2">X</option>
                                    <option value="3">X</option>
                                    <option value="4">X</option>
                                    <option value="5">X</option>
                                </select>
                            </div>
                            <div class="flex_column">
                                <label for="tipo_falha" class="label_form">Tipo de falha:</label>
                                <select name="tipo_falha" id="tipo_falha" class="input_form">
                                    <option value="1">Todos</option>
                                    <option value="2">X</option>
                                    <option value="3">X</option>
                                    <option value="4">X</option>
                                    <option value="5">X</option>
                                </select>
                            </div>

                            <button type="submit" id="botao_formulario_visualizar_relatorios">Filtrar</button>
                        </form>
                    </div>
                </div>

                <h1 class="titulo_relatorios">Últimos Relatórios</h1>


                <div>
                    <div class="borda_verde_flex">
                        <div class="flex" id="ultimos_relatorios">
                            <h1 class="texto_cadastros">Nome</h1>
                            <h1 class="texto_cadastros">Data de Criação</h1>
                            <h1 class="texto_cadastros">Tipo de relatório</h1>
                            <h1 class="texto_cadastros">Ações</h1>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="borda_verde_flex">

                        </div>
                        <div class="borda_verde_flex">

                        </div>
                        <div class="borda_verde_flex">

                        </div>
                        <div class="borda_verde_flex">

                        </div>
                    </div>
                </div>




            </div>
        </div>
    </main>

    <script src="../scripts/script.js"></script>

</body>

</html>