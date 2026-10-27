# SA Astral Express

A proposta do sistema é criar um aplicativo que monitore o funcionamento das locomotivas e trilhos, a fim de garantir que não hajam problemas no seu funcionamento, além de permitir o acompanhamento do desempenho do trem, a identificação de falhas e a geração de relatórios analíticos. Com o objetivo de facilitar a identificação de problemas e falhas, além de armazenar, organizar, gerenciar informações de forma mais eficiente e estruturada, evitando que informações se percam ou se repitam, tanto sobre os trilhos quanto nos trens, garantindo que todos os problemas possam ser sanados.

# Metodologias de desenvolvimento que serão utilizadas:
- Scrum
- XP
- Prototipação 
- Kanban

O Scrum será utilizado para organizar o projeto em ciclos curtos e colaborativos, facilitando a resolução de problemas e bugs, tendo reuniões diárias para o alinhamento das ideias da equipe, para garantir que todos saibam o que cada um tem que fazer, o que já foi feio e o que ainda falta fazer. 

O método Kanban será utilizado para esclarecer o que cada membro da equipe deve fazer e o prazo para a resolução de cada tarefa, utilizando o método de separação de tarefas, que separa o quadro em cinco colunas principais: Backlog, Ready, In progress, In review e Done. 

A Prototipação será utilizada para criar um modelo visual do site pronto, facilitando na hora de fazer programar, pois já teremos um modelo correto a seguir. 

O método XP será utilizado para verificação e análise de 2 grupos de 2 integrantes cada da equipe, assim mantendo a eficiência enquanto um faz, outro testa, vice versa.

##  Funcionalidades
O sistema irá cadastrar todos os funcionários que utilizarão o sistema, permitirá o cadastro de trens, rotas e sensores. Ele também irá permitir visualizar a lista de sensores e os relatórios criados, juntamente com os detalhes de cada sensor, como ID do sensor, localização e tipo de dado monitorado. Também haverá a exibição da velocidade, localização e status operacional ao usuário. Além  de permitir a exclusão de sensores caso ainda não haja dados vinculados a ele.  

## Regras de Negócio: 

- | RN1 | Toda informação dentro do sistema deve ir para o banco de dados 

- | RN2 | É possível fazer login na tela de autenticação 

- | RN3 | As credenciais são autenticadas no banco de dados 

- | RN4 | Se as credenciais autenticadas estiverem no banco de dados, cria-se uma sessão 

- | RN5 | Quando uma sessão de autenticação no banco de dados for criada, o usuário é redirecionado até a tela principal do ADM 

- | RN6 | O nome do administrador autenticado deve ser exibido na tela principal  

- | RN7 | Na tela principal deve ter um botão para sair do sistema 

- | RN8 | Na tela principal deve ter um botão para acessar os cadastros de sensores e trens 

- | RN9 | A listagem dos sensores cadastrados devem conter ID do sensor, localização, tipo de dado monitorado, botão excluir e botão de visualização de detalhes

- | RN10 | Deve ser exibido o nome, a localização e o tipo de dado monitorado do sensor dentro de um campo contendo as informações 

- | RN11 | Cada sensor deve estar obrigatoriamente vinculado a um único trem ou trilho. 

- | RN12 | Quando um sensor for excluído, uma tela de confirmação aparece ao usuário 

- | RN13 | Sensores com dados já registrados não podem ser excluídos. Assim é exibida a mensagem “Não é possível excluir sensores com dados registrados” 

- | RN14 | A velocidade, localização e status operacional é exibido ao usuário 

- | RN15 | Relatórios são gerados de acordo com filtros de período, tipos de dados, tipos de falhas, linha/trecho e status do sensor. 

- | RN16 | Os relatórios são analíticos e possuem gráficos interativos para a visualização do desempenho da ferrovia e identificação de padrões ou falhas operacionais 

- | RN17 | Os relatórios analíticos são efetuados em uma tela específica que o usuário deve ter acesso 

- | RN18 | Relatórios gerados anteriormente, podem ser acessados e ficam ordenados com filtros de período e tipo de falha 

- | RN19 | O sistema deve permitir ao banco de dados associar o sensor cadastrado a um trem específico. 

## Requisitos Funcionais:

- | RF1 | O sistema deve permitir o usuário cadastrar um sensor

- | RF2 | O sistema deve permitir que o login seja realizado.

