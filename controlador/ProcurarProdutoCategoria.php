<?php
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }  
    if(isset($_REQUEST["codproduto"])){
        $codproduto = $_REQUEST["codproduto"];
        $filtro     = " and p.codproduto <> '$codproduto' ";
    }

    if(isset($_REQUEST["codcategoria"])){
        $codcategoria = $_REQUEST["codcategoria"];
        $filtro       = "and p.codcategoria = '$codcategoria'";
    }

    if(isset($_REQUEST["procurar"])){
        $procurar = $_REQUEST["procurar"];
        $filtro   = "and p.nome like '%$procurar%'";
    }
    $query = "select p.*,"
            . "(select nome from categoriaproduto where codcategoria = p.codcategoria) as categoria"
            . " from produto p"
            . " where 1 = 1"
            . " $filtro";
    require_once($antes."modelo/ModelProduto.php");
    $modelo           = new ModelProduto();
    $produtocategoria = $modelo->procurar($query);
?>