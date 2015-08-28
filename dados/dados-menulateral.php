<?php
include_once'../../gerenciar/login/gerenciador-login.php';
?>
<div class="menulateral" >
    <?php if (empty($_SESSION['logado'])) { ?>
    
    <div class="container">

        <form class="form-signin" action="../../public/login/processo_login.php?id=<?php echo $_GET['id']; ?>" method="post">
        <h2 class="form-signin-heading">Realize o Login</h2>
        <label for="inputEmail" class="sr-only">Email </label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </div> <!-- /container -->


            <div class="cads">
                <a href="../../public/usuario/cadastro.php">cadastra-se</a> |
                <a href="#">esqueci a senha</a>
            </div>
    </form>

        <?php
    } else {
        ?>

        <form class="form-horizontal" method="post" name="id" action="../../public/login/processo_login.php">
            <input type="hidden" name="editar" value="1"/>
            
            <div class="form-group">
                <?php //a sessao tem a posicao usuario que define os dados do usuario e na frente voce coloca o dado que voce deseja colocar na tela ?>
               <div 
                   class="alert " role="alert"> <?php echo 'Bem Vindo ' . '<b>' . $_SESSION['usuario']['nome'] . '</b>'?>
               <button class="btn btn-lg btn-primary btn-block" type="submit" >sair</button>
               </div>              
            </div>
        </form>
        <?php } ?>
    <div class="link">
        <a href="https://twitter.com" target="_blanck"> <img src="../../imagens/twitter.jpg"></a> <br>
        <a href="https://facebook.com" target="_blanck"> <img src="../../imagens/facebook.jpg"> </a>
    </div>

    <div class="video" align="center">
        <video controls="controls" poster="../../imagens/video-mini02.jpg">
            <source src="../../_media/how-it-feels.mp4" type="video/mp4"/>
        </video>
    </div>

    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
        <a href="#" class="list-group-item list-group-item-warning">Anuciante</a>
    </div>

</div>
