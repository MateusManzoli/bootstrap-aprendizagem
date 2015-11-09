<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/login/gerenciador-login.php';
if (isset($_POST['cadastrar'])) {
        cadastrarUsuarios($_POST);
    }
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/cadastro-usuario.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form action="cadastro.php" class="form-horizontal-a" method="post">                  
                <h2>Cadastro Usuario</h2>
                <input type="hidden" name="cadastrar" value="1">
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome Usuario</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control" maxlength="60" placeholder="Nome Completo" required/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10-a">
                        <input name="email" type="text" class="form-control" id="inputEmail3" maxlength="80" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10-a">
                        <input name="senha" type="password" class="form-control" maxlength="20" placeholder="Insira sua Senha" required/>
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento</label>
                    <div class="col-sm-10-a">
                        <input name="data_nascimento" type="text" class="form-control" maxlength="10" placeholder="DD/MM/AAAA" required />
                    </div>
                </div>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button type="submit" class="btn btn-default" >Inscreve-se</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
include_once '../../dados/dados-menulateral.php';
include_once '../../dados/dados-rodape.php';
?>