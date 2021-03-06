<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';

try {
    $execute = [];

    if (!empty($_POST['excluir'])) {
        excluirEquipe($_POST['excluir']);
        $execute['mensagem'] = "Equipe excluida com êxito!";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$equipes = buscarEquipes();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral" >
            <form method="post" action="gerenciar-equipe.php" >
                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?= $execute['tipo']; ?>">
                        <?= $execute['mensagem']; ?>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <thead class="thead">
                    <th>ID</th>
                    <th>Esporte</th>
                    <th>Nome</th>
                    <th>cidade</th>
                    <th>presidente</th>
                    <th colspan="3">Gerenciar</th>
                    <thead>
                        <?php foreach ($equipes as $equipe) { ?>
                            
                        <tr style="text-align:center;" >
                        <input type="hidden" name="equipe_id" id="equipe" value="<?php echo $equipe['id']; ?>">
                        <td><?php echo $equipe['id']; ?></td>
                        <td>
                            <?php
                            if (empty($equipe['esporte_id'] . ' - ' . $equipe['nome_esporte'])) {
                                echo '-';
                            } else {
                                echo $equipe['esporte_id'] . ' - ' . $equipe['nome_esporte'];
                            }
                            ?>
                        </td>
                        <td><?php echo $equipe['nome'] ?></td>
                        <td><?php echo $equipe['cidade'] ?></td>
                        <td><?php echo $equipe['presidente'] ?></td>
                        <?php $_SESSION['equipe_nome'] = $equipe['nome'] ?>
                        <!-- é necessario que o button tenha um name-->
                        <td><button name="excluir" type="submit" class="btn btn-default navbar-btn  glyphicon glyphicon-remove" value="<?php echo $equipe['id']; ?>">Excluir</button></td>
                        <td><a href="editar-equipe.php?id=<?php echo $equipe['id']; ?>" class="btn btn-default navbar-btn glyphicon glyphicon-pencil">Editar</a></td>
                        <td><a href="../gerenciar-equipes-brasileirao/atletasEpatrocinio.php?equipe_id=<?php echo $equipe['id']; ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
                    <?php } ?>

                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>
