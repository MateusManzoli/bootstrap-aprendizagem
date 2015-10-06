<?php
include_once '../../gerenciar/fale-conosco/gerenciador-faleConosco.php';
try {
    $execute = [];
 // post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST['publicar']) {
        enviarSolicitacao($_POST);

        $execute["mensagem"] = "Solicitação Enviada com sucesso";
        $execute["tipo"] = "alert-success";
    }
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post" action="contato.php">
            <?php if (!empty($execute)) { ?>
                <div class="alert <?php echo $execute['tipo']; ?>">
                    <?php echo $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <input type="hidden" name="publicar" value="1">
            <legend>Dados do Usuario</legend>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10-a">
                    <input name="nome" type="text" class="form-control" maxlength="60" placeholder="Nome Completo" >
                </div>
            </div>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10-a">
                    <input name="email" type="email" class="form-control" maxlength="80" id="inputEmail3" placeholder="exemplo@hotmail.com" >
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
            <div class="form-group-a" required>
                <label for="inputEmail3" class="col-sm-2 control-label">Nascimento</label><br>
                <div class="col-sm-10-a">
                    <input name="nascimento" type="text" class="form-control" maxlength="10" placeholder="DD/MM/AAAA">
                </div>
            </div>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10-a">
                    <input name="logradouro" type="text" class="form-control" maxlength="70" placeholder="Rua, Av..." >
                </div>
            </div>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Cidade</label>
                <div class="col-sm-10-a">
                    <input name="cidade" type="text" class="form-control" placeholder="Cidade">
                </div>
            </div>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10-a">
                    <select name="estado" id="id_estados" >
                        <optgroup label="Escolha o Estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraiba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantis</option>
                    </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group-a" required>
                <label for="inputEmail3" class="col-sm-2 control-label">Assunto</label><br>
                <div class="col-sm-10-a">
                    <input name="assunto" type="text" class="form-control" >
                </div>
            </div>
            <legend>Mensagem do Usuario</legend>
            <textarea name="mensagem" class="form-control a" ></textarea>
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

