<?php
include_once '../../dados/dados-cabecalho.php';
include_once '../../gerenciar/equipes/gerenciador-equipes.php';
include_once '../../gerenciar/atletas/gerenciador-atletas.php';

if (!empty($_POST['id_usuario'])) {
    excluirEquipe($_POST['id_usuario']);
}
if (!empty($_POST['patrocinador_id'])) {
    inserirPatrocinio($_POST);
}    

if(!empty($_POST['atleta_id'])){
    contratarAtleta($_POST);
}
$equipes = buscarEquipes();
$patrocinadores = selecionarPatrocinio();
$atletas = buscarAtletas();



?>
<html>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/gerenciar-usuarios.css"/>
    <?php include_once '../../dados/dados-head.php'; ?>
    <body>
        <div class="geral" >
            <form method="post" action="gerenciar-equipe.php" >
                <input type="hidden" name="delete" value="1"/>
                <input type="hidden" name="patrocinio" value="1"/>
                <table class="table table-bordered">
                    <tr style="text-align: center; font-family: monospace; font-size: 20px;">
                        <td>ID</td>
                        <td>Nome</td>
                        <td>cidade</td>
                        <td>presidente</td>
                        <td colspan="2">Gerenciar</td>
                        <td>Patrocinador</td>
                        <td>Jogadores</td>
                    </tr>
                    <?php foreach ($equipes as $equipe) { ?> 
                        <tr style="text-align: center;">
                        <input type="hidden" name='equipe_id' id="equipe" value="<?php echo $equipe['id']; ?>">
                            <td><?php echo $equipe['id']; ?></td>
                            <td><?php echo $equipe['nome'] ?></td>
                            <td><?php echo $equipe['cidade'] ?></td>
                            <td><?php echo $equipe['presidente'] ?></td>  
                            <!-- é necessario que o button tenha um name-->
                            <td><button name="id_usuario" type="submit" class="btn btn-default navbar-btn" value="<?php echo $equipe['id']; ?>">Excluir</button></td>
                            <td><a href="editar-equipe.php?id=<?php echo $equipe['id']; ?>" class="btn btn-default navbar-btn">Editar</a></td>
                        <?php } ?>
                        <td>
                            <div class="container">        
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#patrocinadores">Patrocinadores</button>
                                <!-- Modal -->
                                <div class="modal fade" id="patrocinadores" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Lista de patrocinadores disponivel</h4>
                                            </div>
                                            <select name="patrocinador_id" id="patrocinador_id" >
                                                <option>Patrocinadores</option>
                                                <?php foreach ($patrocinadores as $patrocinador) { ?>
                                                    <option value="<?php echo $patrocinador['id']; ?>" ><?= $patrocinador['nome']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Adicionar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="container">        
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#atletas">Lista</button>
                                <!-- Modal -->
                                <div class="modal fade" id="atletas" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Atletas disponiveis para sua equipe</h4>
                                            </div>
                                            <div class="modal-body">
                                                <select name="atleta_id" id="atleta_id">
                                                    <option>Atletas</option>
                                                    <?php foreach ($atletas as $atleta) { ?>
                                                        <option value="<?php echo $atleta['id']; ?>" > <?= $atleta['nome']; ?> | <?= $atleta['posicao'];  // <?= nao precisa dar echo  ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Contratar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include_once '../../dados/dados-menulateral.php'; ?>
        <?php include_once '../../dados/dados-rodape.php'; ?>
    </body>
</html>
