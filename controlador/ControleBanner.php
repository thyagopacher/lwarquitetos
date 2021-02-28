<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleBanner
 *
 * @author ebiro_2
 */
    session_start();
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }   
    require_once("../modelo/ModelBanner.php");
    function upload($img){
        $caminho = "../visao/recursos/imagens/";
        $imagem  = "banner_".md5(uniqid(rand(), true)).".jpg";
        if(isset($img) && $img !== NULL){
            $foto_cami = $img['tmp_name'];
            move_uploaded_file($foto_cami,$caminho.$imagem);
        }
        return $imagem;
    }
    $modelo = new ModelBanner();
    $banner = new Banner();
    
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codbanner"])){
            $banner->setCodbanner($_REQUEST["codbanner"]);
        }        
        if(isset($_REQUEST["link"])){
            $banner->setLink($_REQUEST["link"]);
        }          
        if(isset($_FILES["imagem"])){
            $nome = upload($_FILES["imagem"]);
            $banner->setImagem($nome);
        }      
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($banner);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($banner);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($banner->getCodbanner());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codbanner"])){
                            $retorno = $modelo->procurarObjeto($banner->getCodbanner());
                        }
                    }else{
                        if($submit === "Procurar Link"){
                            if(isset($_REQUEST["link"])){
                                $retorno = $modelo->procurarLink($banner->getLink());
                            }                            
                        }
                    }
                }
            }
        }
        if($submit !== "Procurar Link" && $submit !== "Procurar"){
            $mensagem = "";
            if(!isset($retorno) || $retorno === NULL || $retorno !== FALSE){
                $mensagem = "$submit - realizado com sucesso";
            }else{
                $mensagem = "Erro ao realizar comando de $submit banner";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../painel/Banner.php?codbanner=".$banner->getCodbanner()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../painel/Banner.php');</script>");  
            }
        }
    }

?>
