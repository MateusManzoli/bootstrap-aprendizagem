<?php
include_once'../../gerenciar/login/gerenciador-login.php';
?>
<div class="menulateral" >
    <?php if (empty($_SESSION['logado'])) { ?>
        <div class="container">
            <form class="form-signin" action="../../public/login/processo_login.php" method="post">
                <h2 class="form-signin-heading">Realize o Login</h2>
                <label for="inputEmail" class="sr-only">Email </label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus/>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required/>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me</label>
                   
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
    <form class="form-horizontal" method="post" name="id" action="../../public/login/sair.php?">
        <input type="hidden" name="editar" value="1"/>
        <div class="form-group">
            <?php //a sessao tem a posicao usuario que define os dados do usuario e na frente voce coloca o dado que voce deseja colocar na tela ?>
            <div 
                class="alert " role="alert"> <?php echo 'Bem Vindo ' . '<b>' . $_SESSION['usuario']['nome'] . '</b>' ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit" >sair</button>
            </div>              
        </div>
    </form>
<?php } ?>
<div class="link">
    <a href="https://twitter.com" target="_blanck"> <img src="../../imagens/twitter.jpg"></a> 
    <a href="https://facebook.com" target="_blanck"> <img src="../../imagens/facebook.jpg"> </a>
    <a href="../../public/indiceMassa/imc.php"> <img src="../../imagens/calculo-imc.jpg"> </a>
</div>

<br><iframe src="http://widget.tempoagora.com.br/selos/r7_2/Widget/" scrolling="no" frameborder="0" height="235px" width="300"></iframe>

<div class="video" align="center">
    <video controls="controls" poster="../../imagens/hojeEuToTerrivel.jpg">
        <source src="../../_media/cristiano.mp4" type="video/mp4"/>
    </video>
</div>

<?php if (!empty($_SESSION['logado'])) { ?>
    <div>
        <a class="twitter-timeline" href="https://twitter.com/hashtag/corgi" data-widget-id="639847731478069248">corgi Tweets</a>
        <script>!function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + "://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");</script> 
    </div>
<?php } ?>
</div>
