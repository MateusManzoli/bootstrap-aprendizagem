<?php
include_once '../../dados/dados-head.php';
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';

try {
    $execute = [];
    if ($_POST['partida']) {
        excluirPartidaEquipe($_POST['partida_rodada_id']);
        $execute["mensagem"] = "Exclusao de partida rodada realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$partidas = buscarPartidaEquipes();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <input type="hidden" name="partida" value="1"/>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>ID PARTIDA</td>
                        <td>ID EQUIPE</td>
                        <td>MANDANTE</td>
                        <td colspan="2">Gerenciar</td>
                    </tr>
                    <?php foreach ($partidas as $partida) { ?> 
                    <tr style="text-align: center;">
                            <td><?php echo $partida['id']; ?></td>
                            <td><?php echo $partida['partida_id'] ?></td>
                            <td><?php echo $partida['equipe_id'] ?></td>
                            <td><?php echo $partida['mandante'] ?></td>
                            
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="partida_rodada_id" type="submit" class="btn btn-default navbar-btn" value="<?php echo $partida['id']; ?>">Excluir</button></td>
                            <td><a href="../partida_equipe/editar.php?id=<?php echo $partida['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>