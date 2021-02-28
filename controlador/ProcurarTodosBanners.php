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
    include("../modelo/ModelBanner.php");
    $modelo         = new ModelBanner();
    $banner         = new Banner();
    $retornobanners = $modelo->procurarTodos();
?>