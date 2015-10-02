<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/partida-gol/gerenciador_partidaGol.php';
try {
    $execute = [];
    // post armazena os dados
    // se post existir ele ira cadastrar as noticias,
    if ($_POST['partida']) {
        cadastrarPartidaGol($_POST);

        $execute["mensagem"] = "Gol cadastrado com realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="cadastrar_golPartida.php">
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="partida" value="1">
            <h3>Gol</h3>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Partida</label>
                <div class="col-sm-10-a">
                    <input name="partida_id" type="text" class="form-control" maxlength="60" value="<?= $_REQUEST['partida_id'] ?>" disabled>
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Equipe</label>
                <div class="col-sm-10-a">
                    <input name="equipe_nome" type="text" class="form-control" maxlength="60" value="<?= $_REQUEST['equipe_nome'] ?>" disabled>
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Partida(gol)</label>
                <div class="col-sm-10-a">
                    <input name="equipe_id" type="text" class="form-control" maxlength="60" placeholder="Rodada">
                </div>
            </div> 
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Atleta</label>
                <div class="col-sm-10-a">
                    <input name="atleta_id" type="text" class="form-control" maxlength="60" placeholder="Rodada">
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Minuto</label>
                <div class="col-sm-10-a">
                    <input name="minuto" type="text" class="form-control" maxlength="60" placeholder="Rodada">
                </div>
            </div> 

            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>
            </div>
        </form>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php'; ?>

