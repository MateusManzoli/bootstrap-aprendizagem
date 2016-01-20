<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';
// post armazena os dados 
// se post existir ele ira cadastrar as noticias
try {
    $execute = [];
    // post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST) {
        editarAtleta($_POST);
        $execute['mensagem'] = "Dados do atleta modificado com sucesso";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$atleta = buscarAtleta($_GET['id']);
?>

<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-cadastro-noticia.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action="editar-atleta.php?id=<?= $_GET['id']; ?>"> 
                <input type="hidden" name="editar" value="1"/>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>"/>
                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?= $execute['tipo']; ?>">
                        <?= $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <h2>Dados do atleta <?= $_GET['id']; ?></h2>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control" maxlength="60" value="<?= $atleta['nome'] ?>">
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Cidadae</label>
                    <div class="col-sm-10-a">
                        <input  name="nascimento" type="text" class="form-control" id="inputEmail3" maxlength="80" value="<?= $atleta['nascimento'] ?>"> 
                    </div>
                </div>

                <div class="radio" >
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="M" checked >
                        M
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input  type="radio" name="optionsRadios" id="optionsRadios2" value="F">
                        F
                    </label>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Posicao</label>
                    <div class="col-sm-10-a">
                        <select name="posicao" id="id_estados" >
                            <option><?= $atleta['posicao'] ?></option>
                            <option value="Goleiro">Goleiro</option>
                            <option value="Zagueiro">Zagueiro</option>
                            <option value="Ala-esq">Lateral Esquerdo</option>
                            <option value="Ala-dir">Lateral Direito</option>
                            <option value="volante">Volante</option>
                            <option value="armador">Armador</option>
                            <option value="atacante">Atacante</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-12-a">
                        <button  Type="submit" class="btn btn-default" >Atualizar</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-12-a">
                        <a href="gerenciar-atleta.php"> <button  Type="button" class="btn btn-default" >Voltar</button></a>
                    </div>
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