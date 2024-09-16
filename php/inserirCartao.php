<?php

//caso acessem o arquivo via url, sem ser via post
//o arquivo gerenciarForm chama esse php, como o post
//'está' no gerenciarForm, ele consegue manipular usar
//esse arquivo sem problemas
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /index.html');
    exit();
}

//fazendo conexão com o banco
require "conexao.php";

//inserindo dados do cartão no banco
function inserirDados($nomeCartao,$numeroCartao,$valCartao,$cvcCartao){
    $conexao = getConexao();
    $sql = "INSERT INTO cartao(nomeCartao,numeroCartao,validadeCartao,cvcCartao) VALUES(?,?,?,?)";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(1,$nomeCartao);
    $stm->bindValue(2,$numeroCartao);
    $stm->bindValue(3,$valCartao);
    $stm->bindValue(4,$cvcCartao);
    $stm->execute();
}
