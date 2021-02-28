<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlePermissaoCargo
 *
 * @author ebiro_2
 */
    session_start();
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";    
    }else{
        $antes = "../";
    }
    include("../modelo/ModelPermissaoCargo.php");
    $modelo  = new ModelPermissaoCargo();
    $permissao   = new PermissaoCargo();    
    if(isset($_REQUEST["codpermissao"])){
        $permissao->setCodpermissao($_REQUEST["codpermissao"]);
        $dados = mysql_fetch_array($modelo->procurarObjeto($permissao->getCodpermissao()));
    }      

    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];   
          
        if(isset($_REQUEST["codmenu"])){
            $permissao->setCodmenu($_REQUEST["codmenu"]);
        }            
        if(isset($_REQUEST["codcargo"])){
            $permissao->setCodcargo($codcargo);
        }      
        if(isset($_REQUEST["status"])){
            $permissao->setStatus($status);
        }     
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($permissao);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($permissao);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($permissao->getCodpermissao());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codpermissao"])){
                            $retorno = $modelo->procurarObjeto($permissao->getCodpermissao());
                        }
                    }else{
                        if($submit === "Procurar Codmenu"){
                            if(isset($_REQUEST["codmenu"])){
                                $retorno = $modelo->procurarCodmenu($permissao->getCodmenu());
                            }                            
                        }
                    }
                }
            }
        }
        if($submit !== "Procurar Codmenu" && $submit !== "Procurar"){
            $mensagem = "";
            if(!isset($retorno) || $retorno === NULL || $retorno !== FALSE){
                $mensagem = "$submit - realizado com sucesso";
            }else{
                $mensagem = "Erro ao realizar comando de $submit permissão cargo";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../painel/PermissaoCargo.php?codpermissao=".$permissao->getCodpermissao()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../painel/PermissaoCargo.php');</script>");  
            }
        }
    }

?>
