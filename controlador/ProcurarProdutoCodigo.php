<?php
    if(isset($_REQUEST["codproduto"])){
        $codproduto = $_REQUEST["codproduto"];
    }else{
        die("Cod produto nao preenchido");
    }
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";
    }else{
        if(isset($painel) && $painel === "INDEX"){
            $antes = "";
        }else{
            $antes = "../";
        }
    }
    require_once("../modelo/ModelProduto.php");
    $modelo           = new ModelProduto();
    $query            = "select * from produto where codproduto = '$codproduto'";
    $retornoproduto   = $modelo->procurar($query);
?>