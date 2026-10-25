<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Visualização Sensores</title>
</head>

<body id="visualizacao_sensores">

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

        <main>

            <div class="fundo_cadastros">

                <div class="cadastros">

                    <div class="borda_verde_flex">
                        <h2 id="titulo_tabela">Visualização de Sensores</h2>
                    </div>

                    <div class="tabela">

                        <div class="borda_verde">

                            <table>

                                <tr>
                                    <td>ID do Sensor</td>
                                    <td>Localização</td>
                                    <td>Tipo de Dado</td>
                                    <?php if ($_SESSION['tipo'] === 'admin') {
                                        echo "<td>Ação</td>";
                                    } ?>
                                </tr>


                            </table>

                        </div>
                    </div>
                    <?php if ($_SESSION['tipo'] === 'admin') { ?>
                        <div class="borda_verde_flex">
                            <a href="cadastro_sensores.php"><button id="botao_sensor_novo">
                                    Cadastrar Novo Sensor
                                </button></a>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </main>

        <script src="../scripts/script.js"></script>

    </div>

</body>

</html>