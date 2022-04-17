<?php

    require_once '../conexao.php';

    $sql = "SELECT * FROM produtos WHERE id = :id";

    $query = $conn->prepare($sql);
    $parameters = array(
        ":id" => $_GET["id"]
    );
    $query->execute($parameters);

    $produtos = $query->fetch();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <form action="salvar.php?id=<?= $_GET["id"]; ?>" method="post">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id="nome" type="text" class="form-control" placeholder="Digite o produto" name="nome" value="<?= $produtos->nome ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="nome">Valor</label>
                                <input id="nome" type="text" class="form-control" placeholder="Digite o valor" name="valor" value="<?= $produtos->valor ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="nome">Peso</label>
                                <input id="nome" type="text" class="form-control" placeholder="Digite o peso" name="peso" value="<?= $produtos->peso ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Estoque</label>
                                <input type="number" class="form-control" placeholder="Digite o estoque" name="estoque" value="<?= $produtos->qtd_estoque ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="ativo">

                                    <option <?= ($produtos->ativo == "1")  ? "selected" : ""; ?> value="1">Ativo</option>
                                    <option <?= ($produtos->ativo == "0") ? "selected" : ""; ?> value="0">Inativo</option>

                                </select>

                            </div>

                        </div>


                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="index.php" class="btn btn-danger">Voltar</a>
                                </div>
                                <button class="pull-right btn btn-primary" type="submit">Salvar</button>


                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>