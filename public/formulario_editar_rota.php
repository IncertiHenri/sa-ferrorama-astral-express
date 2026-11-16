
<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

$id = $_GET["id"];

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

    $sql = "SELECT * FROM rota WHERE id_rota = $id";
    $result = mysqli_query($conn, $sql);
    $rota = mysqli_fetch_assoc($result);

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Atualizar Rota</title>
</head>

<body id="sessao_cadastro">

    <div class="conteudo">

        <header>
            <div id="navbar">
                <p class="acesso_admin">
                    Olá, <?php echo $_SESSION['user']; ?>!
                </p>

                <div class="sem_flex">
                    <button id="botao_sair" onclick="sair()">
                        Sair do Sistema
                    </button>
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

                    <p class="subtitulo_menu">
                        SISTEMA DE MONITORAMENTO FERROVIÁRIO
                    </p>

                </div>

            </div>

            <div id="botoes_menu">

                <button class="botao_menu" id="botao_menu_tela_inicial"
                    onclick="telaInicial()">
                    Tela Inicial
                </button>

                <button class="botao_menu" id="botao_menu_cadastro_trens"
                    onclick="visualizacaoTrens()">
                    Visualização de Trens
                </button>

                <button class="botao_menu_atual" id="botao_menu_cadastro_rotas"
                    onclick="visualizacaoRotas()">
                    Visualização de Rotas
                </button>

                <button class="botao_menu" id="botao_menu_usuarios_cadastrados"
                    onclick="usuariosCadastrados()">
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
                        <h1 class="titulo_cadastro_form">
                            Atualizar Rota
                        </h1>
                    </div>

                    <div class="inserir_dados_cadastro">

                        <form action="editar_rota.php?id=<?php echo urlencode($id); ?>"
                            method="POST"
                            id="formulario_edicao_rotas">

                            <div class="campos_lado_a_lado">

                                <div class="campo_form">

                                    <label for="hora" class="label_form">
                                        Data de Criação:
                                    </label>

                                    <input type="date" name="hora" id="hora"
                                        class="input_form" value="<?php echo $rota['hora']; ?>" required>

                                </div>

                                <div class="campo_form">

                                    <label for="origem" class="label_form">
                                        Origem:
                                    </label>

                                    <input type="text" name="origem" id="origem"
                                        class="input_form" value="<?php echo $rota['origem']; ?>" required>

                                </div>

                                <div class="campo_form">

                                    <label for="destino" class="label_form">
                                        Destino:
                                    </label>

                                    <input type="text" name="destino" id="destino"
                                        class="input_form" value="<?php echo $rota['destino']; ?>" required>

                                </div>

                                <div class="campo_form">

                                    <label for="tempo" class="label_form">
                                        Tempo:
                                    </label>

                                    <input type="time" name="tempo" id="tempo"
                                        class="input_form" value="<?php echo $rota['tempo']; ?>" required>

                                </div>

                                <div class="campo_form">

                                    <label for="trem_associado" class="label_form">
                                        Trem Associado:
                                    </label>

                                    <select name="trem_associado" id="trem_associado"
                                        class="input_form" required>

                                        <option value="">Selecione um Trem</option>

                                        <?php
                                        $sql_trem_associado = "SELECT id_trem FROM trem_rota WHERE id_rota = $id";
                                        $resultado_associado = mysqli_query($conn, $sql_trem_associado);
                                        $trem_associado = mysqli_fetch_assoc($resultado_associado);

                                        while ($trem = mysqli_fetch_assoc($resultado_trem)) {

                                            $selecionado = ($trem['id_trem'] == $trem_associado['id_trem']) ? 'selected' : '';

                                            echo "<option value='{$trem['id_trem']}' $selecionado>"
                                                . htmlspecialchars($trem['nome_trem']) .
                                                "</option>";
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="campo_form">

                                    <label for="usuario_associado" class="label_form">
                                        Usuário Associado:
                                    </label>

                                    <select name="usuario_associado" id="usuario_associado"
                                        class="input_form" value="<?php echo $rota['usuario_associado']; ?>" required>

                                        <option value="">Selecione um Usuário</option>

                                        <?php
                                        while ($usuario = mysqli_fetch_assoc($resultado_usuario)) {

                                        $selecionado = ($usuario['id_usuario'] == $rota['id_usuario']) ? 'selected' : '';

                                        echo "<option value='{$usuario['id_usuario']}' $selecionado>"
                                            . htmlspecialchars($usuario['nome']) .
                                            "</option>";
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="borda_verde_flex">
                        <button type="submit" form="formulario_edicao_rotas" class="botao_form_cadastro">
                            Atualizar
                        </button>
                    </div>

                </div>

            </div>

        </main>

        <script src="../scripts/script.js"></script>

    </div>

</body>

</html>
