<?php

require_once '../conexao.php';

if($_POST ["nome"] != "" && $_POST["valor"] != "" && $_POST["peso"] != "" && $_POST["estoque"] != "" && $_POST["ativo"] != ""){
$sql = "INSERT INTO produtos (nome, valor, peso, qtd_estoque, ativo) VALUES (:nome, :valor, :peso, :estoque, :ativo)";

$parameters = array(
    ":nome" => "{$_POST["nome"]}",
    ":valor" => "{$_POST["valor"]}",
    ":peso" => "{$_POST["peso"]}",
    ":estoque" => "{$_POST["estoque"]}",
    ":ativo" => "{$_POST["ativo"]}"
    
);

$query = $conn->prepare($sql);
$query->execute($parameters);
header("location:index.php");
}

