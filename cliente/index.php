<?php

require_once '../conexao.php';
// require_once '../funcoes_uteis.php';
require_once 'cliente.php';


$query_filtro = "WHERE ativo = :ativo";
$parameters = array();
$ativo = (isset($_GET["ativo"]) ? $_GET["ativo"] : 1);
$pesquisar = (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : "");
$parameters[":ativo"] = $ativo;

$clienteObjeto = new cliente($conn);
$clientes = $clienteObjeto->getclientes($ativo, $pesquisar);


// if (isset($_GET["pesquisar"])) {
//     $query_filtro .= " AND (c.id LIKE :pesquisar OR c.nome LIKE :pesquisar OR c.idade LIKE :pesquisar OR 
//                 c.endereco LIKE :pesquisar OR p.nome LIKE :pesquisar)";

//     $parameters[":pesquisar"] = "%" . $_GET["pesquisar"] . "%";
// }


// $sql = "SELECT  
//                 c.id, c.nome, c.idade, c.endereco, c.ativo, c.carga_horaria, c.altura, c.peso, c.sexo,
//                 p.percentual_bonus, p.qntminima_hora, p.valor_hora, p.nome AS profissao 
//                 FROM cliente c
//                 LEFT JOIN profissao p ON c.id_profissao = p.id
//                 {$query_filtro}";






// $query = $conn->prepare($sql);
// $query->execute($parameters);

// $clientes = $query->fetchAll();



?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <form action="" method="GET">
                        <div class="col-xs-12">
                            <div class="alinhar-botoes">
                                <div class="box-botoes">
                                    <a href="adicionar.php" class="pull-right btn btn-primary">Cadastrar</a>
                                    <a href="/treino" class="btn btn-danger">Voltar</a>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-center"><b>Clientes</b></h1>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input class="form-control" value="<?= (isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : ""); ?>" type="text" name="pesquisar" placeholder="Digite sua busca...">
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


                    <div class="col-xs-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Endereço</th>
                                <th>Profissão</th>
                                <th>Salário</th>
                                <th>Imc</th>
                                <th>Ativo</th>


                                <th style="width: 180px;" class="text-center">Ações</th>


                            </thead>


                            <tbody>
                                <?php
                                $soma_salario = 0;
                                $media_salario = 0;
                                $salario_total = 0;
                                $qtdClientes = 0;
                                ?>
                                <?php
                                foreach ($clientes as $cliente) {


                                    $salario_total = $clienteObjeto->calculaSalarioCliente($cliente->carga_horaria, $cliente->valor_hora, $cliente->qntminima_hora, $cliente->percentual_bonus);

                                    $imc_texto = $clienteObjeto->calculaImcCliente($cliente->altura, $cliente->peso);

                                    $soma_salario = $soma_salario + $salario_total;

                                    $qtdClientes++;



                                ?>

                                    <tr>
                                        <td><?= $cliente->id; ?></td>
                                        <td><?= $cliente->nome; ?></td>
                                        <td><?= $cliente->idade; ?></td>
                                        <td><?= $cliente->endereco; ?></td>
                                        <td><?= $cliente->profissao; ?></td>
                                        <td><?= "R$ " . number_format($salario_total, 2, ",", "."); ?></td>
                                        <td><?= $imc_texto; ?></td>
                                        <td><?= $cliente->ativo == 1 ? "ativo" : "inativo"; ?></td>
                                        <td class="text-center">
                                            <a href="editar.php?id=<?= $cliente->id ?>" class="btn btn-primary">Editar</a>

                                            <?php

                                            if ($cliente->ativo == 1) {
                                            ?>

                                                <a href="excluir.php?id=<?= $cliente->id ?>" class="btn btn-danger">Excluir</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="ativar.php?id=<?= $cliente->id ?>" class="btn btn-success">Ativar</a>
                                            <?php
                                            }
                                            ?>
                                        </td>


                                    </tr>

                                <?php
                                }
                                ?>
                                <?php
                                if ($qtdClientes > 0) $media_salario = $soma_salario / $qtdClientes;
                                ?>
                                <tr>



                                    <td colspan="6" style="text-align: right;"> <label for="">Soma dos Salários: </label><?= "R$ " . number_format($soma_salario, 2, ",", "."); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right;"> <label for="">Média Salárial: </label><?= "R$ " . number_format($media_salario, 2, ",", "."); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>