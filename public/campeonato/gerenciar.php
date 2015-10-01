<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';

try {
    $execute = [];
     if ($_POST['campeonato']) {
         excluirCampeonato($_POST['id_partida']);
        
         $execute["mensagem"] = "Partida excluida com êxito";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$campeonatos = buscarCampeonatos();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="campeonato" value="1"/>
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Quantidade de Rodadas</td>   
                        <Td colspan="2">Gerenciar</td>
                    </tr>
                    <?php foreach ($campeonatos as $campeonato) { ?> 
                        <tr>
                            <td><?php echo $campeonato['id']; ?></td>
                            <td><?php echo $campeonato['nome'] ?></td>
                            <td><?php echo $campeonato['quantidade_rodada'] ?></td>
                            <?php $_SESSION['id'] = $campeonato['id'] ?>
                            <!-- é necessario que o button tenha um name-->
                            <td><a href="../partida/editar.php?id=<?php echo $campeonato['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                            <td><a href="../partida_equipe/cadastrar_partidaEquipe.php?rodada_id=<?= $campeonato['rodada_id']; ?>&partida_id=<?= $_SESSION['id'] ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>