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

    <title>Cadastro de Relatórios</title>
</head>

<body id="body_cadastro_relatorios">

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
            <div class="fundo_cadastros">
                <div id="relatorios">
                    <h1 class="titulo_relatorios">Visualização de Relatórios</h1>
                    <div class="borda_verde_flex">
                        <div id="filtros_relatorios">
                            <h1 class="titulo_relatorios">Filtros</h1>
                        </div>
                        <div>
                            <form action="#" class="flex" id="formulario_visualizacao_relatorios">
                                <div class="flex_column">
                                    <label for="data_inicio" class="label_form">Data início:</label>
                                    <input type="date" name="data_inicio" class="input_visualizacao">
                                </div>
                                <div class="flex_column">
                                    <label for="data_fim" class="label_form">Data fim:</label>
                                    <input type="date" name="data_fim" class="input_visualizacao">
                                </div>
                                <div class="flex_column">
                                    <label for="tipo_relatorio" class="label_form">Tipo de relatório:</label>
                                    <select name="tipo_relatorio" id="texto_cadastros" class="input_visualizacao">
                                        <option value="1">Todos</option>
                                        <option value="2">X</option>
                                        <option value="3">X</option>
                                        <option value="4">X</option>
                                        <option value="5">X</option>
                                    </select>
                                </div>
                                <div class="flex_column">
                                    <label for="tipo_falha" class="label_form">Tipo de falha:</label>
                                    <select name="tipo_falha" id="tipo_falha" class="input_visualizacao">
                                        <option value="1">Todos</option>
                                        <option value="2">X</option>
                                        <option value="3">X</option>
                                        <option value="4">X</option>
                                        <option value="5">X</option>
                                    </select>
                                </div>
                                <div class="sem_flex" id="local_botao_relatorios">
                                    <button type="submit" id="filtrar_relatorios">
                                        <h2>Filtrar</h2>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h1 class="titulo_relatorios">Últimos Relatórios</h1>

                    <div class="borda_verde">

                        <table>

                            <div class="tabela">

                                <tr>
                                    <div class="flex" id="ultimos_relatorios">
                                        <td>Nome</td>
                                        <td>Data de Criação</td>
                                        <td>Tipo de relatório</td>
                                        <td>Ações</td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="flex">
                                        <th></th>

                                        <th></th>

                                        <th></th>

                                        <th></th>
                                    </div>
                                </tr>



                        </table>
                    </div>
                </div>
            </div>
    </div>
    </main>

    <script src="../scripts/script.js"></script>
    </div>
</body>

</html>