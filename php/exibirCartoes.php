<?php
//fazendo a conexão com o banco através do php externo
require "conexao.php";
$conexao = getConexao();

//fazendo a consulta no banco dos cartões
$sql = "SELECT * FROM cartao";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
$linhas = count($resultado);

?>
<!-- mostrando resultado na tela com uma <table> -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/exibirCartoes.css">
    <title>Cartões inseridos</title>
</head>
<body>
    <?php
    if($linhas > 0){
        echo "<h1>Cartões salvos</h1>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome no cartão</th>";
        echo "<th>Número do cartão</th>";
        echo "<th>Validade</th>";
        echo "<th>CVC</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($resultado as $posicao){
            echo "<tr>";
            echo "<td>{$posicao->nomeCartao}</td>";
            echo "<td>{$posicao->numeroCartao}</td>";
            echo "<td>{$posicao->validadeCartao}</td>";
            echo "<td>{$posicao->cvcCartao}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<div class='linkContainer'>";
        echo" <a href='/php/apagar.php' id='apagarRegistros'>Apagar registros</a>";
        echo "</div>";
    }else{
        echo "<h1>Ops...</h1>";
        echo "<h2>Nenhum cartão foi inserido no banco</h2>";
    }
    ?>
    <br>
    <div class="linkContainer">
        <a href="/index.html">Tela inicial</a>
    </div>
</body>
</html>