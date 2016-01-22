<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/campeonato/gerenciador-campeonato.php';

try {
    $execute = [];
    if ($_POST['campeonato']) {
        excluirCampeonato($_POST['id_campeonato']);

        $execute["mensagem"] = "Campeonato excluido com êxito";
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
                    <thead class="thead">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade de Rodadas</th>   
                        <th colspan="2">Gerenciar</th>
                    </thead>
                    <?php foreach ($campeonatos as $campeonato) { ?> 
                    <tr style="text-align: center;">
                            <td><?php echo $campeonato['id']; ?></td>
                            <td><?php echo $campeonato['nome'] ?></td>
                            <td><?php echo $campeonato['quantidade_rodada'] ?></td>
                            <?php $_SESSION['id'] = $campeonato['id'] ?>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id_campeonato" type="submit" class="btn btn-default navbar-btn" value="<?php echo $campeonato['id']; ?>">Excluir</button></td>
                            <td><a href="../campeonato/editar.php?id=<?php echo $campeonato['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>