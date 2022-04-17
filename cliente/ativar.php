<?php

require_once 'cliente.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {
    // $sql = "UPDATE cliente set ativo = 1 WHERE id = :id";


    // $parameters = array(
    //     ":id" => "{$_GET["id"]}",




    // );

    // $query = $conn->prepare($sql);
    // $query->execute($parameters);
    $ativar = 1;
    $cliente = new cliente($conn);
    $cliente->alteraStatusClientes($_GET["id"], $ativar);

    header("location:index.php");
    }