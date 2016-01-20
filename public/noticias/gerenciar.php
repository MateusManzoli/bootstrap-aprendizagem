<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/noticia/gerenciador-noticias.php';
// o post recebe o nome do submit
if ($_POST['excluir']) {
    excluirNoticias($_POST['id_noticia']);
}
$noticias = buscarNoticiasMenuPrincipal();
?>
<html>

    <?php include_once '../../dados/dados-head.php' ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/tabela_gerenciar-noticias.css"/>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="excluir" value="1"/>
                <table class="table table-bordered">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Manchete</th>
                            <th>Subtitulo</th>
                            <th>Legenda_imagem</th>
                            <th colspan="2">Gerenciar</th>
                        </tr>
                    </thead>
                    <?php foreach ($noticias as $noticia) { ?> 
                        <tbody>    
                            <tr style="text-align: justify;">
                                <td><?php echo $noticia['id']; ?></td>
                                <td><?php echo $noticia['manchete'] ?></td>
                                <td><?php echo $noticia['subtitulo'] ?></td>
                                <td><?php echo $noticia['legenda_imagem'] ?></td>
                                <!-- é necessario que o button tenha um name-->
                                <td><button name="id_noticia" type="submit" class="btn btn-default navbar-btn  glyphicon glyphicon-remove" value="<?php echo $noticia['id']; ?>">Excluir</button></td>
                                <td><a href="edicao.php?id=<?php echo $noticia['id']; ?>" class="btn btn-default navbar-btn glyphicon glyphicon-pencil">Editar</a></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </form>
        </div>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php'; ?>