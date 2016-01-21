<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
// o post recebe o nome do submit
try {
    $execute = [];

    if (!empty($_POST['deletar'])) {
        excluirSolicitacao($_POST['id']);
        $execute['mensagem'] = "Exclusao de solicitacao realizada com êxito!";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$solicitacoes = buscarSolicitacoes();
?>
<html>
    <?php include_once '../../dados/dados-head.php' ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-faleConosco.css"/>
    <body>
        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="deletar" value="1"/>
                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?= $execute['tipo']; ?>">
                        <?= $execute['mensagem']; ?>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Nascimento</td>
                        <td>Cidade</td>
                        <td>Logradouro</td>
                        <td>Estado</td>
                        <td>Assunto</td>
                        <td>Mensagem</td>
                    </tr>
                    <?php foreach ($solicitacoes as $solicitacao) { ?> 
                        <tr>
                            <td><?php echo $solicitacao['id']; ?></td>
                            <td><?php echo $solicitacao['nome'] ?></td>
                            <td><?php echo $solicitacao['email'] ?></td>
                            <td><?php echo $solicitacao['nascimento'] ?></td>
                            <td><?php echo $solicitacao['cidade'] ?></td>
                            <td><?php echo $solicitacao['logradouro'] ?></td>
                            <td><?php echo $solicitacao['estado'] ?></td>
                            <td><?php echo $solicitacao['assunto'] ?></td>
                            <td><textarea style="width: 150px;" disabled><?php echo $solicitacao['mensagem'] ?></textarea></td>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id" type="submit" class="btn btn-default navbar-btn" value="<?php echo $solicitacao['id']; ?>">Excluir</button></td>
                            <td><a href="responder.php?id=<?php echo $solicitacao['id']; ?>" class="btn btn-default navbar-btn">Responder</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </body>
</html>
<?php include_once '../../dados/dados-rodape.php'; ?>