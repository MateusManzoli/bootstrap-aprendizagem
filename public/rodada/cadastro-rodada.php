<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';

try {
    $execute = [];
    if (!empty($_POST['campeonato']) && is_numeric($_POST['campeonato'])) {
        cadastrarRodada($_POST);
        
       $execute["mensagem"] = "Cadastro da rodada realizado";
       $execute["tipo"] = "alert-success";
    }
} catch (Exception $ex) {
    $execute['mensagem'] = $ex->getMessage();
    $execute['tipo'] = "alert-danger";
}

$campeonatos = buscarCampeonatos();
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="cadastro-rodada.php">

            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="rodada" value="1">
            <h3>Dados da Rodada</h3>

            <div class="form-group-a">
                <div class="col-sm-5-a">
                    <label  class="col-sm-2 control-label">Copa:</label>
                    <select name="campeonato" id="campeonato">    
                        <optgroup label="copa">
                            <?php foreach ($campeonatos as $campeonato) { ?>
                                <option value="<?= $campeonato['id'] ?>"><?= $campeonato['nome']; ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>
            </div><Br>

                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Rodada</label>
                    <div class="col-sm-10-a">
                        <input name="numero" type="text" class="form-control" maxlength="60" placeholder="Rodada">
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
