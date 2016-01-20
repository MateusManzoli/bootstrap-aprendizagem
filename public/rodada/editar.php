<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';

try {
    $execute = [];
    if ($_POST) {
        editarRodada($_POST);

        $execute["mensagem"] = "Rodada editada com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$rodada = buscarRodada($_GET['id']);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <form class="form-horizontal-a" method="post" action="../rodada/editar.php?id=<?php echo $_GET['id']; ?>"> 
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="editar" value="1"/>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

            <h3>Modificando a Rodada</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Numero</label>
                <div class="col-sm-10-a">
                    <input name="numero" type="text" class="form-control" maxlength="60" value="<?php echo $rodada['numero']; ?>">
                </div>
            </div> 

            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Alterar</button>
                </div>
            </div>
            <div class="col-sm-12-a col-md-12">
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-12-a">
                        <a href="gerenciar.php"> <button  Type="button" class="btn btn-default" >Voltar</button></a>
                    </div>
                </div>
            </div>

        </form>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php    '; ?>