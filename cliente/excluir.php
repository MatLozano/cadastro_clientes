<?php

// require_once '../conexao.php';


// if ($_GET["id"] != "") {
//     $sql = "DELETE FROM cliente WHERE id = :id";


//     $parameters = array(
//         ":id" => "{$_GET["id"]}"
//     );

//     $query = $conn->prepare($sql);
//     $query->execute($parameters);
//     header("location:index.php");
// }


// use projeto\Produto;
require_once 'cliente.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {
    // $sql = "UPDATE cliente set ativo = 0 WHERE id = :id";


    // $parameters = array(
    //     ":id" => "{$_GET["id"]}",




    // );

    // $query = $conn->prepare($sql);
    // $query->execute($parameters);
    $inativo = 0;
    $cliente = new cliente($conn);
    $cliente->alteraStatusClientes($_GET["id"], $inativo);


    
  


    header("location:index.php");

    }
