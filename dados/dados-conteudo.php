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
                            <h4><?php echo substr($noticia['manchete'], 0, 42) //busca a manchete | SUBSTR define a quantidade de caracteres    ?></h4>
                            <p><?php echo substr($noticia['subtitulo'], 0, 55)//busca o subtitulo   ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?> 
    </div>




    <div class="glb-bloco shopping-horizontal" >
        <div class="glb-grid-12">
            <script type="text/javascript">globo_shop_slot = "g1/home";
                globo_color_text = "484848";</script>
            <script type="text/javascript" src="http://vitrines.globo.com/vitrine/show_shop.js"></script>
        </div>
    </div>
    <div id="banner_floating" class="tag-manager-publicidade-container"></div> 
</div>
