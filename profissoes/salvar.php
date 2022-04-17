<?php

require_once '../conexao.php';

if ($_POST["nome"] != "" && $_POST["valorhora"] != "" && $_POST["bonus"] != "" && $_POST["horaminima"] != "" && $_POST["ativo"] != ""){
    $sql = "UPDATE profissao set nome = :nome, valor_hora = :valorhora, percentual_bonus = :bonus, qntminima_hora = :horaminima, ativo = :ativo  WHERE id = :id";

    $parameters = array(
        ":nome" => "{$_POST["nome"]}",
        ":valorhora" => "{$_POST["valorhora"]}",
        ":bonus" => "{$_POST["bonus"]}",
        ":horaminima" => "{$_POST["horaminima"]}",
        ":ativo" => "{$_POST["ativo"]}",
        ":id" => "{$_GET["id"]}"
    );

    $query = $conn->prepare($sql);
    $query->execute($parameters);
    header("location: editar.php?id=" . $_GET ["id"]);
}
