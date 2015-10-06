<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
include_once '../../gerenciar/noticia/gerenciador-noticias.php';
if (isset($_POST['pesquisa'])) {
    $noticias = buscarNoticiasPorPesquisa($_POST['pesquisa']);
} elseif ($_GET['categoria']) {
    $noticias = buscarNoticiasPorCategoria($_GET['categoria']);
} else {
    $noticias = buscarNoticiasMenuPrincipal();
}
?>
<div class="noticias">
    <div class="row">
        <?php foreach ($noticias as $noticia) { ?>
            <div class="col-md-4">
                <div class="thumbnail" >
                    <a href="../../public/noticias/noticia.php?id=<?php echo $noticia['id'] // o link sera diferente de acordo com o id    ?>"> <img src="../../imagens/<?php echo $noticia['imagem']; // seleciona a imagem de cada id    ?>"/>
                        <div class="caption">
                            <h4><?php echo substr($noticia['manchete'], 0, 41) //busca a manchete | SUBSTR define a quantidade de caracteres    ?></h4>
                            <p><?php echo substr($noticia['subtitulo'], 0, 54)//busca o subtitulo   ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?> 
    </div>

</div>

