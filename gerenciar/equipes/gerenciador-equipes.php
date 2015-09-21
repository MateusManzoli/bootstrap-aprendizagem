<?php
include_once '../../PDO/conexao.php';

function buscarEquipes(){
    $buscar = "SELECT * FROM aprendizagem.equipe";
    $equipe = pesquisar($buscar);
    return $equipe;
}

function buscarEquipe($id) {
    $buscar = "select * from aprendizagem.equipe where id = $id";
    $equipe = pesquisar($buscar);
    return $equipe[0];
}
function buscarEquipePorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.equipe where nome like '%{$pesquisa}%' or conteudo like '%{$pesquisa}%'";

    return pesquisar($sql);
}
function cadastrarEquipe($dados) {
    validarDadosEquipe($dados);
    // faz o texto da inserção com os valores que serao preenchidos publicacao etc...
    //addslashes permite usar os aspas''(apóstrofo)
    $cadastrar = "
        INSERT INTO aprendizagem.equipe SET
            nome = '" . addslashes($dados['nome']) . "',
            cidade = '" . addslashes($dados['cidade']) . "',
            presidente = '" . addslashes($dados['presidente']) . "'
        ";
    echo $cadastrar;
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($cadastrar);
}

function editarEquipe($dados) {
    validarDadosEquipe($dados);
    $editar = "UPDATE aprendizagem.equipe SET 
            nome = '" . addslashes($dados['nome']) . "',
            cidade = '" . addslashes($dados['cidade']) . "',
            presidente = '" . addslashes($dados['presidente']) . "'
            where id = {$dados['id']} ";
            echo $editar;
    return editar($editar);
}

function excluirEquipe($id) {
    $excluir = "delete from `aprendizagem`.`equipe` where id = $id";
    return excluir($excluir);
}

function validarDadosEquipe($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    if (empty($dados['cidade'])) {
        throw new Exception('O campo cidade precisa ser preenchido');
    }
    if (empty($dados['presidente'])) {
        throw new Exception('O campo presidente precisa ser preenchido');
    }
}

function selecionarPatrocinio(){
    $selecionar = "SELECT * FROM aprendizagem.patrocinador";
    $selec = pesquisar($selecionar);
    return $selec;
}