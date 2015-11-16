<?php

include_once '../../PDO/conexao.php';

function buscarEsportes() {
    $buscar = "SELECT * FROM aprendizagem.esporte";
    $esporte = pesquisar($buscar);
    return $esporte;
}