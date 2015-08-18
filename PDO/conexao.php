<?php

//faz a canexao com o BD
//$conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password); modelo para conexao
function conectar() {
    return new PDO('mysql:host=localhost;dbname=aprendizagem', 'root', 'mateus123');
}

function pesquisar($sql) {
    //conecta a função pesquisar ao banco de dados
    $conexao = conectar();
    // realiza a busca... o PDO fetch_assoc associa o indice com o a coluna desejada da tabela
    $statement = $conexao->query($sql, PDO::FETCH_ASSOC);
    // busca o resultado... fetchAll serve para retorna varios arquivos.
    return $statement->fetchAll();
}

function inserir($sql) {
    $conexao = conectar();
    
    $statement = $conexao->exec($sql);
    //lastInsertId retorna os resultados por id
    return $conexao->lastInsertId();
}

function excluir($sql) {

    $conexao = conectar();

    $statement = $conexao->query($sql);

    return $statement->execute();
}

function editar($sql) {

    $conexao = conectar();

    $statement = $conexao->query($sql);
    //var_dump($sql);exit;
    //return $statement;
}
