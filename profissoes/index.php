<?php

require_once '../conexao.php';
require_once 'profissoes.php';


// $query_filtro = "";
// $parameters = array();

// if (isset($_GET["pesquisar"])) {
//     $query_filtro = " WHERE id LIKE :pesquisar OR nome LIKE :pesquisar";

//     $parameters[":pesquisar"] = '%' . $_GET["pesquisar"] . '%';
// }

// $sql = "SELECT * FROM profissao {$query_filtro}";

// $query = $conn->prepare($sql);
// $query->execute($parameters);

// $profissoes = $query->fetchAll();

$query_filtro = "WHERE ativo = :ativo";
$parameters = array();
$ativo = (isset($_GET["ativo"]) ? $_GET["ativo"] : 1);
$pesquisar = (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : "");

$profissao = new Profissao($conn);
$profissoes = $profissao->getprofissao($ativo, $pesquisar);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profissões</title>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
        <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <form action="" method="GET">
                        <div class="alinhar-botoes">
                        <div class="col-xs-12">
                            <div class="alinhar-botoes">
                                <a href="adicionar.php" class="pull-right btn btn-primary">Cadastrar</a>
                                <a href="/treino" class="btn btn-danger">Voltar</a>
                            </div>
                            </div>
                        </div>
                        <h1 class="text-center"><b>Profissões</b></h1>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input class="form-control" value="<?= (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : ""); ?>" type="text" name="pesquisar" placeholder="Qual profissão desejada?">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div>
                                <select class="row form-control" name="ativo">

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
                            <th>Profissão</th>
                            <th>Ativo</th>
                            <th style="width: 180px;" class="text-center">Ações</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($profissoes as $profissao) {
                            ?>
                                <tr>
                                    <td><?= $profissao->id; ?></td>
                                    <td><?= $profissao->nome; ?></td>
                                    <td><?= $profissao->ativo == 1 ? "ativo" : "inativo"; ?></td>
                                    <td class="text-center">
                                        <a href="editar.php?id=<?= $profissao->id ?>" class="btn btn-primary">Editar</a>
                                        <?php
                                        if ($profissao->ativo == 1) {
                                        ?>
                                            <a href="excluir.php?id=<?= $profissao->id ?>" class="btn btn-danger">Excluir</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="ativar.php?id=<?= $profissao->id ?>" class="btn btn-success">Ativar</a>
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
</body>

</html>