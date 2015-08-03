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
