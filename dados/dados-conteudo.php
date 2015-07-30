<?php
include_once '../gerenciar/gerenciador.php';

$noticias = buscarNoticiasMenuPrincipal();


foreach ($noticias as $noticia) {
    echo $noticia['id'];
}
?>

<div class="noticias">
    <div class="row">
        <?php foreach ($noticias as $noticia) { ?>
            <div class="col-md-4">
                <div class="thumbnail" >
                    <a href=" noticia.php?id=<?php echo $noticia['id'] ?>"> <img src="../imagens/<?php echo $noticia['imagem']; ?>"/>
                        <div class="caption">
                            <h4><?php echo $noticia['manchete'] ?></h4>
                            <p><?php echo $noticia['subtitulo'] ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?> 
    </div>


    <nav>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
