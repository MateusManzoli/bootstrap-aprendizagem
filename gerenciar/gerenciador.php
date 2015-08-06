<?php

// faz a inclusao para conectar ao bd
include_once '../PDO/conexao.php';

//funcao para buscar noticias
function buscarNoticiasMenuPrincipal() {
    //metodo para buscar noticas
    $sql = 'SELECT  * FROM aprendizagem.noticias';
    //retorna resultados da busca
    return pesquisar($sql);
}

function buscarNoticia($id) {
    $buscar = "SELECT * FROM aprendizagem.noticias where id = $id";

    $noticia = pesquisar($buscar);
    return $noticia[0];
}

function cadastrarNoticia($dados) {
    // faz o texto da inserção com os valores que serao preenchidos publicacao etc...
    $cadastrar = "INSERT INTO aprendizagem.noticias (publicacao, manchete, subtitulo,imagem,conteudo)
            values(
                '{$dados['publicacao']}',
                '{$dados['manchete']}',
                '{$dados['subtitulo']}',   
                '{$dados['imagem']}',
                '{$dados['conteudo']}'
            )
   ";
    //retorna o metodo inserir que contem os valores da variavel
    return inserir($cadastrar);
}

function excluirNoticias($id) {
    $excluir = "delete from `aprendizagem`.`noticias` where id = $id ";
    return excluir($excluir);
}

function editarNoticia($dados) {

    $editar = "UPDATE aprendizagem.noticias SET 
       
        publicacao = '{$dados['publicacao']}', 
        manchete = '{$dados['manchete']}',
        subtitulo = '{$dados['subtitulo']}',
        imagem = '{$dados['imagem']}',
        conteudo = '{$dados['conteudo']}'      
        where id = {$dados['id']} ";

    return editar($editar);
}
