<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';


// o post recebe o nome do submit
if (!empty($_POST['deletar'])) {
    excluirSolicitacao($_POST['id']);
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
                            <td><?php echo $solicitacao['mensagem'] ?></td>
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