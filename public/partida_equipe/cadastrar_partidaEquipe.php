<?php
include_once '../../gerenciar/partida-equipe/gerenciador-partidaEquipe.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';

if($_POST['publicar']){
    tratarCadastroPartidaEquipe($_POST);
}
$equipes = buscarEquipes($_GET['partida_id']);
?>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="cadastrar_partidaEquipe.php">
            <input type="hidden" name="publicar" value="1">
            <input type="hidden" name="id_partida" value="<?= $gol['partida_id']; ?>">
            <input type="hidden" name='partida_id' id="equipe_id" value="<?= $_REQUEST['partida_id']; ?>">

            <legend>Dados do Confronto</legend>
            <div class="form-group-a" style="display: inline;">
                <div class="col-sm-5-a">
                    <label  class="col-sm-2 control-label">Mandante:</label>
                    <select name="casa_equipe_id" id="casa_equipe_id">    
                        <optgroup label="equipes">
                            <?php foreach ($equipes as $equipe) { ?>
                            <option value="<?= $equipe['id'] ?>"><?= $equipe['nome']; ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>
                <h5 style="padding-left: 25%;">VS</h5> 
                <div class="col-sm-5-a">
                    <label  class="col-sm-2 control-label">Visitante:</label>
                    <select name="visitante_equipe_id" id="visitante_equipe_id">    
                        <optgroup label="equipes">
                            <?php foreach ($equipes as $equipe) { ?>
                            <option value="<?= $equipe['id'] ?>"><?= $equipe['nome']; ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group-b">
                <div class="col-sm-offset-2 col-sm-10-a">
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>
            </div>
        </form>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>