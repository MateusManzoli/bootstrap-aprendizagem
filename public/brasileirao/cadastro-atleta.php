<?php
include_once '../../gerenciar/atletas/gerenciador-atletas.php';
try {
    $execute = [];
    // post armazena os dados
    // se post existir ele ira cadastrar as noticias,
    if ($_POST) {
        cadastrarAtleta($_POST);

        $execute["mensagem"] = "Cadastro de atleta realizado";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-atleta.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action="cadastro-atleta.php">
                <?php if (!empty($execute)) { ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php echo $execute['mensagem']; ?>
                    </div>
                <?php } ?>
                <input type="hidden" name="publicar" value="1">
                <h3>Dados do Atleta</h3>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control" maxlength="60" placeholder="Nome Completo" >
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nascimento</label><br>
                    <div class="col-sm-10-a">
                        <input name="nascimento" type="text" class="form-control" maxlength="10" placeholder="DD/MM/AAAA" required>
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
                            <option>Selecione sua Posicao</option>
                            <option value="Goleiro">Goleiro</option>
                            <option value="Zageiro">Zagueiro</option>
                            <option value="Ala-esq">Lateral Esquerdo</option>
                            <option value="Ala-dir">Lateral Direito</option>
                            <option value="volante">Volante</option>
                            <option value="armador">Armador</option>
                            <option value="atacante">Atacante</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar Atleta</button>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>

