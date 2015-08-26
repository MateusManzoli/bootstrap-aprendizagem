<?php
include_once '../../PDO/conexao.php';
//funcao para buscar noticias
function buscarNoticiasMenuPrincipal() {
    //metodo para buscar noticas
    $sql = "SELECT  * FROM aprendizagem.noticias order by id desc";
    //retorna resultados da busca
    return pesquisar($sql);
}


function buscarNoticia($id) {
    $buscar = "SELECT * FROM aprendizagem.noticias where id = $id";

    $noticia = pesquisar($buscar);
    return $noticia[0];
}

function buscarNoticiasPorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.noticias where manchete like '%{$pesquisa}%' or conteudo like '%{$pesquisa}%'";
   
    return pesquisar($sql);
}

function cadastrarNoticia($dados) {
    validarDadosTela($dados);
    // faz o texto da inserção com os valores que serao preenchidos publicacao etc...
    //addslashes permite usar os aspas''(apóstrofo)
    $cadastrar = "
        INSERT INTO aprendizagem.noticias SET
            publicacao = '" . addslashes($dados['publicacao']) . "',
            manchete = '" . addslashes($dados['manchete']) . "',
            subtitulo = '" . addslashes($dados['subtitulo']) . "',
            imagem = '" . addslashes($dados['imagem']) . "',
            legenda_imagem = '" . addslashes($dados['legenda_imagem']) . "',
            conteudo = '" . addslashes($dados['conteudo']) . "'
        ";
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($cadastrar);
}

function excluirNoticias($id) {
    $excluir = "delete from `aprendizagem`.`noticias` where id = $id ";
    return excluir($excluir);
}

function editarNoticia($dados) {
    validarDadosTela($dados);

    $editar = "UPDATE aprendizagem.noticias SET 

            publicacao = '" . addslashes($dados['publicacao']) . "',
            manchete = '" . addslashes($dados['manchete']) . "',
            subtitulo = '" . addslashes($dados['subtitulo']) . "',
            imagem = '" . addslashes($dados['imagem']) . "',
            legenda_imagem = '" . addslashes($dados['legenda_imagem']) . "',
            conteudo = '" . addslashes($dados['conteudo']) . "'
            where id = {$dados['id']} ";

    return editar($editar);
}



function validarDadosTela($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }

    if (empty($dados['publicacao'])) {
        throw new Exception('O campo publicacao precisa ser preenchido');
    }

    if (empty($dados['manchete'])) {
        throw new Exception('O campo manchete precisa ser preenchido');
    }

    if (empty($dados['subtitulo'])) {
        throw new Exception('O campo subtitulo precisa ser preenchido');
    }

    if (empty($dados['imagem'])) {
        throw new Exception('O campo imagem precisa ser preenchido');
    }

    if (empty($dados['legenda_imagem'])) {
        throw new Exception('O campo legenda_imagem precisa ser preenchido');
    }

    if (empty($dados['conteudo'])) {
        throw new Exception('O campo conteudo precisa ser preenchido');
    }
}
