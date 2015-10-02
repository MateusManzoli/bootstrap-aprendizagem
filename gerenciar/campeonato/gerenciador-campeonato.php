<?php
include_once '../../PDO/conexao.php';

function buscarCampeonatos(){
    $buscar = "SELECT * FROM aprendizagem.campeonato";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarCampeonato($id) {
    $buscar = "select * from aprendizagem.campeonato where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function buscarCampeonatoPorPesquisa($pesquisa) {
    $sql = "select * from aprendizagem.campeonato where nome like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarCampeonato($dados) {
    validarDadosCampeonato($dados);
    $cadastrar = "
        INSERT INTO aprendizagem.campeonato SET
            nome = '" . addslashes($dados['nome']) . "',
            quantidade_rodada = '" . addslashes($dados['quantidade']) . "'";
    echo $cadastrar;
    return inserir($cadastrar);
}

function editarCampeonato($dados) {
    validarDadosCampeonato($dados);
    $editar = "UPDATE aprendizagem.campeonato SET 
            nome = '" . addslashes($dados['nome']) . "',
            quantidade_rodada = '" . addslashes($dados['quantidade']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}

function excluirCampeonato($id) {
    $excluir = "delete from `aprendizagem`.`campeonato` where id = $id";
    return excluir($excluir);
}


function validarDadosCampeonato($dados) {
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    
        if (empty($dados['quantidade'])) {
        throw new Exception('O campo quantidade(rodada) precisa ser preenchido');
    }
}