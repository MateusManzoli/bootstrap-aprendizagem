<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';

try {
    $execute = [];
    if (!empty($_POST['patrocinador_id']) && is_numeric($_POST['patrocinador_id'])) {
        inserirPatrocinio($_POST);

        $execute["mensagem"] = "Patrocinador adicionado com sucesso";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $ex) {
    $execute['mensagem'] = $ex->getMessage();
    $execute['tipo'] = "alert-danger";
}

if (!empty($_POST['atleta_id']) && is_numeric($_POST['atleta_id'])) {
    contratarAtleta($_POST);
}
$patrocinadores = selecionarPatrocinio();
$atletas = buscarAtletas();
?>

<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/atletasEpatrocinio.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>              
        <div class="geral">
            <h3><?= $_REQUEST['equipe_nome'] ?></h3>
            <form class="form-horizontal-a" method="post" action="atletasEpatrocinio.php">
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <input type="hidden" name='equipe_id' id="equipe_id" value="<?= $_REQUEST['equipe_id']; ?>">
                <input type="hidden" name='equipe_nome' id="equipe_nome" value="<?= $_REQUEST['equipe_nome']; ?>">

                <legend><h2>Selecione o patrocinador</h2></legend>
                <div class="form-group-a">
                    <div class="col-sm-10-a">
                        <select name="patrocinador_id" id="patrocinador_id" >
                            <option>Patrocinadores</option>
                            <?php foreach ($patrocinadores as $patrocinador) { ?>
                                <option value="<?php echo $patrocinador['id']; ?>" ><?= $patrocinador['nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div><Br><br>

                <div class="form-group-a">                
                    <div class="col-sm-10-a">
                        <input name="valor" type="text" class="form-control" maxlength="60" placeholder="valor" >
                    </div>
                </div>

                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button  Type="submit" class="btn btn-default" >Solicitar</button>
                    </div>
                </div>
            </form>

            <form class="form-horizontal-a" method="post" action="atletasEpatrocinio.php">
                <input type="hidden" name='equipe_id' id="equipe_id" value="<?= $_REQUEST['equipe_id']; ?>">
                <input type="hidden" name='equipe_nome' id="equipe_nome" value="<?= $_REQUEST['equipe_nome']; ?>">
                <legend><h2>Contratar atleta</h2></legend>
                <div class="form-group-a">
                    <div class="col-sm-10-a">
                        <select name="atleta_id" id="atleta_id">
                            <option>Atletas</option>
                            <?php foreach ($atletas as $atleta) { ?>
                                <option value="<?= $atleta['id']; ?>" > <?= $atleta['nome']; ?> | <?= $atleta['posicao'];  // <?= nao precisa dar echo           ?></option> 
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button  Type="submit" class="btn btn-default" >Contratar</button>
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