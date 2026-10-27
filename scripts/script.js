function alerta() {
    alert("Não é possível excluir sensores com dados registrados");
}

function telaInicial() {
    window.location.href = "../public/tela_inicial.php";
}

function visualizacaoSensores() {
    window.location.href = "../public/visualizacao_sensores.php";
}

function monitoramentoTempoReal() {
    window.location.href = "../public/monitoramento_tempo_real.php";
}

function cadastroRelatorios() {
    window.location.href = "../public/visualizacao_relatorios.php";
}

function usuariosCadastrados() {
    window.location.href = "../public/usuarios_cadastrados.php";
}

function visualizacaoTrens() {
    window.location.href = "../public/visualizacao_trens.php";
}

function cadastroUsuarios() {
    window.location.href = "../public/cadastro_usuarios.php";
}

function visualizacaoRotas() {
    window.location.href = "../public/visualizacao_rotas.php";
}

function cadastrarRotas() {
    window.location.href = "../public/cadastro_rotas.php";
}

function sair() {
    window.location.href = "logout.php";
}

function index() {
    window.location.href = "../index.php";
}

function cadastroTrens() {
    window.location.href = "../public/cadastro_trens.php";
}

fetch("https://api.open-meteo.com/v1/forecast?latitude=-26.3045&longitude=-48.8487&current=temperature_2m")
    .then(resposta => resposta.json())
    .then(dados => {
        const temperatura = dados.current.temperature_2m;

        document.getElementById("temperatura").textContent = temperatura + " °C";
    })
    .catch(() => {
        document.getElementById("temperatura").textContent = "Indisponível";
    });

function landingPage() {
    window.location.href = "../public/landing_page.php";
}

document.getElementById('informacoes');

async function consultarCEP() {
    const cep = document.getElementById('cep').value;
    const cepLimpo = cep.replace(/\D/g, '');

    if (cepLimpo.length !== 8) {
        alert('Formato de CEP inválido! Digite 8 números.');
        return;
    }

    const url = `https://viacep.com.br/ws/${cepLimpo}/json/`;

    try {
        const resposta = await fetch(url);
        const dados = await resposta.json();

        if (dados.erro) {
            alert('CEP não encontrado.');
            return;
        }

        console.log(dados);
        document.getElementById('logradouro').value = dados.logradouro;
        document.getElementById('bairro').value = dados.bairro;
        document.getElementById('cidade').value = dados.localidade;
        document.getElementById('uf').value = dados.uf;

        document.getElementById('informacoes').style.display = 'block';

    } catch (erro) {
        console.error('Erro ao buscar o CEP:', erro);
    }
}
