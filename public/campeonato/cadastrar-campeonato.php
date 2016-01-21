<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';

try {
    $execute = [];

    if ($_POST['campeonato']) {
        cadastrarCampeonato($_POST);
        $execute['mensagem'] = "Cadastro do campeonato realizado com êxito!";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
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
        <form class="form-horizontal-a" method="post" action="cadastrar-campeonato.php">
            <input type="hidden" name="campeonato" value="1">

            <?php
            if (!empty($execute)) {
                ?>
                <div class="alert <?= $execute['tipo']; ?>">
                    <?= $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <h3>Dados do Campeonato</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10-a">
                    <input name="nome" type="text" class="form-control" maxlength="60" placeholder="Nome do Campeonato">
                </div>
            </div> 

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Rodadas</label>
                <div class="col-sm-10-a">
                    <input name="quantidade" type="text" class="form-control" maxlength="60" placeholder="Quantidade de Rodadas">
                </div>
            </div>


            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Cadastrar Campeonato</button>
                </div>
            </div>
        </form>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>