<?php

// namespace projeto;

class Profissao
{
    public $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function alteraStatusProfissao($id, $status)
    {


        $sql = "UPDATE profissao set ativo = :status WHERE id = :id";


        $parameters = array(
            ":id" => $id,
            ":status" => $status
        );

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);
    }

    public function getprofissao($ativo, $pesquisar)
    {

        $query_filtro = "WHERE ativo = :ativo";

        if (isset($ativo)) {
            $parameters[":ativo"] = $ativo; 
        }
        //  else {
        //     $parameters[":ativo"] = $ativo;
        // }


        if (isset($pesquisar)and $pesquisar != "")  {
            $query_filtro .= " AND (id LIKE :pesquisar OR nome LIKE :pesquisar)";

            $parameters[":pesquisar"] = '%' . $pesquisar . '%';
        }

        $sql = "SELECT * FROM profissao {$query_filtro}";

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);

        $profissao = $query->fetchAll();
        return $profissao;
    }
}