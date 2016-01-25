<?php
include_once'../../gerenciar/login/gerenciador-login.php';
?>

<div class="menulateral" >
    <!-- login usuario -->
    <?php if (empty($_SESSION['logado'])) { ?>
        <body>     

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
            <?php if (!empty($_SESSION['logado'])) { ?>
        <div class="link" >
            <a href="https://twitter.com" target="_blanck"> <img src="../../imagens/twitter.jpg"></a> 
            <a href="https://facebook.com" target="_blanck"> <img src="../../imagens/facebook.jpg"> </a>
            <a href="../../public/indiceMassa/imc.php"> <img src="../../imagens/calculo-imc.jpg"> </a>
        </div>





        <!-- tabela clima -->
        <div class="clima" style="align: center; ">
            <br><iframe src="http://widget.tempoagora.com.br/selos/r7_2/Widget/" scrolling="no" frameborder="0" height="250"  style="padding-left: 7%; padding-top: 2%; width: 355px;"></iframe>
        </div>

        <a href="http://www.evino.com.br/relampago-20160121-d?utm_source=UOL&utm_medium=Display&utm_campaign=20160121.Tudopelametade&utm_content=kitrelampago_200x448" target="_blank"><img src="https://tpc.googlesyndication.com/simgad/1583610008444334319" alt="" class="img_ad" border="0" height="300" width="355" style="padding-right: 1%;padding-bottom: 2%;"> </a>       <!-- feed noticias twitter -->
        

            <a class="twitter-timeline"  href="https://twitter.com/search?q=%40AMBaviationpics" data-widget-id="689795771164672000">Tweets sobre @AMBaviationpics</a>
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
