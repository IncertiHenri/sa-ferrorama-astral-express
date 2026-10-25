# Relatório de IA

## API de Clima

**Ferramenta de IA utilizada:**  
Foi utilizado o ChatGPT para pesquisar APIs gratuitas de clima e auxiliar na integração ao sistema.

**Objetivo:**  
Pesquisar uma API gratuita de clima e integrá-la ao sistema para exibir a cidade de Joinville e a temperatura atual na barra de navegação.

## Principais instruções ou prompts fornecidos

- "Quais as melhores APIs de clima gratuitas?"
- "Como posso integrar a API Open-Meteo no projeto?"

## Trechos, arquivos ou funcionalidades produzidos com auxílio da IA

- `tela_inicial.php`: inclusão do elemento HTML para exibir a cidade e a temperatura.
- `script.js`: consulta à API com `fetch()`, leitura da resposta JSON e atualização da temperatura na página.

## Alterações realizadas

Adaptei a integração à estrutura existente do projeto e corrigi erros na URL da API e na sintaxe do JavaScript.

## Testes executados

Foi realizado um teste no navegador para verificar se a API retornava a temperatura e se o valor era exibido corretamente na barra de navegação.

## Problemas identificados e correções

A URL da API estava em um formato inadequado e havia um erro de digitação no método `.catch()`. Os problemas foram corrigidos, permitindo o funcionamento da consulta.

## Reflexão sobre as contribuições e limitações da ferramenta

A IA ajudou na pesquisa da API e na integração ao sistema. Foi necessário adaptar as sugestões ao projeto e testar a funcionalidade para verificar seu funcionamento.

## Link API

https://open-meteo.com/en/docs  

## API de CEP 

## Ferramenta de IA utilizada: 

Foi utilizado a IA do Google como ferramenta de inteligência artificial para pesquisa e auxílio na hora da integração da API de CEP gratuita no projeto ferrorama.  

## Objetivo: 

A IA foi utilizada para a pesquisa dos tipos de APIs de CEP gratuitos existentes e auxiliar na sua integração e utilização no projeto. 

## Principais instruções ou prompts fornecidos: 
- “APIs de validação de CEP gratuitas”
- “API de validação de CEP ViaCEP como usar javaScript”

## Trechos, arquivos ou funcionalidades produzidos com auxílio da IA:
- `Script.js`: Utilização do método `getElementById` para pegar, consultar e exibir informações do CEP
- `landing_page.php`: `style display none` para exibir os dados do CEP após a consulta e validação 

## Alterações realizadas:

Foi adaptado a estrutura da API para sua integração com o site. Também foi necessário adaptar a sintaxe da coleta dos dados fornecidos pelo usuário, para o seu correto funcionamento. 

## Testes executados:

Foi realizado teste para verificar se a API retornava dos dados corretos do CEP na tela Landing Page.

## Problemas identificados e como foram corrigidos: 

O método de captação dos dados inseridos pelo usuário não funcionou corretamente, além de que o método de retorno não cobria todos os dados requeridos pela atividade, logradouro, bairro, cidade, UF. Os erros foram corrigidos utilizando o método `getElementById` e o `console.log`.  

## Reflexão sobre as contribuições e limitações da ferramenta: 

A utilização da ferramenta de inteligência artificial contribuiu para acelerar a pesquisa e a implementação da API. A principal limitação foi na hora da integração entre o script.js a e landing page, sendo necessário alterações e correções, além de testá-la para garantir seu correto funcionamento.  

## Link da API:
https://viacep.com.br/


