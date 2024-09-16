<?php
require "conexao.php";
$conexao = getConexao();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "INSERT INTO cartao(nomeCartao,numeroCartao,validadeCartao,cvcCartao) VALUES(?,?,?,?)";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(1,$_POST["nomeCartao"]);
    $stm->bindValue(2,$_POST["numeroCartao"]);
    $stm->bindValue(3,$_POST["valCartao"]);
    $stm->bindValue(4,$_POST["cvcCartao"]);
    $stm->execute();
    header('location: /index.html');
    exit();
}

//fazendo a consulta no banco dos cartões
$sql = "SELECT * FROM cartao";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!-- mostrando resultado na tela com uma <table> -->
<h1>Resultado</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nome no cartão</th>
            <th>Número do cartão</th>
            <th>Validade</th>
            <th>CVC</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(count($resultado) > 0){
            foreach($resultado as $posicao){
                echo "<tr>";
                echo "<td>{$posicao->nomeCartao}</td>";
                echo "<td>{$posicao->numeroCartao}</td>";
                echo "<td>{$posicao->validadeCartao}</td>";
                echo "<td>{$posicao->cvcCartao}</td>";
                echo "</tr>";
            }
            echo "<script>alert('Sou um alert')</script>";
        }
        ?>
    </tbody>
</table>
