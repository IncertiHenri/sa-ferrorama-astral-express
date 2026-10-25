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
    <title>Visualização de trens</title>
</head>

<body id="visualizacao_trens">

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

    <main>

    <div class="fundo_cadastros">
        <div class="cadastros">

            <div class="borda_verde_flex">
                <h2 id="titulo_tabela">Trens Cadastrados</h2>
            </div>

                <div class="borda_verde">

                <div class="tabela">

                    <table>

                        <tr>
                            <td>ID do trem</td>
                            <td>Funcionário</td>
                            <td>Nome do Trem</td>
                            <td>Modelo</td>
                            <td>Capacidade</td>
                            <td>Status</td> 
                            <?php if ($_SESSION['tipo'] === 'admin') { echo "<td colspan='8'>Ação</td>"; } ?>
                        </tr>

                        <?php

                         $sql = "SELECT * FROM trem JOIN usuario ON trem.id_usuario = usuario.id_usuario";

                        $trens = $conn->query($sql);

                        while ($resultado = mysqli_fetch_assoc($trens)) {
                            echo "<tr class='campos_informacoes'>";
                            echo "<td>" . $resultado["id_trem"] . "</td>";
                            echo "<td>" . $resultado["usuario"] . "</td>";
                            echo "<td>" . $resultado["nome_trem"] . "</td>";
                            echo "<td>" . $resultado["modelo"] . "</td>";
                            echo "<td>" . $resultado["capacidade"] . "</td>";
                            echo "<td>" . $resultado["status"] . "</td>";
                            
                                if ($_SESSION['tipo'] === 'admin') {
                                    echo "<td> <a href='certeza_excluir_trem.php?id=" . $resultado["id_trem"] . "'> <button class='botao_crud'>Excluir</button> </a> </td>";
                                    echo "<td> <a href='formulario_editar_trem.php?id=" . $resultado["id_trem"] . "'> <button class='botao_crud'>Atualizar</button> </a> </td>";
                                }

                                echo "</tr>";
                            }
                            ?>

                    </table>

                </div>
            </div>
                
            <?php if ($_SESSION['tipo'] === 'admin') { ?>
                <div class="borda_verde_flex">
                    <a href="cadastro_trens.php">
                        <button id="botao_sensor_novo" onclick="cadastroTrens()">Cadastrar Novo Trem</button>
                    </a>
                </div>
            <?php } ?>
            
        </div>
    </div>

    </main>

    <script src="../scripts/script.js"></script>

    </div>

</body>

</html>