<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleFormaPagamento
 *
 * @author ebiro_2
 */
    session_start();
    if(isset($painel) && $painel === TRUE){
        $antes = "../../";    
    }else{
        $antes = "../";
    }
    include("../modelo/ModelFormaPagamento.php");
    function upload($img){
        $caminho = "../visao/recursos/imagens/";
        $imagem  = "forma_".md5(uniqid(rand(), true)).".jpg";
        if(isset($img) && $img !== NULL){
            $foto_cami = $img['tmp_name'];
            move_uploaded_file($foto_cami,$caminho.$imagem);
        }
        return $imagem;
    }
    $modelo = new ModelFormaPagamento();
    $forma  = new FormaPagamento();
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codforma"])){
            $forma->setCodforma($_REQUEST["codforma"]);
        }        
        if(isset($_REQUEST["nome"])){
            $forma->setNome($_REQUEST["nome"]);
        }
        if(isset($_FILES["logo"])){
            $nome = upload($_FILES["logo"]);
            $forma->setLogo($nome);
        }      
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($forma);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($forma);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($forma->getCodforma());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codforma"])){
                            $retorno = $modelo->procurarObjeto($forma->getCodforma());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($forma->getNome());
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
                $mensagem = "Erro ao realizar comando de $submit forma pagamento";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../painel/FormaPagamento.php?codforma=".$forma->getCodforma()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../painel/FormaPagamento.php');</script>");  
            }
        }
    }

?>
