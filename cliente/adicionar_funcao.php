<?php

require_once '../conexao.php';

if ($_POST["nome"] != "" && $_POST["idade"] != "" && $_POST["altura"] != "" && $_POST["peso"] != "" && 
$_POST["sexo"] != "" && $_POST["endereco"] != "" && $_POST["profissao"] != "" && $_POST["horasmes"] != "" && $_POST["ativo"] != "") {
    $sql = "INSERT INTO cliente (nome, idade, altura, peso, sexo, endereco, id_profissao, carga_horaria, ativo) 
    VALUES (:nome, :idade, :altura, :peso, :sexo, :endereco, :profissao, :horasmes, :ativo)";

    $parameters = array(
        ":nome" => "{$_POST["nome"]}",
        ":idade" => "{$_POST["idade"]}",
        ":altura" => "{$_POST["altura"]}",
        ":peso" => "{$_POST["peso"]}",
        ":sexo" => "{$_POST["sexo"]}",
        ":endereco" => "{$_POST["endereco"]}",
        ":profissao" => "{$_POST["profissao"]}",
        ":horasmes" => "{$_POST["horasmes"]}",
        ":ativo" => "{$_POST["ativo"]}"

    );

    $query = $conn->prepare($sql);
    $query->execute($parameters);
    header("location:index.php");
}
