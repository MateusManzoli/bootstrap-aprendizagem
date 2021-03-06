<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/noticia/gerenciador-noticias.php';
include_once '../../gerenciar/tipo-noticia/gerenciar-tipoNoticia.php';
$categorias = buscarCategorias();
try {
    $execute = [];
// post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST) {
        cadastrarNoticia($_POST);
        $execute["mensagem"] = "Noticia cadastrada com sucesso";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-cadastro-noticia.css"/>
    <meta charset="UTF-8">
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form action="cadastro.php" class="form-horizontal-a" method="post"> 
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <h2>Dados da Noticia</h2>
                <input type="hidden" name="cadastrar" value="1">
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Publicação</label>
                    <div class="col-sm-10-a">
                        <input name="publicacao" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Manchete</label>
                    <div class="col-sm-10-a">
                        <input name="manchete" type="text" class="form-control" id="inputEmail3" /><!required-->
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitulo</label>
                    <div class="col-sm-10-a">
                        <input name="subtitulo" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10-a">
                        <input name="imagem" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">legenda_Imagem</label>
                    <div class="col-sm-10-a">
                        <input name="legenda_imagem" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Pagina</label>
                    <div class="col-sm-10-a">
                        <select name="pagina" id="id" >
                            <option>Escolha a Pagina</option>
                            <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria['id']; ?>"> <?= $categoria['nome']; // <?= nao precisa dar echo  ?> </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <h2>Conteudo</h2>
                <textarea name="conteudo" class="form-control" ></textarea>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button type="submit" class="btn btn-default" >Cadastrar</button>
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
