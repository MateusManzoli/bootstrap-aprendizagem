<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/login/gerenciador-login.php';
// post armazena os dados 
// se post existir ele ira cadastrar as noticias
print_r($_POST);
try {
    $execute = [];
    // post armazena os dados 
// se post existir ele ira cadastrar as noticias, 
    if ($_POST) {
        editarUsuario($_POST);

        $execute['mensagem'] = "Cadrasto editado com sucesso";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
$usuario = buscarUsuario($_GET['id']);
?>
<html>
    <?php include_once '../../dados/dados-head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-cadastro-noticia.css"/>
    <body>
        <?php include_once '../../dados/dados-cabecalho.php'; ?>
        <div class="geral">
            <form class="form-horizontal-a" method="post" action="../usuario/edicao.php?id=<?php echo $_GET['id']; ?>"> 
                <input type="hidden" name="editar" value="1"/>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                <?php
                if (!empty($execute)) {
                    ?>
                    <div class="alert <?php echo $execute['tipo']; ?>">
                        <?php
                        echo $execute['mensagem'];
                        ?>
                    </div>
                <?php } ?>
                <h2>Dados do Usuario</h2>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10-a">
                        <input name="nome" type="text" class="form-control" maxlength="60" value="<?php echo $usuario['nome'] ?>">
                    </div>
                </div>
                <div class="form-group-a">
                    <label  class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10-a">
                        <input  name="email" type="email" class="form-control" id="inputEmail3" maxlength="80" value="<?php echo $usuario['email'] ?>"> 
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10-a">
                        <input name="senha" type="text" class="form-control" maxlength="25" value="<?php echo $usuario['senha'] ?>">
                    </div>
                </div>
                <div class="form-group-a">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-10-a">
                        <input name="data_nascimento" type="text" class="form-control" maxlength="10" value="<?php echo $usuario['data_nascimento'] ?>">
                    </div>
                </div>
                <div class="form-group-b">
                    <div class="col-sm-offset-2 col-sm-10-a">
                        <button Type="submit" class="btn btn-default" >Atualizar</button>
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
