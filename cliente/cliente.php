<?php

// namespace projeto;

class Cliente
{
    public $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }





    public function alteraStatusClientes($id, $status)
    {


        $sql = "UPDATE cliente set ativo = :status WHERE id = :id";


        $parameters = array(
            ":id" => $id,
            ":status" => $status
        );

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);
    }






    public function getclientes($ativo, $pesquisar)
    {

        $query_filtro = "WHERE c.ativo = :ativo";

        if (isset($ativo)) {
            $parameters[":ativo"] = $ativo;
        }
        if (isset($_GET["pesquisar"])) {
            $query_filtro .= " AND (c.id LIKE :pesquisar OR c.nome LIKE :pesquisar OR c.idade LIKE :pesquisar OR 
                        c.endereco LIKE :pesquisar OR p.nome LIKE :pesquisar)";

            $parameters[":pesquisar"] = "%" . $_GET["pesquisar"] . "%";
        }


        $sql = "SELECT  
                        c.id, c.nome, c.idade, c.endereco, c.ativo, c.carga_horaria, c.altura, c.peso, c.sexo,
                        p.percentual_bonus, p.qntminima_hora, p.valor_hora, p.nome AS profissao 
                        FROM cliente c
                        LEFT JOIN profissao p ON c.id_profissao = p.id
                        {$query_filtro}";

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);

        $clientes = $query->fetchAll();
        return $clientes;
    }


    

    function calculaSalarioCliente($carga_horaria, $valor_hora, $qtd_minima_hora, $percentual_bonus)
    {
        $salario = 0;
        $salario = $carga_horaria * $valor_hora;
    
        if ($carga_horaria > $qtd_minima_hora) {
    
            $salario = (1 + ($percentual_bonus / 100)) * $salario;
        }
    
        return $salario;
    }
    
    
    
    
    
    
    
    
    
    function calculaImcCliente($altura, $peso)
    {
    
        $imc = 0;
        $altura = $altura / 100;
        $imc = $peso / ($altura * $altura);
        $imc_texto = 0;
    
        if ($imc < 18.5) {
            $imc_texto = "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            $imc_texto = "Peso ideal";
        } elseif ($imc >= 25.0 && $imc <= 29.9) {
            $imc_texto = "Acima do peso";
        } elseif ($imc > 30.0) {
            $imc_texto =  "Obesidade";
        }
    
    
        return $imc_texto;
    }
    





}








