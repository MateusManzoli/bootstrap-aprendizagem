<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/esporte/gerenciar-esporte.php';
// post armazena os dados 
// se post existir ele ira cadastrar as noticias
print_r($_POST);
try {
    $execute = [];
    // post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST) {
        editarEquipe($_POST);
        $execute['mensagem'] = "Dados da equipe modificado com sucesso";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$equipe = buscarEquipe($_GET['id']);
?>

<html>
<?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-cadastro-noticia.css"/>
    <body>
<?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action="editar-equipe.php?id=<?= $_GET['id']; ?>"> 
                <input type="hidden" name="editar" value="1"/>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>"/>
<?php
if (!empty($execute)) {
    ?>
                    <div class="alert <?= $execute['tipo']; ?>">
                    <?= $execute['mensagem']; ?>
                    </div>
                    <?php } ?>
                <h2>Dados da Equipe <?= $_GET['id']; ?></h2>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Esportes</label>
                    <div class="col-sm-10-a">
                        <select name="esporte_id" id="esporte_id" >
                            <option value="1">Futebol</option>
                            <option value="2">Basquete</option>
                            <option value="3">Natacao</option>
                            <option value="4">Volei</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control" maxlength="60" value="<?= $equipe['nome'] ?>">
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Cidadae</label>
                    <div class="col-sm-10-a">
                        <input  name="cidade" type="text" class="form-control" id="inputEmail3" maxlength="80" value="<?= $equipe['cidade'] ?>"> 
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Presidente</label>
                    <div class="col-sm-10-a">
                        <input name="presidente" type="text" class="form-control" maxlength="25" value="<?= $equipe['presidente'] ?>">
                    </div>
                </div>

                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button  Type="submit" class="btn btn-default" >Atualizar</button>
                    </div>
                </div>
                <div class="col-sm-12-a col-md-12">
                    <div class="form-group-b">
                        <div class="col-sm-offset-2 col-sm-12-a">
                            <a href="gerenciar-equipe.php"> <button  Type="button" class="btn btn-default" >Voltar</button></a>
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

