<?php

require_once '../conexao.php';

if($_POST["nome"] != "" && $_POST["valor"] != "" && $_POST["peso"] != "" && $_POST["estoque"] != "" && $_POST["ativo"] != ""){
    $sql = "UPDATE produtos SET nome = :nome, valor = :valor, peso = :peso, qtd_estoque = :estoque, ativo = :ativo WHERE id = :id";

    $parameters = array (
    
        ":nome" => "{$_POST["nome"]}",
        ":valor" => "{$_POST["valor"]}",
        ":peso" => "{$_POST["peso"]}",
        ":estoque" => "{$_POST["estoque"]}",
        ":ativo" => "{$_POST["ativo"]}",
        ":id" => "{$_GET["id"]}"

    );

    $query = $conn->prepare($sql);
    $query->execute($parameters);

    header("location: editar.php?id=" . $_GET["id"]);
}
