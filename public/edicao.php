<?php
include_once '../dados/dados-cabecalho.php';
include_once '../gerenciar/gerenciador.php';

// post armazena os dados 
// se post existir ele ira cadastrar as noticias, 

try {
    $execucao = [];
    // post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST) {
        editarNoticia($_POST);
        
        $execucao['mensagem'] = "Editada Com sucesso";
        $execucao['tipo'] = "alert-success";
    }
} catch (Exception $exc) {
    
    $execucao['mensagem'] = $exc->getMessage();
    $execucao['tipo'] = "alert-danger";
}

$noticia = buscarNoticia($_GET['id']);


?>

<html>
    <?php include_once '../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../estilos-paginas/estilo-cadastro-noticia.css"/>
    <body>
        <?php include_once '../dados/dados-cabecalho.php'; ?>
        <div class="geral">

            <form class="form-horizontal-a" method="post" action="edicao.php?id=<?php echo $_GET['id']; ?>"> 
                <input type="hidden" name="editar" value="1"/>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

                <?php
                if (!empty($execucao)) {
                    ?>
                    <div class="alert <?php echo $execucao['tipo']; ?>">
                        <?php
                        echo $execucao['mensagem'];
                        ?>
                    </div>

                <?php } ?>

                <legend><h2>Dados da Noticia</h2></legend>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Publicação</label>
                    <div class="col-sm-10-a">
                        <input name="publicacao" type="text" class="form-control" maxlength="300" value="<?php echo $noticia['publicacao']; ?>">
                    </div>
                </div>

                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Manchete</label>
                    <div class="col-sm-10-a">
                        <input  name="manchete" type="text" class="form-control" id="inputEmail3" maxlength="300" value="<?php echo $noticia['manchete'] ?>"> 
                    </div>
                </div>

                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitulo</label>
                    <div class="col-sm-10-a">
                        <input name="subtitulo" type="text" class="form-control" value="<?php echo $noticia['subtitulo']; ?>">
                    </div>
                </div>

                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10-a">
                        <input name="imagem" type="text" class="form-control" maxlength="150" value="<?php echo '../imagens/' . $noticia['imagem']; ?>">
                    </div>
                </div>
                
                 <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Legenda_imagem</label>
                    <div class="col-sm-10-a">
                        <input name="legenda_imagem" type="text" class="form-control" maxlength="150" value="<?php echo $noticia['legenda_imagem'];?>">
                    </div>
                </div>


                <legend>Conteudo</legend>
                <textarea name="conteudo" class="form-control" ><?php echo $noticia['conteudo']; ?></textarea>

                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button Type="submit" class="btn btn-default" >Atualizar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        include_once '../dados/dados-menulateral.php';
        include_once '../dados/dados-rodape.php';
        ?>
    </body>
