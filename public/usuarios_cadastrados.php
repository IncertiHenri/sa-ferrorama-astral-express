<?php

include("../infra/conexao.php");

session_start();

$sql = "SELECT id_usuario, nome, usuario, email, perfil FROM usuario";
$resultado = mysqli_query($conn, $sql);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Usuários cadastrados</title>
</head>

<body id="usuarios_cadastrados">

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

                <button class="botao_menu" id="botao_menu_cadastro_rotas" onclick="visualizacaoRotas()">
                    Visualização de Rotas
                </button>

                <button class="botao_menu" id="botao_menu_cadastro_relatorios" onclick="cadastroRelatorios()">
                    Visualização de Relatórios
                </button>

                <button class='botao_menu_atual' id='botao_menu_usuarios_cadastrados' onclick='usuariosCadastrados()'>
                    Usuários Cadastrados
                </button>

            </div>
        </div>

        <main>

            <div class="fundo_cadastros">

                <div class="cadastros">

                    <div class="borda_verde_flex">
                        <h2 id="titulo_tabela">Usuários Cadastrados</h2>
                    </div>

                    <div class="borda_verde">

                        <div class="tabela">

                            <table>

                                <tr class="titulos_tabelas">
                                    <td>Matrícula</td>
                                    <td>Nome</td>
                                    <td>Usuário</td>
                                    <td>E-mail</td>
                                    <td>Cargo</td>
                                    <?php if ($_SESSION['tipo'] === 'admin') {
                                        echo "<td colspan='7'>Ações</td>";
                                    } ?>
                                </tr>



                                <?php

                                while ($usuario = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr class='campos_informacoes'>";
                                    echo "<td>" . $usuario["id_usuario"] . "</td>";
                                    echo "<td>" . $usuario["nome"] . "</td>";
                                    echo "<td>" . $usuario["usuario"] . "</td>";
                                    echo "<td>" . $usuario["email"] . "</td>";
                                    echo "<td>" . $usuario["perfil"] . "</td>";

                                    if ($_SESSION['tipo'] === 'admin') {
                                        echo "<td> <a href='certeza_excluir_usuario.php?id=" . $usuario["id_usuario"] . "'> <button class='botao_crud'>Excluir</button> </a> </td>";
                                        echo "<td> <a href='formulario_editar_usuario.php?id=" . $usuario["id_usuario"] . "'> <button class='botao_crud'>Atualizar</button> </a> </td>";
                                    }

                                    echo "</tr>";
                                }
                                ?>

                        </div>
                        </table>

                    </div>
                </div>

                <?php if ($_SESSION['tipo'] === 'admin') { ?>
                    <div class="borda_verde_flex">
                        <button id="botao_sensor_novo" onclick="cadastroUsuarios()">
                            Cadastrar Usuário
                        </button>
                    </div>
                <?php } ?>

            </div>

    </div>

    </main>


    <script src="../scripts/script.js"></script>

    </div>

</body>

</html>