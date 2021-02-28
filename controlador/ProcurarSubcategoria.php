<?php
    require_once ("../modelo/ModelCategoriaProduto.php");

    function inicializaAntes(){
        if(isset($painel) && $painel === TRUE){
            $antes = "../../";
        }else{
            if(isset($painel) && $painel === "INDEX"){
                $antes = "";
            }else{
                $antes = "../";
            }
        }           
    }
    
    function procurarCategoria($codcategoria){
        inicializaAntes();
        $modelo              = new ModelCategoriaProduto();
        $query               = "select * from categoriaproduto where codmestre = '$codcategoria'";
        return $modelo->procurar($query);
    }
?>