- | RF3 | O sistema deve permitir o usuário cadastrar, atualizar, excluir, visualizar um trem

- | RF4 | O sistema deve permitir o usuário cadastrar rota de trem

- | RF5 | O sistema deve criar uma sessão se a credencial for autenticada

- | RF6 | O sistema deve exibir o nome do administrador autenticado

- | RF7 | O sistema deve permitir fazer logout, encerrando a sessão

- | RF8 | O sistema deve emitir, excluir, atualizar relatórios

- | RF9 | O sistema deve permitir que o usuário visualizar os relatórios emitidos anteriormente

- | RF10 | O sistema deve mostrar a listagem dos sensores.

## Requisitos não funcionais

- | RNF1 | O sistema deve garantir autenticação de usuários por meio de login e senha.

- | RNF2 | O sistema deve registrar logs de acesso e ações dos usuários. 

- | RNF3 | O sistema deve responder às requisições em até 2 segundos. 

- | RNF4 | O sistema deve suportar no mínimo 100 usuários simultaneamente sem perda de desempenho.

- | RNF5 | O sistema deve atualizar os dados em tempo real ou quase real.

- | RNF6 | O sistema deve permitir expansão para suportar aumento de usuários.

- | RNF7 | O sistema deve suportar crescimento no volume de dados monitorados.

- | RNF8 | O sistema deve estar disponível 24 horas por dia, 7 dias por semana. 

- | RNF9 | O sistema deve possuir código organizado e documentado. 

- | RNF10 | O sistema deve permitir a adição de novas funcionalidades sem comprometer o funcionamento atual. 

- | RNF11 | O sistema deve possuir interface intuitiva e de fácil utilização. 

- | RNF12 | O sistema deve apresentar informações de forma clara e organizada. 

- | RNF13 | O sistema deve ser responsivo, adaptando-se a diferentes dispositivos (desktop e celular).

- | RNF14 | O sistema deve garantir que os dados não sejam perdidos ou corrompidos. 

- | RNF15 | O sistema deve redirecionar o usuário até a tela do administrador se uma sessão for criada.

- | RNF16 | O sistema deve retornar o usuário para a tela de login se a credencial não for autenticada.

- | RNF17 | O sistema deve ter um botão “sair do sistema”.

- | RNF18 | O sistema deve ter um botão para acessar todos os cadastros dos trens e sensores.

- | RNF19 | O sistema deve permitir que relatórios emitidos sejam acessados buscando filtros de período e tipo de falha.

- | RNF20 | O sistema deve exibir uma tela de confirmação quando o usuário escolhe excluir um sensor.

- | RNF21 | O sistema deve armazenar as senhas dos usuários utilizando um mecanismo seguro de hash.

- | RNF22 | O sistema deve conter proteção contra SQL injection.

- | RNF23 | O sistema deve realizar consultas parametrizadas nas operações com o banco de dados.

- | RNF24 | O sistema deve pelos formulários validar os dados recebidos no backend antes de realizar as operações no banco de dados.

- | RNF25 | O sistema deve impedir que usuários vejam dados que não estejam no nível de acesso.

- | RNF26 | O sistema deve impedir que usuários que não possuem permissão atribuam a si o perfil de administrador por dados enviados pelo frontend. 

- | RNF27 | O sistema deve evitar exposição desnecessária de dados sensíveis no frontend.

- | RNF28 | O sistema deve tratar erros durante as operações do backend sem mostrar informações internas da aplicação.

# APIS utilizadas

## API de CEP: 
A API de CEP que foi escolhida é a API ViaCEP. Ela foi escolhida por ser a mais usada no Brasil. Gratuito, sem cadastro, sem autenticação. Foi por muito tempo a opção padrão para projetos pequenos e médios, e ainda é relevante pela simplicidade de integração. 
A ViaCEP é um serviço web baseado em HTTP/REST. Isso significa que qualquer linguagem de programação ou ferramenta que consiga fazer uma requisição HTTP pode usá-la.

## Pontos positivos: 
- Gratuito sem cadastro
- Latência média de 80ms
- Suporta busca reversa (por endereço, retorna CEPs)

## Pontos Negativos: 
- Sem SLA oficial, sem suporte
- Uso comercial intensivo é desencorajado

## API: 
https://viacep.com.br/

## Fontes: 
- https://blog.hubdodesenvolvedor.com.br/melhores-apis-cep-comparativo-2026/
- https://viacep.com.br/
