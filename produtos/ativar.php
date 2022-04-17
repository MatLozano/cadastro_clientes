<?php

require_once 'produto.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {
    // $sql = "UPDATE produtos set ativo = 1 WHERE id = :id";


    // $parameters = array(
    //     ":id" => "{$_GET["id"]}",




    // );

    // $query = $conn->prepare($sql);
    // $query->execute($parameters);
    $ativar = 1;
    $produto = new Produto($conn);
    $produto->alteraStatusProduto($_GET["id"], $ativar);

    header("location:index.php");
}
