<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';

try {
    $execute = [];
    if ($_POST) {
        excluirPartida($_POST['id_partida']);

        $execute["mensagem"] = "Partida excluida com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$partidas = buscarPartidaEquipes();
print_r($partidas);
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                <input type="hidden" name="partida" value="1"/>
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Rodada</td>
                        <td>Local</td>
                        <td>Data|Hora</td>
                        <Td> Equipe Mandante</Td>
                        <Td> Equipe Visitante</Td>
                        <Td colspan="2">Gerenciar</Td>

                    </tr>
                    <?php foreach ($partidas as $partida) { ?> 
                        <tr>
                            <td><?= $partida['id']; ?></td>
                            <td><?= $partida['rodada_id']; ?></td>
                            <td><?= $partida['local']; ?></td>
                            <td><?= $partida['data']; ?></td>
                            <?php $_SESSION['id'] = $partida['id'] ?>
                            <?php $_SESSION['equipe_mandante_nome'] = $partida['equipe_mandante_nome'] ?>
                            <td><?= $partida['equipe_mandante_nome'] ?><a href="../gol_partida/cadastrar_golPartida.php?equipe_nome=<?= $_SESSION['equipe_mandante_nome']; ?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gol</a></td>
                            <td><?= $partida['equipe_visitante_nome'] ?><a href="../gol_partida/cadastrar_golPartida.php?rodada_id=<?= $partida['rodada_id']; ?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gol</a></td>    
                            
                            <!-- é necessario que o button tenha um name-->
                            <td><a href="../partida/editar.php?id=<?php echo $partida['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                            <td><a href="../partida_equipe/cadastrar_partidaEquipe.php?rodada_id=<?= $partida['rodada_id']; ?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>

<?php foreach ($equipes as $equipe) { ?>
    $equipe['nome']; ?><?php
}

