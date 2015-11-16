<?php
include_once'../../gerenciar/login/gerenciador-login.php';
?>
<div class="menulateral" >
    <!-- login usuario -->
    <?php if (empty($_SESSION['logado'])) { ?>
        <div class="container">
            <form class="form-signin" action="../../public/login/processo_login.php" method="post">
                <h2 class="form-signin-heading">Realize o Login</h2>
                <label for="inputEmail" class="sr-only ">Email </label>
                <input name="email" type="email" id="inputEmail" class="form-control " placeholder="Email" required autofocus/>
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
    <!-- logout usuario -->
    <form class="form-horizontal" method="post" name="id" action="../../public/login/sair.php?">
        <input type="hidden" name="editar" value="1"/>
        <div class="form-group">
            <?php //a sessao tem a posicao usuario que define os dados do usuario e na frente voce coloca o dado que voce deseja colocar na tela ?>
            <div 
                class="alert " role="alert"> <?php echo 'Bem Vindo ' . '<b>' . $_SESSION['usuario']['nome'] . '</b>' ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">sair</button>
            </div>              
        </div>
    </form>
<?php } ?>
<!-- tabela clima -->
<br><iframe src="http://widget.tempoagora.com.br/selos/r7_2/Widget/" scrolling="no" frameborder="0" height="235px" width="300"></iframe>

<div class="video" align="center">
    <video controls="controls" poster="../../imagens/hojeEuToTerrivel.jpg">
        <source src="../../_media/cristiano.mp4" type="video/mp4"/>
    </video>
</div>

<!-- feed noticias twitter -->
<?php if (!empty($_SESSION['logado'])) { ?>
    <a class="twitter-timeline"  href="https://twitter.com/search?q=%40KLM" data-widget-id="666336011782352896">Tweets sobre @KLM</a>
    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");</script>

<?php } ?>
</div>
