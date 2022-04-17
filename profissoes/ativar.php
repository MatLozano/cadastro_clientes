<?php

require_once 'profissoes.php';
require_once '../conexao.php';


if ($_GET["id"] != "") {

    $ativar = 1;
    $profissao = new Profissao($conn);
    $profissao->alteraStatusProfissao($_GET["id"], $ativar);

    header("location:index.php");
}