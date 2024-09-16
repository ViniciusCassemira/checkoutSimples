<?php
//barra o usuário a acessar via url
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /index.html');
    exit();
}
//caso o usuário deseja adicionar um cartão
if ($_POST['acao'] === 'finalizar') {
    if (!empty($_POST['nomeCartao']) && strlen($_POST['numeroCartao']) === 19  && strlen($_POST['valCartao']) === 5 && strlen($_POST['cvcCartao']) === 3) {

        require_once "inserirCartao.php";
        inserirDados($_POST['nomeCartao'], $_POST['numeroCartao'], $_POST['valCartao'], $_POST['cvcCartao']);

        echo "<script> 
                window.location.href = '/index.html' 
                confirm('Compra realizada com sucesso!') 
            </script>";
        exit();
    } else {
        echo "<script> confirm('Os dados não foram inseridos corretamente') window.location.href = '/index.html'; <script>";
        exit();
    }
} //caso deseja visulizar os dados do banco
else if ($_POST['acao'] === 'exibir') {
    header('Location: exibirCartoes.php');
    exit();
}