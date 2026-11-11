<?php

include("../infra/conexao.php");

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: tela_login.php");
    exit();
}

?>

<html lang="pt-BR">

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

                <p class="acesso_admin">
                    Olá, <?php echo $_SESSION['usuario']; ?>!
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

                <button class="botao_menu" id="botao_menu_tela_inicial" onclick="telaInicial()">
                    Tela Inicial
                </button>

                <button class="botao_menu" id="botao_menu_cadastro_trens" onclick="visualizacaoTrens()">
                    Visualização de Trens
                </button>

                <button class="botao_menu" id="botao_menu_cadastro_rotas" onclick="visualizacaoRotas()">
                    Visualização de Rotas
                </button>

                <button class="botao_menu_atual" id="botao_menu_usuarios_cadastrados" onclick="usuariosCadastrados()">
                    Usuários Cadastrados
                </button>

            </div>

        </div>

        <button id="botao_voltar" onclick="usuariosCadastrados()">
            Retornar
        </button>

        <div class="fundo_cadastros">

            <div class="cadastros">

                <div class="borda_verde_flex">
                    <h1 class="titulo_cadastro_form">
                        Cadastro de Usuários
                    </h1>
                </div>

                <div class="tabela">

                    <div class="borda_verde">

                        <form action="cadastrar_usuarios.php" method="POST" id="formulario_cadastro_usuarios">

                            <div class="flex_column">

                                <div class="campos_usuarios">

                                    <!-- PRIMEIRA LINHA: 4 CAMPOS -->

                                    <div class="flex_column">
                                        <label for="nome" class="label_form">Nome:</label>
                                        <input type="text" name="nome" id="nome" class="input_form" required>
                                    </div>

                                    <div class="flex_column">
                                        <label for="usuario" class="label_form">Usuário:</label>
                                        <input type="text" name="usuario" id="usuario" class="input_form" required>
                                    </div>

                                    <div class="flex_column">
                                        <label for="email" class="label_form">E-mail:</label>
                                        <input type="email" name="email" id="email" class="input_form" required>
                                    </div>

                                    <div class="flex_column">
                                        <label for="senha" class="label_form">Senha:</label>
                                        <input type="password" name="senha" id="senha" class="input_form" required>
                                    </div>

                                    <!-- SEGUNDA LINHA: 5 CAMPOS -->

                                    <div class="flex_column">
                                        <label for="perfil" class="label_form">Tipo de cargo:</label>

                                        <select name="perfil" id="perfil" class="input_form">
                                            <option value="funcionario">Funcionário</option>
                                            <option value="admin">Administrador</option>
                                        </select>
                                    </div>

                                    <div class="flex_column">
                                        <label for="cep" class="label_form">CEP:</label>
                                        <input type="text" id="cep" name="cep" class="input_form" onblur="consultarCEP()">
                                    </div>

                                    <div class="flex_column">
                                        <label for="logradouro" class="label_form">Logradouro:</label>
                                        <input type="text" id="logradouro" name="logradouro" class="input_form">
                                    </div>

                                    <div class="flex_column">
                                        <label for="bairro" class="label_form">Bairro:</label>
                                        <input type="text" id="bairro" name="bairro" class="input_form">
                                    </div>

                                    <div class="flex_column">
                                        <label for="cidade" class="label_form">Cidade:</label>
                                        <input type="text" id="cidade" name="cidade" class="input_form">
                                    </div>

                                </div>

                                <div class="flex_botao">

                                    <div class="borda_verde_flex">
                                        <button type="submit" class="botao_form_cadastro">
                                            Cadastrar
                                        </button>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="../scripts/script.js"></script>

</body>

</html>