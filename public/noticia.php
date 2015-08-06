<?php
include_once '../gerenciar/gerenciador.php';

$noticia = buscarNoticia($_GET['id']);
?>

<html lang="pt-br">
    <?php include_once '../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../estilo-noticia.css"/>
    <body>

        <!--navbar Fixa -->
        <?php include_once '../dados/dados-cabecalho.php'; 
        ?>
        
        <div class="conteudo">
            <h5><?php echo $noticia['publicacao']; ?></h5>
            <h1><?php echo $noticia['manchete']; ?></h1>
            <h2><?php echo $noticia['subtitulo']; ?></h2>
            

            <div class="col-sm-6 col-md-12">
                <div class="thumbnail">
                    <img src="<?php echo '../imagens/'.$noticia['imagem']; ?>" >
                </div>
            </div>
            <p> <?php echo $noticia['conteudo']; ?></p>
        </div>
        <?php include_once '../dados/dados-menulateral.php'; ?>
        <?php include_once '../dados/dados-rodape.php'; ?>
    </body>
</html>