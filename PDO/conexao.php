<?php

//faz a canexao com o BD
// realiza a busca... o PDO fetch_assoc associa o indice com o a coluna desejada da tabela
// busca o resultado... fetchAll serve para retorna varios arquivos.
//retorna o resultado na tela
//SELECT  * FROM `bootstrap-aprendizagem`.noticias where id = 1 ;- 
function conectar() {
    return new PDO('mysql:host=localhost;dbname=bootstrap-aprendizagem', 'root', 'mateus123');
}

function pesquisar($sql) {
    $conexao = conectar();
    $statement = $conexao->query($sql, PDO::FETCH_ASSOC);
    return $statement->fetchAll();
}