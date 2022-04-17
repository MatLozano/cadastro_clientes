<?php

// namespace projeto;

class Produto
{
    public $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function alteraStatusProduto($id, $status)
    {


        $sql = "UPDATE produtos set ativo = :status WHERE id = :id";


        $parameters = array(
            ":id" => $id,
            ":status" => $status
        );

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);
    }

    public function getprodutos($ativo, $pesquisar)
    {

        $query_filtro = "WHERE ativo = :ativo";

        if (isset($ativo)) {
            $parameters[":ativo"] = $ativo; 
        }
        //  else {
        //     $parameters[":ativo"] = $ativo;
        // }


        if (isset($pesquisar)and $pesquisar != "")  {
            $query_filtro .= " AND (id LIKE :pesquisar OR nome LIKE :pesquisar OR valor LIKE :pesquisar OR peso LIKE :pesquisar
            OR qtd_estoque LIKE :pesquisar)";

            $parameters[":pesquisar"] = '%' . $pesquisar . '%';
        }

        $sql = "SELECT * FROM produtos {$query_filtro}";

        $query = $this->conn->prepare($sql);
        $query->execute($parameters);

        $produtos = $query->fetchAll();
        return $produtos;
    }
}
