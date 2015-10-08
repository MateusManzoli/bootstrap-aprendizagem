<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';



try {
    $execute = [];
    if (!empty($_POST['cadastrarRodada'])) {
        cadastrarPartida($_POST);
        $execute["mensagem"] = "Partida cadastrada com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$rodadas = buscarRodadas();
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="cadastro-partida.php">
            <input type="hidden" name="cadastrarRodada" value="1">
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <h3>Dados da Rodada</h3>

            <div class="form-group-a"> 
                <label  class="col-sm-2 control-label">Rodada</label>
                <div class="col-sm-10-a">
                    <select name="rodada_id" id="rodada_id" >
                        <optgroup label="local">
                            <?php foreach ($rodadas as $rodada) { ?>
                                <option value="<?php echo $rodada['id'] ?>"><?php echo $rodada['nome'],' - '. $rodada['numero'] ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Local</label>
                <div class="col-sm-10-a">
                    <select name="local" id="local" >
                        <optgroup label="local">
                            <option value="maracana">Maracanã</option>
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
                <label for="inputEmail3" class="col-sm-2 control-label">Data</label><br>
                <div class="col-sm-10-a">
                    <input name="data" type="text" class="form-control" placeholder="DD/MM/AAAA">
                </div>
            </div>

            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>
            </div>
        </form>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>