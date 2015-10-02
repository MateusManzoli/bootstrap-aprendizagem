<?php

include_once '../../PDO/conexao.php';

function buscarEsportes() {
    $buscar = "SELECT * FROM aprendizagem.esporte";
    $esporte = pesquisar($buscar);
    return $esporte;
}
/*
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

function selecionarPatrocinio() {
    $selecionar = "SELECT * FROM aprendizagem.patrocinador";
    $selec = pesquisar($selecionar);
    return $selec;
}

function inserirPatrocinio($dados) {
    print_r($dados);
    //verifica se ja existe os dados na tabela, se existi nao cadastra
    if (verificarRegistros($dados['patrocinador_id'], $dados['equipe_id'])) {   
        try {
            throw new Exception("Os dados ja existem em nossos registros");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    } else {
        $inserir = " INSERT INTO aprendizagem.equipe_patrocinio SET
            patrocinador_id = '" . addslashes($dados['patrocinador_id']) . "',
            equipe_id = '" . addslashes($dados['equipe_id']) . "'
        ";
        echo($inserir);
        //retorna o metodo inserir que contem os valores da variavel
        return inserir($inserir);
    }
}

function verificarRegistros($patrocinador_id,$equipe_id) {
    $verificar = "select * from aprendizagem.equipe_patrocinio where patrocinador_id = $patrocinador_id && equipe_id = $equipe_id";
    $verificacao = pesquisar($verificar);
    return $verificacao;
}


function contratarAtleta($dados) {
    $contratar = "
        INSERT INTO aprendizagem.equipe_atleta SET
           atleta_id = '" . addslashes($dados['atleta_id']) . "',
           equipe_id = '" . addslashes($dados['equipe_id']) . "'";

    echo $contratar;
    return inserir($contratar);
}*/