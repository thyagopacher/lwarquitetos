<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }   
    include($antes."modelo/ModelProduto.php");
    $modelo         = new ModelProduto();
    $retornoproduto = $modelo->procurar($query);   
    $query          = "SELECT p.*,"
            . "(select nome from categoriaproduto where codcategoria = p.codcategoria) as categoria "
            . "FROM produto p "
            . "WHERE p.vitrine = 'SIM' and "
            . "(p.codcategoria = 11 or p.codcategoria = 12) limit 4";
    $resultado = $modelo->procurar($query);
?>
