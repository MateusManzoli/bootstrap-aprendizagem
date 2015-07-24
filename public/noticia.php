<?php
include_once '../dados/dados-chama-noticia.php';
?>

<html lang="pt-br">
    <?php include_once '../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../noticias/estilo-noticias.css"/>
    <body>

        <!--navbar Fixa -->
        <?php include_once '../dados/dados-cabecalho.php'; ?>
        <div class="conteudo">
            <h5><?php echo $publicacao; ?></h5>
            <h1><?php echo $manchete; ?></h1>
            <h2><?php echo $subtitulo; ?></h2>

            <div class="col-sm-6 col-md-12">
                <div class="thumbnail">
                    <img src="<?php echo '../imagens/'.$imagem; ?>" >
                </div>
            </div>
            <p> <?php echo $conteudo; ?></p>
        </div>
        <?php include_once '../dados/dados-menulateral.php'; ?>
        <?php include_once '../dados/dados-rodape.php'; ?>
</html>