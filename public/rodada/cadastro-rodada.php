<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';

try {
    $execute = [];
    // post armazena os dados
    // se post existir ele ira cadastrar as noticias,
    if ($_POST['rodada']) {
        cadastrarRodada($_POST);

        $execute["mensagem"] = "Cadastro da rodada realizado";
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
        <form class="form-horizontal-a" method="post" action="cadastro-rodada.php">
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="rodada" value="1">
            <h3>Dados da Rodada</h3>
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