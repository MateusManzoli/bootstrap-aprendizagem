<?php
$manchete = file_get_contents('../noticias/' . $_GET['id'] . '/manchete.txt');
$subtitulo = file_get_contents('../noticias/' . $_GET['id'] . '/subtitulo.txt');
$publicacao = file_get_contents('../noticias/' . $_GET['id'] . '/publicacao.txt');
$conteudo = file_get_contents('../noticias/' . $_GET['id'] . '/conteudo.txt');
$imagem = file_get_contents('../noticias/' . $_GET['id'] . '/imagem.txt');