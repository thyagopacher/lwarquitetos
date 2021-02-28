<?php
    try{
        if(isset($painel) && $painel === "index"){
            $antes = "";
        }
        if($painel !== "index"){
            $antes = "../";
        }        
        include($antes."modelo/ModelConfiguracao.php");
        $modelo              = new ModelConfiguracao();
        $retornoconfiguracao = $modelo->procurarTodos();
    }catch(Exception $ex){
        echo("Erro causado por:<br>". $ex);
    }
?>