<?php
include_once '../gerenciar/login/gerenciador-login.php';

?>
<div class="menulateral" >
    <?php if (empty($_SESSION['logado'])) { ?>
        <form class="form-horizontal" action="../public/processo_login.php" method="post" >
            <input type="hidden" name="login" value="1">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input name="senha" type="password" class="form-control" id="inputPassword3" placeholder="Senha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Entrar</button>
                </div>
            </div>
            <div class="cads">
                <a href="../public/cadastro_usuario.php">cadastra-se</a> |
                <a href="#">esqueci a senha</a>
            </div>
        </form>

        <?php
    } else {
        ?>

        <form class="form-horizontal" method="post" name="id" action="../public/processo_login.php?id=<?php echo $_GET['id']; ?>">
            <input type="hidden" name="editar" value="1"/>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
            <div class="form-group">
                <?php  //a sessao tem a posicao usuario que define os dados do usuario e na frente voce coloca o dado que voce deseja colocar na tela?>
                <?php echo 'Bem Vindo ' . '<b>' . $_SESSION['usuario']['nome']  . '</b>' . '!'?>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">sair</button>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
    <div class="link">
        <a href="https://twitter.com" target="_blanck"> <img src="../imagens/twitter.jpg"></a> <br>
        <a href="https://facebook.com" target="_blanck"> <img src="../imagens/facebook.jpg"> </a>
    </div>

    <div class="video" align="center">
        <video controls="controls" poster="../imagens/video-mini02.jpg">
            <source src="../_media/how-it-feels.mp4" type="video/mp4"/>
        </video>
    </div>

    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
    </div>

</div>
