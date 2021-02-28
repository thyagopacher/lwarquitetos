<?php
/*
 * Envia novidades para todos cadastrados e ativos para receber novidades
 */
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }  
    if(isset($_REQUEST["nome"])){
        $nome = $_REQUEST["nome"];
        $mensagem .= "Nome: $nome<br>";
    }
    if(isset($_REQUEST["telefone"])){
        $telefone =  $_REQUEST["telefone"];
        $mensagem .= "Telefone: $telefone<br>";
    }
    if(isset($_REQUEST["email"])){
        $email     =  $_REQUEST["email"];
        $mensagem .= "E-mail: $email<br>";
    }    
    if(isset($_REQUEST["mensagem"])){
        $mensagemp .= $_REQUEST["mensagem"];
        $mensagem .= "Mensagem: $mensagemp";
    }  
    include($antes."modelo/ModelEmpresa.php");
    $modelo_empresa    = new ModelEmpresa();    
    $resultado_empresa = $modelo_empresa->procurar("select * from empresa");
    $empresa           = mysql_fetch_array($resultado_empresa);
   
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";    
    mail($empresa["email"], "Contato pelo site", $mensagem,$headers); 

    echo("<script>alert('Enviado com sucesso!');</script>");
    echo("<script>location.href='../contato.php';</script>");       
?>