<?php
include_once '../../PDO/conexao.php';
function buscarAtleta($id) {
    $buscar = "SELECT * FROM aprendizagem.atleta where id = $id";
    $atleta = pesquisar($buscar);
    return $atleta[0];
}
function buscarAtletas(){
    $buscar = "SELECT * FROM aprendizagem.atleta";
    $atleta = pesquisar($buscar);
    return $atleta;
}

function buscarAtletaPorPesquisa($pesquisa) {
    // manchete passado no pesquisa buscarNoticiasPorPesquisanao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.atleta where nome like '%{$pesquisa}%' or conteudo like '%{$pesquisa}%'";

    return pesquisar($sql);
}

function cadastrarAtleta($dados) {
    validarDadosAtleta($dados);
    $nascimento = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
    // faz o texto da inserção com os valores que serao preenchidos publicacao etc...
    //addslashes permite usar os aspas''(apóstrofo)
    $cadastrar = "
        INSERT INTO aprendizagem.atleta SET
            nome = '" . addslashes($dados['nome']) . "',
            nascimento = '" . $nascimento->format('Y-m-d') . "',
            sexo = '" . addslashes($dados['optionsRadios']) . "',
            posicao = '" . addslashes($dados['posicao']) . "'
        ";
    echo $cadastrar;
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($cadastrar);
}
function excluirAtleta($id) {
    $excluir = "delete from `aprendizagem`.`atleta` where id = $id";
    return excluir($excluir);
}

function editarAtleta($dados) {
    validarDadosAtleta($dados);
    $editar = "UPDATE aprendizagem.atleta SET 
            nome = '" . addslashes($dados['nome']) . "',
            nascimento = '" . addslashes($dados['nascimento']) . "',
            sexo = '" . addslashes($dados['optionsRadios']) . "',
            posicao = '" . addslashes($dados['posicao']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}


function formatarDataNascimento($data) {
    $dataFormatada = DateTime::createFromFormat('Y-m-d', $data);
    echo $dataFormatada->format('d/m/Y');
}

function validarDadosAtleta($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    if (empty($dados['nascimento'])) {
        throw new Exception('O campo nascimento precisa ser preenchido');
    }
    if (empty($dados['optionsRadios'])) {
        throw new Exception('O campo sexo precisa ser preenchido');
    }
    if (empty($dados['posicao'])) {
        throw new Exception('O campo posicao precisa ser preenchido');
    }
}