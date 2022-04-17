<?php 

// require_once '../conexao.php';

// # No botão de excluir da index.php, passar por parametro o ID do item a ser excluído, apontando pra excluir.php
// # no arquivo excluir.php, verifica se existe o ID do item no array GET
// # Criar a query pra DELETAR o item, utilizando como parâmetro o ID que veio no GET

// if ($_GET ["id"] != ""){
//     $sql = "DELETE FROM profissao WHERE id = :id"; 


//     $parameters = array(
//         ":id" => "{$_GET["id"]}"
//     );

//     $query = $conn->prepare($sql);
//     $query->execute($parameters);
//     header("location:index.php");




require_once 'profissoes.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {
    // $sql = "UPDATE produtos set ativo = 0 WHERE id = :id";


    // $parameters = array(
    //     ":id" => "{$_GET["id"]}",




    // );

    // $query = $conn->prepare($sql);
    // $query->execute($parameters);
    $inativo = 0;
    $profissao = new Profissao($conn);
    $profissao->alteraStatusProfissao($_GET["id"], $inativo);


    
  


    header("location:index.php");
}