<?php
include_once '../../dados/dados-head.php';
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';

try {
    $execute = [];
    if ($_POST['partida']) {
        excluirPartidaEquipe($_POST['partida_rodada_id']);
        $execute["mensagem"] = "Exclusao de partida realizado";
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
                    <thead class="thead">
                        <th>ID</th>
                        <th>ID PARTIDA</th>
                        <th>ID EQUIPE</th>
                        <th>MANDANTE</th>
                        <th colspan="2">Gerenciar</th>
                    </thead>
                    <?php foreach ($partidas as $gol) { ?> 
                    <tbody>
                    <tr style="text-align: center;">
                            <td><?php echo $gol['id']; ?></td>
                            <td><?php echo $gol['rodada_id'] ?></td>
                            <td><?php echo $gol['equipe_mandante_id'] ?></td>
                            <td><?php echo $gol['equipe_mandante_nome'] ?></td>
                            
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="partida_rodada_id" type="submit" class="btn btn-default navbar-btn" value="<?php echo $gol['id']; ?>">Excluir</button></td>
                            <td><a href="../partida_equipe/editar.php?id=<?php echo $gol['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>