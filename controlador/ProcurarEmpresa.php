<?php
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }
    include($antes."modelo/ModelEmpresa.php");
    $modelo      = new ModelEmpresa();
    $retorno     = $modelo->procurarTodos(); 
?>