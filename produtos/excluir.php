<?php

// use projeto\Produto;
require_once 'produto.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {
    // $sql = "UPDATE produtos set ativo = 0 WHERE id = :id";


    // $parameters = array(
    //     ":id" => "{$_GET["id"]}",




    // );

    // $query = $conn->prepare($sql);
    // $query->execute($parameters);
    $inativo = 0;
    $produto = new Produto($conn);
    $produto->alteraStatusProduto($_GET["id"], $inativo);


    
  


    header("location:index.php");
}
