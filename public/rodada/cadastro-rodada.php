<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';

if ($_POST['rodada']) {
    cadastrarRodada($_POST);
}
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="cadastro-rodada.php">
            <input type="hidden" name="rodada" value="1">
            <legend>Dados da Rodada</legend>
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
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>