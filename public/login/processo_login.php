<?php
session_start();

include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/login/gerenciador-login.php';

try {
    validarLogin($_POST['email'], $_POST['senha']);
    $mensagem = "Login realizado com sucesso";
} catch (Exception $ex) {
    //$mensagem = $ex->getMessage();
    //dentro do header pode passar o caminho da pasta.
    header('location: ../inicial/index.php ');
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-precesso-login.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <div class="login"><?php echo $mensagem; ?> </div>
</html>
<?php
include_once '../../dados/dados-menulateral.php';
include_once '../../dados/dados-rodape.php';
?>
