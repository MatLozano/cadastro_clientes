<?php

    require_once '../conexao.php';
    require_once '../funcoes_uteis.php';
    require_once 'cliente.php';

    $sql = "SELECT 
                    c.id, c.nome, c.idade, c.endereco, c.carga_horaria, c.altura, c.peso, c.sexo, c.ativo,
                    p.valor_hora, c.id_profissao, p.percentual_bonus, p.qntminima_hora, p.nome AS profissao
                FROM cliente c
                    LEFT JOIN profissao p ON c.id_profissao = p.id WHERE c.id = :id";

    $query = $conn->prepare($sql);
    $parameters = array(
        ":id" => $_GET["id"]
    );
    $query->execute($parameters);

    $cliente = $query->fetch();

    $sql = "SELECT * FROM profissao";

    $query = $conn->prepare($sql);
    $query->execute();

    $profissoes = $query->fetchAll();
$clienteObjeto = new cliente($conn);
$salario = $clienteObjeto->calculaSalarioCliente($cliente->carga_horaria, $cliente->valor_hora, $cliente->qntminima_hora, $cliente->percentual_bonus);
$imc_texto = $clienteObjeto->calculaImcCliente($cliente->altura, $cliente->peso);
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
                                <input id="nome" type="text" class="form-control" placeholder="Digite o nome" name="nome" value="<?= $cliente->nome ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input id="idade" type="number" class="form-control" placeholder="Digite a idade" name="idade" min="1" max="120" value="<?= $cliente->idade ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Altura</label>
                                <input type="text" class="form-control" placeholder="digite a altura" name="altura" value="<?= $cliente->altura ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Peso</label>
                                <input type="text" class="form-control" placeholder="digite o peso" name="peso" value="<?= $cliente->peso ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input id="endereco" type="text" class="form-control" placeholder="Digite o endereço" name="endereco" value="<?= $cliente->endereco ?>">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Profissao</label>



                                <select class="form-control" name="profissao">
                                    <?php foreach ($profissoes as $profissao) { ?>


                                        <option <?= ($profissao->id == $cliente->id_profissao) ? "selected" : ""; ?> value="<?= $profissao->id; ?>"> <?= $profissao->nome; ?></option>


                                    <?php } ?>

                                </select>

                            </div>

                        </div>
                        
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Quantidade de horas trabalhada</label>
                                <input type="number" class="form-control" placeholder="digite a carga horaria " min="1" max="400" name="horasmes" value="<?= $cliente->carga_horaria ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="ativo">

                                    <option <?= ($cliente->ativo == "1")  ? "selected" : ""; ?> value="1">Ativo</option>
                                    <option <?= ($cliente->ativo == "0") ? "selected" : ""; ?> value="0">Inativo</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Salário</label>
                                <?= $salario ?>

                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">

                                <input id="masculino" type="radio" name="sexo" <?= ($cliente->sexo == "masculino") ? "checked" : ""; ?> value="masculino">
                                <label for="masculino">Masculino</label>
                                <input id="feminino" type="radio" name="sexo" <?= ($cliente->sexo == "feminino") ? "checked" : ""; ?> value="feminino">
                                <label for="feminino">Feminino</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Imc</label>
                                <?= $imc_texto ?>

                            </div>
                        </div>
                        

                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="index.php" class="btn btn-danger">Voltar</a>
                                </div>
                                <div class="col-xs-6">
                                    <button class="pull-right btn btn-primary" type="submit"> Salvar </button>
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


<!-- <!DOCTYPE html>
<head><title> </title></head>


<body>
    

<form action="cadastro_cliente.php" method="POST">
    <h1>Cadastro de Clientes</h1>
    <div>
        <label for="">nome</label>
        <input type="text" placeholder="digite seu nome" name="nome" >
    </div>
    <div>
        <label for="">idade</label> 
        <input type="number" placeholder="digite sua idade" name="idade" >  
    </div>
    <div>
        <label for="">enderco</label>
        <input type="text" placeholder="digite seu endereco" name="endereco" >
    </div>
    

    <button type="submit"> Cadastrar </button>
</body>


 
    







</form> -->