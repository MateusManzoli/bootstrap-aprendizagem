<?php

include_once '../../PDO/conexao.php';

function buscarEsportes() {
    $buscar = "SELECT * FROM aprendizagem.esporte";
    $esporte = pesquisar($buscar);
    return $esporte;
}
function buscarEsporte($id) {
    $buscar = "select * from aprendizagem.esporte where id = $id";
    $esporte = pesquisar($buscar);
    return $esporte[0];
}