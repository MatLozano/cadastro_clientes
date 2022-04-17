<?php

require_once '../conexao.php';

if (
    $_POST["nome"] != "" && $_POST["idade"] != "" && $_POST["altura"] != "" && $_POST["peso"] != "" && $_POST["sexo"] != "" && $_POST["endereco"] != "" && $_POST["profissao"] != "" && $_POST["horasmes"] != ""
    && $_POST["ativo"] != ""
) {
    $sql = "UPDATE cliente set nome = :nome, idade = :idade, altura = :altura, peso = :peso, sexo = :sexo, endereco = :endereco,  id_profissao = :profissao, carga_horaria = :horasmes, ativo = :ativo  WHERE id = :id";

    $parameters = array(
        ":nome" => "{$_POST["nome"]}",
        ":idade" => "{$_POST["idade"]}",
        ":altura" => "{$_POST["altura"]}",
        ":peso" => "{$_POST["peso"]}",
        ":sexo" => "{$_POST["sexo"]}",
        ":endereco" => "{$_POST["endereco"]}",
        ":profissao" => "{$_POST["profissao"]}",
        ":horasmes" => "{$_POST["horasmes"]}",
        ":ativo" => "{$_POST["ativo"]}",
        ":id" => "{$_GET["id"]}"
    );

    $query = $conn->prepare($sql);
    $query->execute($parameters);

    header("location: editar.php?id=" . $_GET["id"]);
}
