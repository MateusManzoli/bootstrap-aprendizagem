<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';

try {
    $execute = [];
    if ($_POST) {
        editarCampeonato($_POST);

        $execute["mensagem"] = "Edicao do campeonato realizado com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$partida = buscarCampeonato($_GET['id']);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <form class="form-horizontal-a" method="post" action="../campeonato/editar.php?id=<?php echo $_GET['id']; ?>"> 
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
            <h3>Modificando o Campeonato</h3>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10-a">
                    <input name="nome" type="text" class="form-control"  value="<?php echo $partida['nome']; ?>">
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Quantidade(Rodada)</label>
                <div class="col-sm-10-a">
                    <input name="quantidade" type="text" class="form-control"  value="<?php echo $partida['quantidade_rodada']; ?>">
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