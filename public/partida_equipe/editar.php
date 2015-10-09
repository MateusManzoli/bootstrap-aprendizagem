<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';

try {
    $execute = [];
    if ($_POST) {
        editarPartidaEquipe($_POST);

        $execute["mensagem"] = "Edicao da partida realizada com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$gol = buscarPartidaEquipe($_GET['id']);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <form class="form-horizontal-a" method="post" action="../partida_equipe/editar.php?id=<?php echo $_GET['id']; ?>"> 
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
            <h3>Modificando a Partida</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Partida(Id)</label>
                <div class="col-sm-10-a">
                    <input name="partida" type="text" class="form-control"  value="<?php echo $gol['partida_id']; ?>">
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Equipe(Id)</label>
                <div class="col-sm-10-a">
                    <input name="equipe" type="text" class="form-control"  value="<?php echo $gol['equipe_id']; ?>">
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Mandante</label>
                <div class="col-sm-10-a">
                    <input name="mandante" type="text" class="form-control"  value="<?php echo $gol['mandante']; ?>">
                </div>
            </div> 

            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Alterar</button>
                </div>
            </div>        
        </form>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php    '; ?>