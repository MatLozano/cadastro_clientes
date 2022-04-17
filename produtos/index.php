<?php

require_once 'produto.php';
require_once '../conexao.php';

$query_filtro = "WHERE ativo = :ativo";
$parameters = array();
$ativo = (isset($_GET["ativo"]) ? $_GET["ativo"] : 1);
$pesquisar = (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : "");

$produto = new Produto($conn);
$produtos = $produto->getprodutos($ativo, $pesquisar);

// if (isset($_GET["ativo"])) {
//     $parameters[":ativo"] = $_GET["ativo"];

// }else{
//     $parameters[":ativo"] = $ativo;
// }

// if (isset($_GET["pesquisar"])) {
//     $query_filtro .= " AND (id LIKE :pesquisar OR nome LIKE :pesquisar OR valor LIKE :pesquisar OR peso LIKE :pesquisar
//         OR qtd_estoque LIKE :pesquisar)";

//     $parameters[":pesquisar"] = '%' . $_GET["pesquisar"] . '%';
// }

// $sql = "SELECT * FROM produtos {$query_filtro} ";

// $query = $conn->prepare($sql);
// $query->execute($parameters);

// $produtos = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alinhar-botoes">
                            <div class="col-xs-12 box-botoes">
                                <a href="adicionar.php" class="pull-right btn btn-primary">Cadastrar</a>
                                <a href="/treino" class="btn btn-danger">Voltar</a>
                            </div>

                            <h1 class="text-center"><b>Produtos</b></h1>

                        </div>
                        <form action="" method="GET">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input class="form-control" value="" <?= (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : ""); ?> type="text" name="pesquisar" placeholder="Qual produto desejado?">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <select class="form-control" name="ativo">

                                        <option <?= (isset($_GET["ativo"]) && $_GET["ativo"] == "1") ? "selected" : ""; ?> value="1">Ativo</option>
                                        <option <?= (isset($_GET["ativo"]) && $_GET["ativo"] == "0") ? "selected" : ""; ?> value="0">Inativo</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Pesquisar</button>
                            </div>
                        </form>

                        <!-- <div class="box-botoes">
                            <a href="adicionar.php" class="pull-right btn btn-primary">Cadastrar</a>
                            <a href="/treino" class="btn btn-danger">Voltar</a>

                        </div> -->
                        <div class="col-xs-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Peso</th>
                                <th>Estoque</th>
                                <th>Ativo</th>
                                <th style="width: 180px;" class="text-center">Ações</th>
                            </thead>
                            <?php

                            foreach ($produtos as $produto) {



                            ?>
                                <tr>
                                    <td><?= $produto->id; ?></td>
                                    <td><?= $produto->nome; ?></td>
                                    <td><?= $produto->valor; ?></td>
                                    <td><?= $produto->peso; ?></td>
                                    <td><?= $produto->qtd_estoque; ?></td>
                                    <td><?= $produto->ativo == 1 ? "ativo" : "inativo"; ?></td>
                                    <td class="text-center">
                                        <a href="editar.php?id=<?= $produto->id ?>" class="btn btn-primary">Editar</a>

                                        <?php
                                        if ($produto->ativo == 1) {
                                        ?>
                                            <a href="excluir.php?id=<?= $produto->id ?>" class="btn btn-danger">Excluir</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="ativar.php?id=<?= $produto->id ?>" class="btn btn-success">Ativar</a>

                                        <?php
                                        }
                                        ?>













                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>






</body>

</html>