<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/partida-gol/gerenciador_partidaGol.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';

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
$atletas = buscarAtletaPorEquipe($_REQUEST['equipe_id']);
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
            <input type="hidden" name="equipe_id" value="<?php $_REQUEST['equipe_id'];?>">
            <h3>Cadastrar Gol para a equipe <?= $_REQUEST['equipe_nome']; ?></h3>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Partida</label>
                <div class="col-sm-10-a">
                    <input name="partida_id" type="text" class="form-control" maxlength="60" value="<?= $_REQUEST['partida_id'] ?>" readonly >
                </div>
            </div>
                  
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Atleta</label>
                <div class="col-sm-10-a">
                    <select name="atleta_id" id="atleta_id" >
                        <optgroup label="Atleta"></optgroup>
                        <?php foreach ($atletas as $atleta) { ?>
                        <option value="<?= $atleta['id']; ?>"><?= $atleta['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div><br>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Minutos</label>
                <div class="col-sm-10-a">
                    <input name="minuto" type="text" class="form-control" maxlength="60" placeholder="ex:10; 45; 80">
                </div>
            </div> 

            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Cadastrar Gol</button>
                </div>
            </div>
        </form>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php'; ?>

