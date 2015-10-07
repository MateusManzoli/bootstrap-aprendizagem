<?php
include_once '../../PDO/conexao.php';

function buscarPartidaGols() {
    $buscar = "SELECT * FROM aprendizagem.partida_gol";
    $rodada = pesquisar($buscar);
    return $rodada;
}

function buscarPartidaGol($id) {
    $buscar = "select * from aprendizagem.partida_gol where id = $id";
    $rodada = pesquisar($buscar);
    return $rodada[0];
}

function cadastrarPartidaGol($dados) {
    $cadastrar = "
        INSERT INTO aprendizagem.partida_gol SET
        partida_id = '" . addslashes($dados['partida_id']) . "',
        equipe_id = '" . addslashes($dados['equipe_id']) . "',
        atleta_id = '" . addslashes($dados['atleta_id']) . "',
        minuto = '" . addslashes($dados['minuto']) . "'";
    echo $cadastrar;
    return inserir($cadastrar);
}

function editarPartidaGol($dados) {
    validarDadosRodada($dados);
    $editar = "UPDATE aprendizagem.partida_gol SET 
            numero = '" . addslashes($dados['numero']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}

function excluirPartidaGol($id) {
    $excluir = "delete from `aprendizagem`.`partida_gol` where id = $id";
    return excluir($excluir);
}

function validarDadosPartidaGol($dados) {
    if (empty($dados['numero'])) {
        throw new Exception('O campo numero precisa ser preenchido');
    }
}