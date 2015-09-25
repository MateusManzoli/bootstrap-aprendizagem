<?php

include_once '../../PDO/conexao.php';

function buscarPartidaEquipes() {
    $buscar = "SELECT * FROM aprendizagem.partida_equipe";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarPartidaEquipe($id) {
    $buscar = "select * from aprendizagem.partida_equipe where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function buscarPartidaEquipePorPesquisa($pesquisa) {
    $sql = "select * from aprendizagem.partida_equipe where numero like '%{$pesquisa}%' or comentario like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarPartidaEquipe($dados) {
    validarDadosRodada($dados);
    $cadastrar = "
        INSERT INTO aprendizagem.partida_equipe SET
            partida_id = '" . addslashes($dados['rodada_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'
        ";
    echo $cadastrar;
    return inserir($cadastrar);
}

function editarPartidaEquipe($dados) {
    validarDadosPartidaEquipe($dados);
    $editar = "UPDATE aprendizagem.partida_equipe SET 
            partida_id = '" . addslashes($dados['rodada_id']) . "',
            equipe_id = '" . addslashes($dados['mandante']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}

function excluirPartidaEquipe($id) {
    $excluir = "delete from `aprendizagem`.`partida_equipe` where id = $id";
    return excluir($excluir);
}

function validarDadosPartidaEquipe($dados) {
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['partida_id'])) {
        throw new Exception('O campo partida_id precisa ser preenchido');
    }
    if (empty($dados['equipe_id'])) {
        throw new Exception('O campo equipe_id precisa ser preenchido');
    }
    
    if (empty($dados['mandante'])) {
        throw new Exception('O campo mandante precisa ser preenchido');
    }
}
