<?php
//arquivo criado para fazer a conexão com o banco
//a função retorna a coneção com o banco
function getConexao(){
    $dsn = "mysql:host=localhost;dbname=checkout";
    $usuario = "root";
    $senha = ''; //senha para se conectar com o SGBD
    $conexao = new PDO($dsn,$usuario,$senha);
    return $conexao;
}