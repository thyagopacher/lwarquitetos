<?php
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";
    }else{
        if(isset($painel) && $painel === "INDEX"){
            $antes = "";
        }else{
            $antes = "../";
        }
    }
    include("../modelo/ModelProduto.php");
    $modelo           = new ModelProduto();
    $query            = "select * from produto order by codproduto desc limit 0,12";
    $retornoproduto   = $modelo->procurar($query);
?>