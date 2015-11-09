<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/partida/gerenciar-partida.php';
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';

if ($_POST['publicar']) {
    tratarCadastroPartidaEquipe($_POST);
}

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
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">

                <input type="hidden" name="publicar" value="1"/>

                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px; color: black;">
                        <td>ID</td>
                        <td>Campeonato</td>
                        <td>Rodada</td>
                        <td>Local</td>
                        <td>Data|Hora</td>
                        <Td> Equipe Mandante</Td>
                        <Td> Equipe Visitante</Td>
                        <Td colspan="2">Gerenciar</Td>

                    </tr>
                    <?php foreach ($partidas as $gol) { ?> 
                        <tr style="text-align: center; color: black;">
                            <td><?= $gol['id']; ?></td>
                            <td><?= $gol['campeonato_nome']; ?></td>
                            <td><?= $gol['rodada_id']; ?></td>
                            <td><?= $gol['local']; ?></td>
                            <td><?= $gol['data']; ?></td>
                            <?php $_SESSION['id'] = $gol['id'] ?>
                            <?php
                            if ($gol['equipe_mandante_nome'] & $gol['equipe_visitante_nome']) {
                                ?>
                                <td><?= $gol['equipe_mandante_nome'] ?><br><a href="../gol_partida/cadastrar_golPartida.php?equipe_nome=<?= $gol['equipe_mandante_nome']; ?>&partida_id=<?= $gol['id'] ?>&equipe_id=<?= $gol['equipe_mandante_id'] ?>" class="btn btn-default navbar-btn">Gol</a></td>
                                <td><?= $gol['equipe_visitante_nome'] ?><br><a href="../gol_partida/cadastrar_golPartida.php?equipe_nome=<?= $gol['equipe_visitante_nome']; ?>&partida_id=<?= $gol['id'] ?>&equipe_id=<?= $gol['equipe_visitante_id'] ?>" class="btn btn-default navbar-btn">Gol</a></td>                            
                                <?php
                            } else {
                                ?>
                                <td><?= '-' ?></td>
                                <td><?= '-' ?></td>
                                <?php
                            }
                            ?>
                            <td><a href="../partida/editar.php?id=<?php echo $gol['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                            <td><a href="../partida_equipe/cadastrar_partidaEquipe.php?rodada_id=<?= $gol['rodada_id']; ?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>

