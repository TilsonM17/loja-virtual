# Loja Virtual (Loja de Livros)

## Visão geral

Livraria Virtual criada com php, mysql, vue.js.

Durante o desenvolvimento usei os seguintes ***packages*** : 

 - [league/plates]() - Para o Template Engine
 - [izniburak/router]() - Para um sistema de rotas.
 - [doctrine/orm]() - ORM
 - [phpmailer/phpmailer]() -  Disparo e envio de Email

 - [phpunit/phpunit]() -  Testes Unitarios

Na pasta `Material` tem um arquivo `db.sql`, este ficheiro contem o backup da base de dados. Para ter acesso a base de dados abra o terminal e rode os seguintes comandos.
    
    //Entre o shell do mysql
    $ mysql -u root -p

    //Crear a Base de Dados com o nome 'bd_loja'
    mysql> create database db_loja;

    //Restaurar a partir do arquivo de backup
    $ mysql -u root -p db_loja < db.sql

## Rodar

Para rodar o projecto rode o seguinte comando: 

    $ composer install
    $ php turbo

Este comando vai baixa as depencias do propjecto e vai  iniciar o servidor embutido do php com o ***target*** para a pasta **public** que é a porta de entrada para a nossa aplicação.

## Screenshots Usuario


### Tela inicial com Usuario Logado
![Tela do Home com usuario Logado](.Material/01.png)

### Checkout Final, integração com Paypal
![Tela do checkout Final](.Material/02.png)

### Depois de Fazer Login no Paypal Sandbox, escolher a bandeira de pagamento
![Tela do checkout Final](.Material/03.png)


### Mensagem de Sucesso
![Tela do checkout Final](.Material/04.png)

---

## Tela do Admin


### Analise de Vendas com ApexCharts.js
![Tela do checkout Final](.Material/adm_03.png)


### Cadastro de Novos Livros
![Tela do checkout Final](.Material/adm_02.png)

------

## Resto é conversa