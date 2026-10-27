# APIs
## Oque são?
 API(Application Programming Interface) é um mecanismo que permite que softwares se comuniquem, acessando dados ou enviando dados para outros softwares. As APIs funcionam por meio de relação cliente e servidor, onde o cliente recebe as informações vindas do servidor, e o servidor manda informações quando os clientes pedem.

---
## Como funciona a comunicação?
 As integrações tradicionais de integração ponto a ponto, que são a conexão de sistemas ou aplicações diretamente por meio de programação, exigem uma quantidade substancial de trabalho de configuração e manutenção.

## O que é APIs REST?
 É uma API que possui condições de como uma API tem que funcionar, foi criada como diretriz de gerenciamento a comunicação de uma rede complexa, só que usam ele para projetar APIs com várias arquiteturas diferentes, sendo esse serviço web chamado de Web RESTful, alguns dos princípios do estilo da arquitetura são.
- Interface uniforme.
- Ausência de estados.
- Sistema em camadas.
- Capacidade de armazenamento.
- Código sob demanda.
- Hipermídia.

## HTTP
- GET:
O método GET solicita a representação de um recurso específico. Requisições utilizando o método GET devem retornar apenas dados.  
- POST: 
O método POST é utilizado para submeter uma entidade a um recurso específico, frequentemente causando uma mudança no estado do recurso ou efeitos colaterais no servidor.
- PUT:
O método PUT substitui todas as atuais representações do recurso de destino pela carga de dados da requisição. 
- PATCH: 
O método PATCH é utilizado para aplicar modificações parciais em um recurso 
- DELETE:  
O método DELETE remove um recurso específico. 

## Requisição de HTTP
 Requisições HTTP são mensagens enviadas pelo cliente para iniciar uma ação no servidor. Suas linhas iniciais contêm três elementos

## Resposta HTTP 
A resposta HTTP é uma mensagem enviada por um servidor a um cliente em resposta a uma solicitação HTTP.

## O que são endpoints?

 Um endpoint de API é um local digital onde uma interface de programação de aplicativos (API) recebe chamadas de API, também conhecidas como solicitações de API, para recursos em seu servidor. Os endpoints de APIs são componentes de APIs e, geralmente, estão na forma de URLs ou localizadores de recursos uniformes. 

## Como funciona a troca de dados no formato JSON?
 Um dos usos mais comuns do JSON é na utilização de APIs, tanto em requisições quanto em respostas. Ele é muito mais compacto do que outros padrões e permite fácil consumo em navegadores web, já que o JavaScript consegue analisar strings JSON com facilidade, bastando apenas JSON.parse()começar a utilizá-lo.

## Quais são as diferenças entre uma API e um sistema web tradicional?
Tanto APIs quanto web services podem operar em máquinas ou redes, mas possuem algumas diferenças estruturais entre elas. Com as APIs, o cliente/consumidor de dados não precisa saber qual procedimento chamar no servidor é necessária apenas a utilização de comandos, e o próprio sistema de recebimento já sabe o que fazer com eles.

## Qual a importância da autenticação, autorização e segurança no consumo de APIs?
Tanto a autenticação quanto a autorização são partes fundamentais da estratégia de IAM de uma organização, mas têm funções distintas.

## Exemplos de utilização de APIs em sistemas empresariais.
- Viagens: as APIs são usadas para conectar agências e plataformas de reservas online a bancos de dados de companhias aéreas, sistemas de reservas de hotéis e serviços de transporte. 
- Integração com mídias sociais: as APIs possibilitam que os desenvolvedores integrem funcionalidades sociais em seus aplicativos não só o login, mas também o compartilhamento de conteúdo e a obtenção de dados do usuário.

---
### Fontes: 
- DEVMEDIA.
- IBM
- AWS
- Alura
- Stack Overflow
- Blog idwall