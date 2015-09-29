<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';

if (!empty($_POST['partida'])) {
    excluirPartida($_POST['id_partida']);
}

$partidas = buscarPartidas();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="partida" value="1"/>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Rodada</td>
                        <td>Local</td>
                        <td>Data|Hora</td>
                        <Td>Gerenciar</Td>
                    </tr>
                    <?php foreach ($partidas as $partida) { ?> 
                        <tr>
                            <td><?php echo $partida['id']; ?></td>
                            <td><?php echo $partida['rodada_id'] ?></td>
                            <td><?php echo $partida['local'] ?></td>
                            <td><?php echo $partida['data'] ?></td>
                            <?php $_SESSION['id'] = $partida['id'] ?>
                           <!-- é necessario que o button tenha um name-->
                            <td><button name="id_partida" type="submit" class="btn btn-default navbar-btn" value="<?php echo $partida['id']; ?>">Excluir</button></td>
                            <td><a href="../partida/editar.php?id=<?php echo $partida['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                            <td><a href="../partida_equipe/cadastrar_partidaEquipe.php?rodada_id=<?= $partida['rodada_id'];?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>