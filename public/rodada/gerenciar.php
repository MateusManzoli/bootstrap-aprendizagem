<?php
include_once '../../dados/dados-head.php';
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/rodada/gerenciador-rodada.php';

try {
    $execute = [];
    if ($_POST['partida']) {
        excluirRodada($_POST['id_rodada']);
        $execute["mensagem"] = "Exclusao de rodada realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$rodadas = buscarRodadas();
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
                        <td>Numero</td>
                        <td colspan="2">Gerenciar</td>
                    </tr>
                    <?php foreach ($rodadas as $rodada) { ?> 
                        <tr>
                            <td><?php echo $rodada['id']; ?></td>
                            <td><?php echo $rodada['numero'] ?></td>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id_rodada" type="submit" class="btn btn-default navbar-btn" value="<?php echo $rodada['id']; ?>">Excluir</button></td>
                            <td><a href="../rodada/editar.php?id=<?php echo $rodada['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>