<?php
//oculta os erros


include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/login/gerenciador-login.php';
//destroi o login do usuario
sair();

?>
<html>    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-precesso-login.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <div class="login"><?php echo "Logout realizado com sucesso"; ?> </div>
</html>
<?php
include_once '../../dados/dados-menulateral.php';
include_once '../../dados/dados-rodape.php';
?>