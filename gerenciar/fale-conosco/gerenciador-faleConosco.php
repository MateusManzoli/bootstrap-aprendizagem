<?php

include_once '../../PDO/conexao.php';

//md5 é utilizado para colocar codigos na senha
function publicarSolicitacao($dados) {
// formato que será passado no formulario d m Y
//formato que sera armazenado no BD Y-m-d
    $data_nascimento = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
    $publicar = "INSERT INTO aprendizagem.fale_conosco SET
        nome = '" . ($dados['nome']) . "',
        email = '" . ($dados['email']) . "',
        sexo = '" . ($dados['sexo']) . "',
        nascimento = '" . $data_nascimento->format('Y-m-d') . "',
        logradouro = '" . ($dados['logradouro']) . "',
        estado = '" . ($dados['estado']) . "',
        cidade = '" . ($dados['cidade']) . "',
        mensagem = '" . ($dados['mensagem']) . "',";
    return inserir($publicar);
}

function buscarSolicitacoes() {
    //metodo para buscar noticas
    $sql = "SELECT  * FROM aprendizagem.fale_conosco order by id desc";
    //retorna resultados da busca
    return pesquisar($sql);
}

function buscarSolicitacao($id) {
    $buscar = "SELECT * FROM aprendizagem.noticias where id = $id";

    $noticia = pesquisar($buscar);
    return $noticia[0];
}

function buscarSolicitacaoPorPesquisa($pesquisa) {
    // manchete passado no pesquisa nao esta correto pois o nome do formulario de pesquisa era "pesquisa"
    $sql = "select * from aprendizagem.fale_conosco where nome like '%{$pesquisa}%' or mensagem like '%{$pesquisa}%'";

    return pesquisar($sql);
}


function excluirSolicitacao($id) {
    $excluir = "delete from `aprendizagem`.`fale_Conosco` where id = $id ";
    return excluir($excluir);
}

/*function editarNoticia($dados) {
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
}*/

function validarDadosTela($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception("Os campos precisam ser preenchidos");
    }

    if (empty($dados['nome'])) {
        throw new Exception("O campo <b>nome</b> precisa ser preenchido");
    }

    if (empty($dados['email'])) {
        throw new Exception("O campo <b>email</b> precisa ser preenchido");
    }

    if (empty($dados['sexo'])) {
        throw new Exception("O campo <b>sexo</b> precisa ser preenchido");
    }

    if (empty($dados['nascimento'])) {
        throw new Exception("O campo <b>nascimento</b> precisa ser preenchido");
    }

    if (empty($dados['logradouro'])) {
        throw new Exception("O campo <b>logradouro</b> precisa ser preenchido");
    }

    if (empty($dados['estado'])) {
        throw new Exception("O campo <b>estado</b> precisa ser preenchido");
    }
    
    if (empty($dados['cidade'])) {
        throw new Exception("O campo <b>cidade</b> precisa ser preenchido");
    }
    if (empty($dados['mensagem'])) {
        throw new Exception("O campo <b>mensagem</b> precisa ser preenchido");
    }
    
}
