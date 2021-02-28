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
    include("../modelo/ModelFabricante.php");
    $modelo             = new ModelFabricante();
    $fabricante         = new Fabricante();
    $retornofabricantes = $modelo->procurarTodos();
?>