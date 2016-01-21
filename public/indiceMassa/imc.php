<?php
ini_set('display_errors', 0);
error_reporting(0);

include_once '../../dados/dados-cabecalho.php';
include_once '../../dados/dados-head.php';
include_once '../../gerenciar/calculo-imc/gerenciarCalculoImc.php';
try {
    $execute = [];

    if ($_POST) {
        $calculo = calcularImc($_POST['peso'], $_POST['altura']);
        $execute['mensagem'] = "Imc calculado com êxito";
        $execute['tipo'] = "alert-success";
    }
    // a variavel do exception nao pode ser a mesma da mensagem e tipo
} catch (Exception $e) {
    $execute['mensagem'] = $e->getMessage();
    $execute['tipo'] = "alert-danger";
}
?>
<body>
    <link rel="stylesheet" type="text/css" href="../../estilos-paginas/estilo-imc.css"/>
    <div class="containers">
        <form class="form-signin" action="imc.php" method="post">

            <?php
            if (!empty($execute)) {
                ?>
                <div class="alert <?= $execute['tipo']; ?>">
                    <?= $execute['mensagem']; ?>
                </div>
            <?php } ?>
            <h2 class="form-signin-heading">Calcule seu IMC</h2>
            <div class="peso">
                <label for="inputPeso" class="sr-only"> </label>
                <input name="peso" type="text" maxlength="4" class="form-control a" placeholder="Peso" required />
            </div>
            <div class="altura">
                <label for="inputAltura" class="sr-only"></label>
                <input name="altura" type="text" maxlength="4" class="form-control b" placeholder="Altura" required/>
            </div>
            <div class="botao">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Calcular</button>
            </div>

            <h2>Dúvidas sobre o IMC</h2>
            <p><b>O que significa IMC?</b> - IMC é uma sigla utilizada para Índice de Massa Corporal, que é uma medida utilizada para medir a obesidade</p>
            <p><b>Como fazer o cálculo do IMC?</b> - O cálculo do IMC é feito dividindo o peso (em quilogramas) pela altura (em metros) ao quadrado</p>            <p><b>Quais são as limitações do IMC?</b> - O IMC pode apresentar alterações, dependendo de fatores como a prática de exercícios físicos.</p>
            <p><b>O cálculo do IMC é diferente para mulheres e homens?</b> - Não, o IMC se calcula igual para homens e mulheres.</p>

        </form>

    </div> <!-- /container -->
    <?php if (!empty($calculo)) { ?>
        <div class="resultado">
            <p><b><?= 'Sua massa corporea é de: ' . number_format($calculo['valor'], 2, ',', '.') //com number format indiquei que teria 2 casas apos a virgula e que a virgula seria substituida por um ponto   ?></b></p>
            <p><b><?= 'situação: ' . $calculo['situacao']; ?></b></p>
            <p><img src="../../imagens/tabela-imc.jpg"></p>
        </div>
    <?php } ?>

    <?php
    include_once '../../dados/dados-menulateral.php';
    include_once '../../dados/dados-rodape.php';
    ?>