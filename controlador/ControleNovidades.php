<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleNovidades
 *
 * @author ebiro_2
 */
    session_start();
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";    
    }else{
        $antes = "../";
    }
    include("../modelo/ModelNovidades.php");
    $modelo    = new ModelNovidades();
    $novidades = new Novidades();
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codnovidades"])){
            $novidades->setCodnovidades($_REQUEST["codnovidades"]);
        }        
        if(isset($_REQUEST["nome"])){
            $novidades->setNome($_REQUEST["nome"]);
        }
        if(isset($_REQUEST["email"])){
            $novidades->setEmail($_REQUEST["email"]);
        }    
        if(isset($_REQUEST["status"])){
            $novidades->setStatus($_REQUEST["status"]);
        }              
   
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($novidades);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($novidades);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($novidades->getCodnovidades());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codnovidades"])){
                            $retorno = $modelo->procurarObjeto($novidades->getCodnovidades());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($novidades->getNome());
                            }                            
                        }
                    }
                }
            }
        }
        if($submit !== "Procurar Nome" && $submit !== "Procurar"){
            $mensagem = "";
            if(!isset($retorno) || $retorno === NULL || $retorno !== FALSE){
                $mensagem = "$submit - realizado com sucesso";
            }else{
                $mensagem = "Erro ao realizar comando de $submit novidades";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../visao/Novidades.php?codnovidades=".$novidades->getCodnovidades()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../index.php');</script>");  
            }
        }
    }

?>
