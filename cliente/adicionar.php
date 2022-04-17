<?php
require_once "../conexao.php";

    $sql = "SELECT * FROM profissao";
 
    $query = $conn->prepare($sql);
    $query->execute();

    $profissoes = $query->fetchAll();
   

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible">
    <meta name="viewport" content="witdh=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <form action="adicionar_funcao.php" method="POST">
                <div class="container">
                    <h1 class="text-center">Cadastro de Clientes</h1>
                    <div class="row">

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id="nome" type="text" class="form-control" placeholder="digite o nome" name="nome">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Idade</label>
                                <input type="number" class="form-control" placeholder="digite a idade" min=1 max=120 name="idade">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Altura</label>
                                <input type="number" class="form-control" placeholder="digite a altura" name="altura">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Peso</label>
                                <input type="number" class="form-control" placeholder="digite o peso" name="peso">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Endereco</label>
                                <input type="text" class="form-control" placeholder="digite o endereco" name="endereco">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Profissao</label>
                                <select class="form-control" name="profissao">
                                    <?php foreach ($profissoes as $profissao) { ?>

                                        <option value="<?= $profissao->id; ?>"> <?= $profissao->nome; ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Quantidade de horas trabalhada</label>
                                <input type="number" class="form-control" placeholder="digite carga horaria" min="1" max="400" name="horasmes">
                            </div>
                        </div>
                       
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="ativo">

                                    <option selected value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                    

                                </select>

                            </div>

                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <input id="masculino" type="radio" name="sexo">
                                <label for="masculino">Masculino</label>
                                <input id="feminino" type="radio" name="sexo">
                                <label for="feminino">Feminino</label>
                            </div>
                        </div>





                    </div>
                    <div class="row">
                        <div class="col-xs-12">

                            <a class="btn btn-danger" href="index.php"> Voltar </a>

                            <button class="pull-right btn btn-primary" type="submit"> Cadastrar </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>