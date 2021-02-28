<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleMenu
 *
 * @author ebiro_2
 */
    session_start();
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";    
    }else{
        $antes = "../";
    }
    include("../modelo/ModelMenu.php");
    $modelo = new ModelMenu();
    $menu  = new Menu();
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codmenu"])){
            $menu->setCodmenu($_REQUEST["codmenu"]);
        }        
        if(isset($_REQUEST["nome"])){
            $menu->setNome($_REQUEST["nome"]);
        }
        if(isset($_REQUEST["linksite"])){
            $menu->setLinksite($_REQUEST["linksite"]);
        }                    
     
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($menu);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($menu);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($menu->getCodmenu());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codmenu"])){
                            $retorno = $modelo->procurarObjeto($menu->getCodmenu());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($menu->getNome());
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
                $mensagem = "Erro ao realizar comando de $submit menu";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../painel/Menu.php?codmenu=".$menu->getCodmenu()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../painel/Menu.php');</script>");  
            }
        }
    }

?>
