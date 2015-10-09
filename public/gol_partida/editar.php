<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida-gol/gerenciador_partidaGol.php';

try {
    $execute = [];
    if ($_POST) {
        editarPartidaGol($_POST);
        $execute["mensagem"] = "Partida editada com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$gol = buscarPartidaGol($_GET['id']);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <form class="form-horizontal-a" method="post" action="../gol_partida/editar.php?id=<?php echo $_GET['id']; ?>"> 
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="editar" value="1"/>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

            <h3>Edicao de Gol</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Partida</label>
                <div class="col-sm-10-a">
                    <input name="partida_id" type="text" class="form-control" maxlength="60" value="<?php echo $gol['partida_id']; ?>">
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Equipe</label>
                <div class="col-sm-10-a">
                    <input name="equipe_id" type="text" class="form-control" maxlength="60" value="<?php echo $gol['equipe_id']; ?>">
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Atleta</label>
                <div class="col-sm-10-a">
                    <input name="atleta_id" type="text" class="form-control" maxlength="60" value="<?php echo $gol['atleta_id']; ?>">
                </div>
            </div>
            
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Minutos</label>
                <div class="col-sm-10-a">
                    <input name="minuto" type="text" class="form-control" maxlength="60" value="<?php echo $gol['minuto']; ?>">
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

