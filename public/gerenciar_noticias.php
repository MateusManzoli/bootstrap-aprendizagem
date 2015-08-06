<?php
include_once '../dados/dados-cabecalho.php';
include_once '../gerenciar/gerenciador.php';

// o post recebe o nome do submit
if ($_POST['excluir']) {
    excluirNoticias($_POST['excluir']);
}

$noticias = buscarNoticiasMenuPrincipal();

?>
<html>

    <?php include_once '../dados/dados-head.php' ?>
    <link rel="stylesheet" type="text/css" href="../tabela_gerenciar-noticias.css"/>
    <body>

        <div class="geral">
            <form method="post" action="gerenciar_noticias.php">
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Manchete</td>
                        <td>Subtitulo</td>
                    </tr>
                    <?php foreach ($noticias as $noticia) { ?> 
                        <tr>
                            <td><?php echo $noticia['id']; ?></td>
                            <td><?php echo $noticia['manchete'] ?></td>
                            <td><?php echo $noticia['subtitulo'] ?></td>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="excluir" type="submit" class="btn btn-default navbar-btn" value="<?php echo $noticia['id']; ?>">Excluir</button></td>
                            <td><a href="edicao.php?id=<?php echo $noticia['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>

    </body>
</html>
<?php include_once '../dados/dados-menulateral.php'; ?>
<?php include_once '../dados/dados-rodape.php'; ?>