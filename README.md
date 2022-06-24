# Trabalho Final Banco de dados - 3̣° Semestre (Estoques)

__Grupo__: Cainã Gabriel, Ezequiel Abreu, Gustavo Oliveira, Samuel Romaskevis

## Requisitos o projeto

- O projeto foi escrito em PHP, e é necessária uma versão posterior a 8 para executar o projeto
- Necessário o banco de dados mysql a partir da versão 8 ou mariadb a partir da versão 10

## Executando o projeto

- Execute o arquivo `estoques_final_dump.sql` no SGBD para criar o banco de dados.

- Abra o arquivo `config.php` e altere a constante `PATH_ROOT` para a url base que for usar.
Exemplo:

```php
<?php

define("PATH_ROOT", "http://localhost/estoque_bd_emge");
```

- Abre o arquivo `conexao.php` e altere as variareis de conexão para corresponder ao seu banco de dados local:
Exemplo:
```php
$db_host     = "localhost";
$db_user     = "root";
$db_name     = "estoques_final";
$db_password = "senha";
```

- Depois coloque o projeto na pasta do servidor apache, ou crie um atalho para a mesma.

- Por último abra a url do projeto.