<?php

include_once '/../../PDO/conexao.php';
//md5 é utilizado para colocar codigos na senha
function cadastrarUsuario($dados) {
    $cadastrarUsu = "INSERT INTO aprendizagem.usuario SET
            nome = '" . ($dados['nome']) . "',
            email = '" . ($dados['email']) . "',
            senha = '" . md5($dados['senha']) . "',
            data_nascimento = '" . ($dados['nascimento']) . "'";
    
    return inserir($cadastrarUsu);
}
