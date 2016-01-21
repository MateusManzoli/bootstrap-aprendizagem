<?php
include_once '../../gerenciar/noticia/gerenciador-noticias.php';
include_once '../../gerenciar/tipo-noticia/gerenciar-tipoNoticia.php';
$categorias = buscarCategorias();
?>
<div class="rodape" style='width: 100%;'>
    <ul class="nav">
        <?php foreach ($categorias as $categoria): ?>
            <li><a href="<?= $categoria['link'] . '?categoria=' . $categoria['id']; ?>" name="<?= $categoria['nome']; ?>" > <?= $categoria['nome']; ?></a></li>
        <?php endforeach; ?>
        <li><a href="../musicas_aleatorias/musicas_aleatorias.php">Musicas</a></li>
    </ul>
    <div style="width: 100%;">
        <ul class="nav" style="background: #363636; color: darkgrey; text-align: center;">
            <li>©  2015 Noticias - O seu portal de noticias. Todos os direitos reservados-Mateus Manzoli Giacomin</li>
        </ul>
    </div>
</div>   