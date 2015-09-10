<?php
include_once '../../gerenciar/noticia/gerenciador-noticias.php';
include_once '../../gerenciar/tipo-noticia/gerenciar-tipoNoticia.php';

$categorias = buscarCategorias();
?>
<div class="rodape" style= 'width: 100%;'>
    <ul class="nav">
        <?php foreach ($categorias as $categoria): ?>
        <li><a href="<?= $categoria['link']. '?categoria='.$categoria['id']; ?>" name="<?= $categoria['nome']; ?>" > <?= $categoria['nome']; ?></a></li>
        <?php endforeach; ?>
        <div class="dropup">
            <li class="btn dropdown-toggle"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Região
                <span class="caret"></span>
            </li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a href="#">Centro-Oeste</a></li>
                <li><a href="#">Nordeste</a></li>
                <li><a href="#">Norte</a></li>
                <li><a href="#">Sul</a></li>
                <li><a href="#">Sudeste</a></li>
            </ul>
        </div>
    </ul>
</div>    