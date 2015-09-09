<?php
include_once '../../PDO/conexao.php';

function buscarCategorias() {
    $sql = "SELECT * FROM aprendizagem.categorias";
    return pesquisar($sql);
}
function buscarCategoria($id) {
    $buscar = "SELECT * FROM aprendizagem.categorias where id = $id";
    $categoria = pesquisar($buscar);
    return $categoria[0];
}