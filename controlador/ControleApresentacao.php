<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleApresentacao
 *
 * @author ebiro_2
 */
//    session_start();
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }
    if($painel !== "index"){
        $antes = "../";
    }   
    include($antes."modelo/ModelApresentacao.php");
    function uploadApresentacao($img){
        $caminho = "../visao/recursos/imagens/";
        $imagem  = "apresentacao.jpg";
        if(isset($img) && $img !== NULL){
            $foto_cami = $img['tmp_name'];
            move_uploaded_file($foto_cami,$caminho.$imagem);
        }
        return $imagem;
    }
    $modelo       = new ModelApresentacao();
    $apresentacao = new Apresentacao();
    
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codapresentacao"])){
            $apresentacao->setCodapresentacao($_REQUEST["codapresentacao"]);
        }        
        if(isset($_REQUEST["sobrenos"])){
            $apresentacao->setSobrenos($_REQUEST["sobrenos"]);
        }
        if(isset($_REQUEST["extensoes"])){
            $apresentacao->setExtensoes($_REQUEST["extensoes"]);
        }    
         
        if(isset($_FILES["imagem"])){
            $nome = uploadApresentacao($_FILES["imagem"]);
            $apresentacao->setImagem($nome);
        }      
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($apresentacao);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($apresentacao);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($apresentacao->getCodapresentacao());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codapresentacao"])){
                            $retorno = $modelo->procurarObjeto($apresentacao->getCodapresentacao());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($_REQUEST["nome"]);
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
                $mensagem = "Erro ao realizar comando de $submit apresentação";
                echo("<a href='".$antes."controlador/EnviaErro.php'>controle</a>");
                include($antes."controlador/EnviaErro.php");
                
            }
//            echo ("<script>alert('$mensagem');</script>");
//            echo ("<script>location.href=('../painel/Apresentacao.php');</script>");  
        }
    }

?>
