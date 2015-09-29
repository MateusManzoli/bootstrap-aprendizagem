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
    $sql = "select * from aprendizagem.partida_equipe where numero like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function tratarCadastroPartidaEquipe($dados) {

    $partidas = array(
        'casa' => array(
            'partida_id' => $dados['partida_id'] ,
            'equipe_id' => $dados['casa_equipe_id'],
            'mandante' => 1,
        ),
        'visitante' => array(
            'partida_id' => $dados['partida_id'],
            'equipe_id' => $dados['visitante_equipe_id'],
            'mandante' => 0,
        )
    );
    foreach ($partidas as $partida) {
     cadastrarPartidaEquipe($partida);
    }
}

function cadastrarPartidaEquipe($dados) {
    $cadastrar = "
        INSERT INTO aprendizagem.partida_equipe SET
            partida_id = '" . addslashes($dados['partida_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'";
    echo $cadastrar;
    return inserir($cadastrar);
}

function editarPartidaEquipe($dados) {
    validarDadosPartidaEquipe($dados);
    $editar = "UPDATE aprendizagem.partida_equipe SET 
            partida_id = '" . addslashes($dados['rodada_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "',
            mandante = '" . addslashes($dados['mandante']) . "'
            where id = {$dados['id']} ";
    echo $editar;
    return editar($editar);
}
