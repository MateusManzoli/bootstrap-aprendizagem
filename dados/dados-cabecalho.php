<?php session_start();

 include_once'../../gerenciar/login/gerenciador-login.php'; ?>

<html>
    <nav class="navbar navbar-inverse  navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <!-- <span class="sr-only">Toggle navigation</span> -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../public/inicial/index.php">Noticias</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../../public/inicial/index.php">Home</a></li>
                    <li><a href="#">Saúde</a></li>
                    <li><a href="#">Esporte</a></li>
                    <li><a href="#">Economia</a></li>
                    <li><a href="#">Educação</a></li>
                    <li><a href="#">Politica</a></li>
                    <form class="navbar-form navbar-right" action="../../public/inicial/index.php" method="post">
                        <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar Por...">
                    </form>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sua Região <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Centro-Oeste</a></li>
                            <li><a href="#">Nordeste</a></li>
                            <li><a href="#">Norte</a></li>
                            <li><a href="#">Sul</a></li>
                            <li><a href="#">Sudeste</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
                            <li><a href="../../public/fale-conosco/contato.php">Fale Conosco</a></li>
                            <?php if (!empty($_SESSION['logado'])) { ?>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/usuario/cadastro.php">Cadastrar Usuario</a></li>
                                <li><a href="../../public/usuario/gerenciar.php">Gerenciar Usuario</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/noticias/cadastro.php">Cadastrar Noticia</a></li>
                                <li><a href="../../public/noticias/gerenciar.php">Gerenciar Noticias</a></li>
                            <?php } ?>
                        </ul>
                        </div>
                            <!--/.nav-collapse -->
        </div>
                        </nav>
