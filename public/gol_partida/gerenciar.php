<?php
include_once '../../dados/dados-head.php';
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida-gol/gerenciador_partidaGol.php';

try {
    $execute = [];
    if ($_POST['gol']) {
        excluirPartidaGol($_POST['partida_gol_id']);
        $execute["mensagem"] = "Exclusao de gol realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$gols = buscarPartidaGols();
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
                <input type="hidden" name="gol" value="1"/>
                <table class="table table-bordered">
                    <thead class="thead">
                    <th>ID</th>
                    <th>PARTIDA</th>
                    <th>EQUIPE</th>
                    <th>ATLETA</th>
                    <th>MINUTO</th>
                    </thead>
                    <?php foreach ($gols as $gol) { ?> 
                        <tbody>
                            <tr style="text-align: center;">
                                <td><?php echo $gol['id']; ?></td>
                                <td><?php echo $gol['partida_id'] ?></td>
                                <td><?php echo $gol['equipe_id'] ?></td>
                                <td><?php echo $gol['atleta_id'] ?></td>
                                <td><?php echo $gol['minuto'] ?></td>
                                <!-- é necessario que o button tenha um name-->
                                <td><button name="partida_gol_id" type="submit" class="btn btn-default navbar-btn" value="<?php echo $gol['id']; ?>">Excluir</button></td>
                                <td><a href="../gol_partida/editar.php?id=<?php echo $gol['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
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
