<?php
include_once '../../PDO/conexao.php';

function buscarPartidas() {
    $buscar = "SELECT * FROM aprendizagem.partida";
    $partida = pesquisar($buscar);
    return $partida;
}
function buscarPartida($id) {
    $buscar = "select * from aprendizagem.partida where id = $id";
    $partida = pesquisar($buscar);
    return $partida[0];
}
function buscarPartidaPorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.partida where rodada_id like '%{$pesquisa}%' or local like '%{$pesquisa}%' or data like '%{$pesquisa}%'";
    return pesquisar($sql);
}
function cadastrarPartida($dados) {
    validarDadosPartida($dados);
    // faz o texto da inserção com os valores que serao preenchidos publicacao etc...
    //addslashes permite usar os aspas''(apóstrofo)
    $cadastrar = "
        INSERT INTO aprendizagem.partidas SET
            rodada_id = '" . addslashes($dados['rodada_id']) . "',
            local = '" . addslashes($dados['local']) . "',
            data = '" . addslashes($dados['data']) . "'
        ";
    echo $cadastrar;
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($cadastrar);
}
function validarDadosPartida($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo rodada_id precisa ser preenchido');
    }
    if (empty($dados['cidade'])) {
        throw new Exception('O campo local precisa ser preenchido');
    }
    if (empty($dados['presidente'])) {
        throw new Exception('O campo presidente precisa ser preenchido');
    }
}
function selecionarEquipe() {
    $selecionar = "SELECT * FROM aprendizagem.equipe";
    $selec = pesquisar($selecionar);
    return $selec;
}
