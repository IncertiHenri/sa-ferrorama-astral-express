<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Cadastro de trens</title>
</head>

<body id="cadastro_sensores">

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

                <button class="botao_menu_atual" id="botao_menu_cadastro_trens" onclick="visualizacaoTrens()">
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

        <button id="botao_voltar" onclick="visualizacaoTrens()">
            Retornar
        </button>

        <main>

            <div class="fundo_form_cadastros">
                <div class="flex_column">
                    <div class="borda_verde_flex">
                        <h1 class="titulo_cadastro_form">Cadastro de trens</h1>
                    </div>
                    <div class="inserir_dados_cadastro">

                        <form action="cadastrar_trem.php" id="formulario_cadastro_trens" method="POST">

                            <div class="flex_column">
                                <div class="flex_column">
                                    <label for="nome_trem" class="label_form">Nome:</label>
                                    <input type="text" name="nome_trem" class="input_form" required>
                                </div>

                                <div class="flex_column">
                                    <label for="modelo" class="label_form">Modelo:</label>
                                    <input type="text" name="modelo" class="input_form" required>
                                </div>

                                <div class="flex_column">
                                    <label for="capacidade" class="label_form">Capacidade:</label>
                                    <input type="number" name="capacidade" class="input_form" required>
                                </div>

                                <div class="flex_column">
                                    <label for="status" class="label_form">Status</label>
                                    <select name="status" class="input_form" required>
                                        <option value="">Selecione</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                </div>

                                <div class="flex_column">
                                    <label for="funcionario" class="label_form">Funcionário</label>
                                    <select name="funcionario" class="input_form" required>
                                        <option value="">Selecione</option>
                                        <?php

                                        $sql = "SELECT id_usuario, usuario FROM usuario";

                                        $busca = $conn->query($sql);

                                        while ($usuario = mysqli_fetch_assoc($busca)) {
                                            echo "<option value='" . $usuario["id_usuario"] . "'>" . $usuario["usuario"] . "</option>";
                                        }
                                        ?>
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
    </div>
    </main>
    <script src="../scripts/script.js"></script>

    </div>

</body>

</html>