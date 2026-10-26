<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: tela_login.php");
    exit();
}

if (!isset($_SESSION['usuario']) || ($_SESSION['tipo'] !== 'admin')) {
    header("Location: tela_login.php");
    exit();

}

$sql_trem = "SELECT * FROM trem";
$resultado_trem = mysqli_query($conn, $sql_trem);

if ($resultado_trem === false) {
    die('Erro na procura de trens: ' . mysqli_error($conn));
}

$sql_usuario = "SELECT * FROM usuario";
$resultado_usuario = mysqli_query($conn, $sql_usuario);

if ($resultado_usuario === false) {
    die('Erro na procura de usuários: ' . mysqli_error($conn));
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Cadastro de rotas</title>
</head>

<body id="cadastro_sensores">

    <div class="conteudo">

        <header>
            <div id="navbar">
                <p class="acesso_admin">Olá, <?php echo $_SESSION['user']; ?>!</p>
                <img src="../assets/img/usuario.png" alt="admin" class="imagem_usuario">
                <button id="botao_sair" onclick="sair()">Sair do Sistema</button>
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

                <button class="botao_menu_atual" id="botao_menu_cadastro_rotas" onclick="visualizacaoRotas()">
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

        <button id="botao_voltar" onclick="visualizacaoRotas()">
            Retornar
        </button>

        <main>

            <div class="fundo_form_cadastros">

                <div class="flex_column">

                    <div class="borda_verde_flex">
                        <h1 class="titulo_cadastro_form">Cadastro de rotas</h1>
                    </div>

                    <div class="inserir_dados_cadastro">

                        <form action="cadastrar_rota.php" method="POST" id="form_cadastro">
                            <div class="flex_column">

                                <div class="flex_column">
                                    <div class="flex_column" id="campos_cadastro_sensores">
                                        <div class="flex_column">
                                            <label for="hora" class="label_form">Data de Criação:</label>
                                            <input type="date" name="hora" class="input_form" required>
                                        </div>

                                        <div class="flex_column">
                                            <label for="origem" class="label_form">Origem:</label>
                                            <input type="text" name="origem" class="input_form" required>
                                        </div>

                                        <div class="flex_column">
                                            <label for="destino" class="label_form">Destino:</label>
                                            <input type="text" name="destino" class="input_form" required>
                                        </div>
                                        <div class="flex_column">
                                            <label for="tempo" class="label_form">Tempo:</label>
                                            <input type="time" name="tempo" class="input_form" required>
                                        </div>
                                        <div class="flex_column">
                                            <label for="trem_associado" class="label_form">Trem
                                                Associado:</label>
                                            <select name="trem_associado" class="input_form" required>
                                                <option value="">Selecione um Trem</option>
                                                <?php
                                                while ($trem = mysqli_fetch_assoc($resultado_trem)) {
                                                    echo "<option value='{$trem['id_trem']}'>{$trem['nome_trem']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="flex_column">
                                            <label for="usuario_associado" class="label_form">Usuário
                                                Associado:</label>
                                            <select name="usuario_associado" class="input_form" required>
                                                <option value="">Selecione um Usuário</option>
                                                <?php
                                                while ($usuario = mysqli_fetch_assoc($resultado_usuario)) {
                                                    echo "<option value='{$usuario['id_usuario']}'>{$usuario['nome']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
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