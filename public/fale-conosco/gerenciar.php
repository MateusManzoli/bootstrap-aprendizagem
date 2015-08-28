<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/noticia/gerenciador-noticias.php';

// o post recebe o nome do submit
if ($_POST['excluir']) {
  excluirSolicitacao($_POST['id_solicitacao']);
}
$solicitacoes = buscarSolicitacoes();
?>
<html>

    <?php include_once '../../dados/dados-head.php' ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/tabela_gerenciar-noticias.css"/>
    <body>

        <div class="geral">
            <form method="post" action="gerenciar.php">
                <input type="hidden" name="excluir" value="1"/>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
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
                            <td><button name="id_solicitacao" type="submit" class="btn btn-default navbar-btn" value="<?php echo $solicitacao['id']; ?>">Excluir</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </body>
</html>
<?php include_once '../../dados/dados-menulateral.php'; ?>
<?php include_once '../../dados/dados-rodape.php'; ?>