<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';
//delete recebe o valor do hidden || id_usuario valor que receber o id no button
try {
    $execute = [];

    if (!empty($_POST['delete'])) {
        excluirAtleta($_POST['id_usuario']);
        $execute['mensagem'] = "Atleta excluido com êxito!";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$atletas = buscarAtletas();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar-atleta.php">
                <input type="hidden" name="delete" value="1"/>

                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?= $execute['tipo']; ?>">
                        <?= $execute['mensagem']; ?>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Sexo</th>
                            <th>Posicao</th>
                            <th colspan="2">Gerenciar</th>

                        </tr>
                    </thead>
                    <?php foreach ($atletas as $atleta) { ?> 
                        <tr style="text-align: center;">
                            <td><?php echo $atleta['id']; ?></td>
                            <td><?php echo $atleta['nome'] ?></td>
                            <td><?php echo $atleta['nascimento'] ?></td>
                            <td><?php echo $atleta['sexo'] ?></td>
                            <td><?php echo $atleta['posicao'] ?></td>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id_usuario" type="submit" class="btn btn-default navbar-btn  glyphicon glyphicon-remove" value="<?php echo $atleta['id']; ?>">Excluir</button></td>
                            <td><a href="editar-atleta.php?id=<?php echo $atleta['id']; ?>" class="btn btn-default navbar-btn glyphicon glyphicon-pencil">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>

        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>
