<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: tela_login.php");
    exit();
}

$sql = "SELECT rota.*, usuario.nome AS usuario_associado,
        trem.nome_trem AS trem_associado
        FROM rota
        LEFT JOIN usuario ON rota.id_usuario = usuario.id_usuario
        LEFT JOIN trem_rota ON rota.id_rota = trem_rota.id_rota
        LEFT JOIN trem ON trem_rota.id_trem = trem.id_trem";

$rota = $conn->query($sql);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Visualização Rotas</title>
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

        <main>

            <div class="fundo_cadastros">

                <div class="cadastros">

                    <div class="borda_verde_flex">
                        <h2 id="titulo_tabela">Visualização de Rotas</h2>
                    </div>

                    <div class="borda_verde">

                        <div class="tabela">

                            <table>

                                <tr>
                                    <td>ID da rota</td>
                                    <td>Hora da criação</td>
                                    <td>Origem</td>
                                    <td>Destino</td>
                                    <td>Tempo</td>
                                    <td>Trem Associado</td>
                                    <td>Usuário Associado</td>
                                    <?php if ($_SESSION['tipo'] === 'admin') {
                                        echo "<td colspan='9'>Ação</td>";
                                    } ?>
                                </tr>
                                <?php

                                while ($resultado = mysqli_fetch_assoc($rota)) {
                                    echo "<tr class='campos_informacoes'>";
                                    echo "<td>" . $resultado["id_rota"] . "</td>";
                                    echo "<td>" . $resultado["hora"] . "</td>";
                                    echo "<td>" . $resultado["origem"] . "</td>";
                                    echo "<td>" . $resultado["destino"] . "</td>";
                                    echo "<td>" . $resultado["tempo"] . "</td>";
                                    echo "<td>" . $resultado["trem_associado"] . "</td>";
                                    echo "<td>" . $resultado["usuario_associado"] . "</td>";

                                    if ($_SESSION['tipo'] === 'admin') {
                                        echo "<td> <a href='certeza_excluir_rota.php?id=" . $resultado["id_rota"] . "'> <button class='botao_crud botao_excluir'>Excluir</button> </a> </td>";
                                        echo "<td> <a href='formulario_editar_rota.php?id=" . $resultado["id_rota"] . "'> <button class='botao_crud'>Atualizar</button> </a> </td>";
                                    }

                                    echo "</tr>";
                                }
                                ?>

                            </table>

                        </div>
                    </div>

                    <?php if ($_SESSION['tipo'] === 'admin') { ?>
                        <div class="borda_verde_flex">
                            <a href="cadastro_rotas.php">
                                <button id="botao_sensor_novo" onclick="window.location.href='cadastro_rotas.php'">Cadastrar
                                    nova rota</button>
                            </a>
                        </div>
                    <?php } ?>
                </div>

        </main>

        <script src="../scripts/script.js"></script>
    </div>

</body>

</html>