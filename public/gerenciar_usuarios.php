<?php
include_once '../dados/dados-cabecalho.php';
include_once '../gerenciar/login/gerenciador-login.php';

//delete recebe o valor do hidden || id_usuario valor que receber o id no button
if (!empty($_POST['delete'])) {
    excluirUsuario($_POST['id_usuario']);
}

$usuarios = buscarUsuarios();
?>
<html>
    <link rel="stylesheet" type="text/css" href="../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../dados/dados-head.php'; ?>
    <body>

        <div class="geral">
            <form method="post" action="../public/gerenciar_usuarios.php">
                <input type="hidden" name="delete" value="1"/>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Senha</td>
                        <td>Data de Nascimento</td>
                        
                    </tr>
                    <?php foreach ($usuarios as $usuario) { ?> 
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nome'] ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                            <td><?php echo $usuario['senha'] ?></td>
                            <td><?php echo $usuario['data_nascimento'] ?></td>
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id_usuario" type="submit" class="btn btn-default navbar-btn" value="<?php echo $usuario['id']; ?>">Excluir</button></td>
                            <td><a href="editando_cadastro.php?id=<?php echo $usuario['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>


        <?php include_once '../dados/dados-menulateral.php'; ?>
        <?php include_once '../dados/dados-rodape.php'; ?>
    </body>
</html>