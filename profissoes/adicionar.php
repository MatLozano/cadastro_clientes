<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible">
    <meta name="viewport" content="witdh=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <title>Cadastro </title>
</head>


<body>


    <form action="adicionar_funcao.php" method="POST">

        <div class="container-flui">
            <div class="row">
                <div class="container">
                    <div class="text-center">
                        <h1><b>Cadastro de Profissões</b></h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" placeholder="digite sua profissao" name="nome">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Valor da hora</label>
                                <input type="number" class="form-control" placeholder="digite o valor" name="valorhora">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Bonus</label>
                                <input type="number" class="form-control" placeholder="digite o bonus" name="bonus">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Quantidade minima de horas</label>
                                <input type="number" class="form-control" placeholder="digite qnt de horas" name="horaminima">
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
                        <div class="col-xs-12">
                            <div class="form-group">
                                <a class="btn btn-danger" href="index.php"> Voltar </a>

                                <button class="pull-right btn btn-primary" type="submit"> Cadastrar </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</body>











</form>