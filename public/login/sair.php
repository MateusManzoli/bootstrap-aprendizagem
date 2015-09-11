<?php
//oculta os erros da tela
ini_set('display_errors', 0);
error_reporting(0);

include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/login/gerenciador-login.php';

try {
    validarLogin($_POST['email'], $_POST['senha']);
    $mensagem = "Login realizado com sucesso";
} catch (Exception $ex) {
    $mensagem = $ex->getMessage();
}
?>
<html>    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-precesso-login.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <div class="login"><?php echo $mensagem; ?> </div>
</html>
<?php
include_once '../../dados/dados-menulateral.php';
include_once '../../dados/dados-rodape.php';
?>