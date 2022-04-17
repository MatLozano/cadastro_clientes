<?php

require_once '../conexao.php';

if ($_POST["nome"] != "" && $_POST["valorhora"] != "" && $_POST["bonus"] != "" && $_POST["horaminima"] != "" && $_POST["ativo"] != ""){
    $sql = "INSERT INTO profissao (nome, valor_hora, percentual_bonus, qntminima_hora, ativo) VALUES (:nome, :valorhora, :bonus, :horaminima, :ativo)";

    $parameters = array(
        ":nome" => "{$_POST["nome"]}",
        ":valorhora" => "{$_POST["valorhora"]}",
        ":bonus" => "{$_POST["bonus"]}",
        ":horaminima" => "{$_POST["horaminima"]}",
        ":ativo" => "{$_POST["ativo"]}"
        
    );

    $query = $conn->prepare($sql);
    $query->execute($parameters);
    header("location:index.php");
}