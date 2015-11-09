<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
include_once '../../gerenciar/resposta-faleConosco/gerenciar-resposta.php';
// post armazena os dados 
// se post existir ele ira cadastrar as noticias

try {
    $execute = [];
    if ($_POST['id']) {
        enviarResposta($_POST);
        $execute['mensagem'] = "Resposta enviada com sucesso";
        $execute['tipo'] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$solicitacao = buscarSolicitacao($_GET['id']);
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-cadastro-noticia.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action=""> 
                <input type="hidden" name="editar" value="1"/>
                <input type="hidden" name="id" value="<?php echo $solicitacao['id'] ?>"/>
                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php
                        echo $execute['mensagem'];
                        ?>
                    </div>
                <?php } ?>
                <h2>Respondendo Solicitação <?php echo $solicitacao['id'] ?> </h2>
                <textarea name="mensagem" class="form-control a" ></textarea>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button name="enviar" Type="submit" class="btn btn-default">Responder</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        include_once '../../dados/dados-menulateral.php';
        include_once '../../dados/dados-rodape.php';
        ?>
    </body>
</html>
