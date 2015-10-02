<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';
print_r($_POST);
if (!empty($_POST['excluir'])) {
    excluirEquipe($_POST['excluir']);
}
$equipes = buscarEquipes();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral" >
            <form method="post" action="gerenciar-equipe.php" >
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Esporte</td>
                        <td>Nome</td>
                        <td>cidade</td>
                        <td>presidente</td>
                        <td colspan="3">Gerenciar</td>
                    </tr>
                    <?php foreach ($equipes as $equipe) { ?>
                        <tr style="text-align:center;" >
                        <input type="hidden" name="equipe_id" id="equipe" value="<?php echo $equipe['id']; ?>">
                        <td><?php echo $equipe['id']; ?></td>
                        <td>
                            <?php
                            if (empty($equipe['esporte'])) {
                                echo '-';
                            } else {
                                echo $equipe['esporte'];
                            }
                            ?>
                        </td>
                        <td><?php echo $equipe['nome'] ?></td>
                        <td><?php echo $equipe['cidade'] ?></td>
                        <td><?php echo $equipe['presidente'] ?></td>
                        <?php $_SESSION['equipe_nome'] = $equipe['nome'] ?>
                        <!-- é necessario que o button tenha um name-->
                        <td><button name="excluir" type="submit" class="btn btn-default navbar-btn" value="<?php echo $equipe['id']; ?>">Excluir</button></td>
                        <td><a href="editar-equipe.php?id=<?php echo $equipe['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        <td><a href="../gerenciar-equipes-brasileirao/atletasEpatrocinio.php?equipe_id=<?php echo $equipe['id']; ?>&equipe_nome=<?= $_SESSION['equipe_nome'] ?>" class="btn btn-default navbar-btn">Gerenciar</a></td>
<?php } ?>
                </table>
            </form>
        </div>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>
