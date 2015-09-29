<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';

$partida = buscarPartida($_GET['id']);
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
                            <td><button name="confirmar" type="submit" class="btn btn-default navbar-btn" value="<?php echo $partida['id']; ?>">Editar</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>