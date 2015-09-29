<?php

include_once '../../PDO/conexao.php';

function buscarRodadas() {
    $buscar = "SELECT * FROM aprendizagem.rodada";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarRodada($id) {
    $buscar = "select * from aprendizagem.rodada where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function buscarRodadaPorPesquisa($pesquisa) {
    $sql = "select * from aprendizagem.rodada where numero like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarRodada($dados) {
    validarDadosRodada($dados);
    $cadastrar = "
        INSERT INTO aprendizagem.rodada SET
            numero = '" . addslashes($dados['numero']) . "'";
    echo $cadastrar;
    return inserir($cadastrar);
}

function editarRodada($dados) {
    validarDadosRodada($dados);
    $editar = "UPDATE aprendizagem.rodada SET 
            numero = '" . addslashes($dados['numero']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}

function excluirRodada($id) {
    $excluir = "delete from `aprendizagem`.`rodada` where id = $id";
    return excluir($excluir);
}

function validarDadosRodada($dados) {
    if (empty($dados['numero'])) {
        throw new Exception('O campo numero precisa ser preenchido');
    }
}