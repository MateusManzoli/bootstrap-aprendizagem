<?php
include_once '../../PDO/conexao.php';

function validarLogin($email, $senha) {
//prepara o texto para ir pro banco de dados
    $login = "select * from aprendizagem.usuario where email = '" . $email . "' && senha ='" . md5($senha) . "'";
//a variavel logar recebe o metodo pesquisar que envia o texto do login para o banco de dados
    $logar = pesquisar($login);
// verifica o logar
    if (!$logar) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $_SESSION['logado'] = false;
        throw new Exception('O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros.<br>Verifique-as e tente novamente.');
    }
    return ($_SESSION = array(
        'usuario' => array(
            'email' => $email,
            'senha' => $senha,
            'nome' => $logar[0]['nome'],
        ),
        'horarios' => array(
            'data' => date('d/m/Y'),
            'hora' => date('H:i:s'),
        ),
        'logado' => true,
    ));
}

//funcao para destruir o login do usuario
function sair() {
    unset($_SESSION);
    session_destroy();
}