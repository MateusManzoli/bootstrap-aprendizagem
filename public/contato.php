<!DOCTYPE html>
<html>
    <?php include_once '../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../estilos-paginas/fale-conosco.css"/>
    <body>
        <?php include_once '../dados/dados-cabecalho.php'; ?>
        <form class="form-horizontal-a" method="post">
            <legend>Dados do Usuario</legend>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10-a">
                    <input type="text" class="form-control" placeholder="Nome..." required>
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10-a">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="exemplo@hotmail.com"required>
                </div>
            </div>

            <div class="form-group-a">
                <label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10-a">
                    <input type="password" class="form-control"required>
                </div>
            </div>

            <div class="radio" >
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked >
                    Masculino
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Feminino
                </label>
            </div>

            <div class="form-group-a" required>
                <label for="inputEmail3" class="col-sm-2 control-label">Nascimento</label><br>
                <div class="col-sm-10-a">
                    <input type="date" name="dia" size="2" maxlength="2" placeholder="dd"> 
                    <input type="date" name="mes" size="2" maxlength="2" placeholder="mm"> 
                    <input type="date" name="ano" size="4" maxlength="4" placeholder="aaaa">
                </div>
            </div>

            <legend>Informações do Usuario</legend>
            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10-a">
                    <input type="text" class="form-control" placeholder="Rua, Av..." required>
                </div>
            </div>

            <div class="form-group-a">
                <label  class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10-a">
                    <select name="id_estados" id="id_estados" >
                        <option>Escolha o Estado</option>
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
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group-a">
            <label  class="col-sm-2 control-label">Cep</label>
            <div class="col-sm-10-a">
                <input type="text" class="form-control" size="9" maxlength="9" placeholder="00000-000" required>
            </div>
        </div>

        <div class="form-group-a">
            <label  class="col-sm-2 control-label">Cidade</label>
            <div class="col-sm-10-a">
                <input type="text" class="form-control" required>
            </div>
        </div>


        <legend>Mensagem do Usuario</legend>
        <textarea class="form-control" required></textarea>

        <div class="form-group-b">
            <div class="col-sm-offset-2 col-sm-10-a">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>

    </form>
    <?php include_once '../dados/dados-menulateral.php'; ?>
    <?php include_once '../dados/dados-rodape.php'; ?>

</body>
</html>
