<?php
session_start();
include_once '../../gerenciar/tipo-noticia/gerenciar-tipoNoticia.php';
include_once '../../gerenciar/login/gerenciador-login.php';
$categorias = buscarCategorias();
?> 
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
                <a class="navbar-brand glyphicon glyphicon-home" href="../../public/inicial/index.php">Noticias</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php foreach ($categorias as $categoria): ?>
                        <li>
                            <a href="<?= $categoria['link'] . '?categoria=' . $categoria['id']; ?>" name="<?= $categoria['nome']; ?>" > <?= $categoria['nome']; ?></a>
                        <?php endforeach; ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Musicas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if (!empty($_SESSION['logado'])) { ?>
                                <li><a href="../musicas_aleatorias/musicas_aleatorias.php">Sertanejo Universitario</a></li>
                            <?php } else { ?>
                                <li><a href="#">Necessario Login</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brasileirao<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if (!empty($_SESSION['logado'])) { ?>
                                <li><a href="../../public/brasileirao/cadastro-equipe.php">Cadastro Equipe</a></li>
                                <li><a href="../../public/brasileirao/gerenciar-equipe.php">Gerenciar Equipes</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/brasileirao/cadastro-atleta.php">Cadastro Atleta</a></li>
                                <li><a href="../../public/brasileirao/gerenciar-atleta.php">Gerenciar Atletas</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/campeonato/cadastrar-campeonato.php">Cadastrar Campeonato</a></li>
                                <li><a href="../../public/campeonato/gerenciar.php">Gerenciar Campeonato</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/rodada/cadastro-rodada.php">Cadastrar Rodada</a></li>
                                <li><a href="../../public/rodada/gerenciar.php">Gerenciar Rodada</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/partida/cadastro-partida.php">Cadastrar Partida</a></li>
                                <li><a href="../../public/partida/gerenciar.php">Gerenciar Partida</a></li>
                                <li><a href="../../public/gol_partida/gerenciar.php">Gols Partida</a></li>
                            <?php } else { ?>
                                <li><a href="../../public/brasileirao/cadastro-equipe.php">Cadastro Equipe</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/brasileirao/cadastro-atleta.php">Cadastro Atleta</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/campeonato/cadastrar-campeonato.php">Cadastrar Campeonato</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/rodada/cadastro-rodada.php">Cadastrar Rodada</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/partida/cadastro-partida.php">Cadastrar Partida</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
                            <?php if (!empty($_SESSION['logado'])) { ?>
                                <li><a href="../../public/fale-conosco/contato.php">Fale Conosco</a></li>
                                <li><a href="../../public/fale-conosco/gerenciar.php">Solicitacoes</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/usuario/cadastro.php">Cadastre-se</a></li>
                                <li><a href="../../public/usuario/gerenciar.php">Gerenciar Usuario</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../public/noticias/cadastro.php">Cadastrar Noticia</a></li>
                                <li><a href="../../public/noticias/gerenciar.php">Gerenciar Noticias</a></li>
                            <?php } else { ?>
                                <li><a href="../../public/fale-conosco/contato.php">Fale Conosco</a></li>
                                <li><a href="../../public/usuario/cadastro.php">Cadastre-se</a></li>
                            <?php } ?>
                        </ul>

                </ul>

                <form class="navbar-form navbar-right" action="../../public/inicial/index.php" method="post">
                    <input  type="text" name="pesquisa" class="form-control" placeholder="Pesquisar Por...">

                </form>
                <!-- dropdown -->

            </div>
        </div>
        <!--/.nav-collapse -->
    </div>

</nav>
</html>