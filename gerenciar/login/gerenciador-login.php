<?php
include_once '/../../PDO/conexao.php';

//md5 é utilizado para colocar codigos na senha
function cadastrarUsuarios($dados) {
    validarUsuarios($dados);
    // formato que será passado no formulario d m Y
    //formato que sera armazenado no BD Y-m-d
    $data_nascimento = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
    $cadastrarUsu = "INSERT INTO aprendizagem.usuario SET
            nome = '" . ($dados['nome']) . "',
            email = '" . ($dados['email']) . "',
            senha = '" . md5($dados['senha']) . "',
            data_nascimento = '" . $data_nascimento->format('Y-m-d') . "'";

    return inserir($cadastrarUsu);
}

function buscarUsuarios(){
    $sql = "SELECT * FROM aprendizagem.usuario";
    return pesquisar($sql);
}

function buscarUsuario($id){
    $buscar = "select * from aprendizagem.usuario where id = $id";
    $usuario = pesquisar($buscar);
    return $usuario[0];
}

function excluirUsuario($id){
    $deletar = "delete from aprendizagem.usuario where id = $id";
    return excluir($deletar);
}

function editarUsuario($dados){
    echo 'sadasd';
    $atualizar = "UPDATE aprendizagem.usuario SET 
            nome = '" . addslashes($dados['nome']) . "',
            email = '" . addslashes($dados['email']) . "',
            senha = '" . addslashes($dados['senha']) . "',
            data_nascimento = '" .addslashes($dados['data_nascimento']). "'
            where id = {$dados['id']} ";

    return editar($atualizar);
}

function formatarDataVisualizacao($data){
    
    $dataFormatada = DateTime::createFromFormat('Y-m-d', $data);
    echo $dataFormatada->format('d/m/Y');
}


function validarUsuarios($dados) {
    // empty 'vazio'

    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }

    if (empty($dados['email'])) {
        throw new Exception('O campo email precisa ser preenchido');
    }

    if (empty($dados['senha'])) {
        throw new Exception('O campo senha precisa ser preenchido');
    }

    if (empty($dados['data_nascimento'])) {
        throw new Exception('O campo data de nascimento precisa ser preenchido');
    }
    
}
