
<?php
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/esporte/gerenciar-esporte.php';
try {
    $execute = [];
    // post armazena os dados
    // se post existir ele ira cadastrar as noticias,
    if ($_POST['publicar']) {
        cadastrarEquipe($_POST);

        $execute["mensagem"] = "Cadastro de atleta realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}

$esportes = buscarEsportes();
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action="cadastro-equipe.php">
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <input type="hidden" name="publicar" value="1">
                <h3>Dados da Equipe</h3>

                <div class="col-sm-5-a">
                    <label  class="col-sm-2 control-label">Esporte</label>
                    <select name="esporte_id" id="esporte_id">    
                        <optgroup label="esportes">
                            <?php foreach ($esportes as $esporte) { ?>
                                <option value="<?= $esporte['id'] ?>"><?= $esporte['nome']; ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>

                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control"  placeholder="Nome da Equipe" >
                    </div>
                </div>

                <div class="form-group-a" required>
                    <label for="inputEmail3" class="col-sm-2 control-label">cidade</label><br>
                    <div class="col-sm-10-a">
                        <input name="cidade" type="text" class="form-control"  placeholder="Cidade Equipe">
                    </div>
                </div>


                <div class="form-group-a" required>
                    <label for="inputEmail3" class="col-sm-2 control-label">Presidente</label><br>
                    <div class="col-sm-10-a">
                        <input name="presidente" type="text" class="form-control"  placeholder="Presidente Equipe">
                    </div>
                </div>

                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar Equipe</button>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>

