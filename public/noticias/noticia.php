<?php
include_once '../../gerenciar/noticia/gerenciador-noticias.php';

$noticia = buscarNoticia($_GET['id']);
?>

<html lang="pt-br">
    <?php include_once '../../dados/dados-head.php'; ?>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-noticia.css"/>
    <body>

        <!--navbar Fixa -->
        <?php include_once '../../dados/dados-cabecalho.php';
        ?>

        <div class="conteudo">
            <h5><?php echo $noticia['publicacao']; ?></h5>
            <h1><?php echo $noticia['manchete']; ?></h1>
            <h2><?php echo $noticia['subtitulo']; ?></h2>

            <div class="container">
                <div class="col-sm-6 col-md-12">
                    <div class="thumbnail b">                        <a class="btn" data-toggle="modal" data-target="#myModal">
                            <img src="<?php echo '../../imagens/' . $noticia['imagem']; ?>" >
                        </a>
                    </div>
                </div>
            </div>

            <!-- Trigger the modal with a button -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?php echo $noticia['legenda_imagem']; ?></h4>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo '../../imagens/' . $noticia['imagem']; ?>"/>
                        </div>
                        <div 
                            class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>


            <p> <?php echo nl2br(htmlspecialchars($noticia['conteudo'])); //nl2br Insere quebra HTML antes de todas newlines em uma string    ?></p>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>