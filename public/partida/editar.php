<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';

try {
    $execute = [];
    if ($_POST) {
        editarPartida($_POST);
        $execute["mensagem"] = "Partida editada com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$gol = buscarPartida($_GET['id']);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <form class="form-horizontal-a" method="post" action="../partida/editar.php?id=<?php echo $_GET['id']; ?>"> 
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="editar" value="1"/>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

            <h3>Modificando a Rodada</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Rodada</label>
                <div class="col-sm-10-a">
                    <input name="rodada_id" type="text" class="form-control" maxlength="60" value="<?php echo $gol['rodada_id']; ?>">
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Local</label>
                <div class="col-sm-10-a">
                    <select name="local" id="local" >
                        <optgroup label="local">
                            <option value="maracana">Maracana</option>
                            <option value="morumbi">Morumbi</option>
                            <option value="maneGarrincha">Mané Garrincha</option>
                            <option value="mineirao">Mineirão</option>
                            <option value="castelao">Castelão</option>
                            <option value="beiraRio">Beira Rio</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">data</label>
                <div class="col-sm-10-a">
                    <input name="data" type="text" class="form-control" maxlength="60" value="<?php echo $gol['data']; ?>">
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