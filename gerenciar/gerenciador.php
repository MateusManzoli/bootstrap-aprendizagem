<?php

include_once '../PDO/conexao.php';

function buscarNoticiasMenuPrincipal() {
    
    $sql = 'SELECT  *FROM `bootstrap-aprendizagem`.noticias';   
    return pesquisar($sql);

}