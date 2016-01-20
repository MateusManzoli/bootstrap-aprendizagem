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
        <div class="link" >
            <a href="https://twitter.com" target="_blanck"> <img src="../../imagens/twitter.jpg"></a> 
            <a href="https://facebook.com" target="_blanck"> <img src="../../imagens/facebook.jpg"> </a>
            <a href="../../public/indiceMassa/imc.php"> <img src="../../imagens/calculo-imc.jpg"> </a>
        </div>





        <!-- tabela clima -->
        <div class="clima" style="align: center; width: 450px;">
            <br><iframe src="http://widget.tempoagora.com.br/selos/r7_2/Widget/" scrolling="no" frameborder="0" height="250" style="padding-left: 7%; padding-top: 2%;"></iframe>
        </div>
        <div id="google_image_div" style="overflow:hidden; float: right; padding-right: 7%; padding-bottom: 2%;"><a id="aw0" target="_blank" href="https://googleads.g.doubleclick.net/aclk?sa=L&amp;ai=BNXT2vIKfVvDfIcuXxATBgJeYA43Fn5IIAAAAEAEghdTrJzgAWIWbhL3JAmDN4OCA8AKyAQxnMS5nbG9iby5jb226AQlnZnBfaW1hZ2XIAQPaARRodHRwOi8vZzEuZ2xvYm8uY29tL6kCBBkJvLSCkD7AAgLgAgDqAhUvOTUzNzc3MzMvdHZnX0cxLkhvbWX4AvTRHpAD2ASYA9gEqAMByAOZBNAEkE7gBAGQBgGgBhTYBwE&amp;num=0&amp;cid=5GiyK3_LbTUglZvuC548VgMf&amp;sig=AOD64_0X-HbESczA1n20_v1pWsK7F3AYQw&amp;client=ca-pub-6114770831804854&amp;adurl=http://www.loja.globo/livro-as-melhores-receitas-do-mais-voce-15-anos.html%3Futm_source%3Dglobocom%26utm_medium%3Dmidia%26utm_campaign%3Dlg_midia_livromaisvoce15anos&amp;nm=2" onfocus="ss('aw0')" onmousedown="st('aw0')" onmouseover="ss('aw0')" onclick="ha('aw0')"><img src="https://tpc.googlesyndication.com/simgad/18328419837946541903" alt="" class="img_ad" border="0" height="250" width="300"></a></div>

        <!-- feed noticias twitter -->
        <?php if (!empty($_SESSION['logado'])) { ?>

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
