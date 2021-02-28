<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleEmpresa
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
    include("../modelo/ModelEmpresa.php");
    function upload($img){
        $caminho = "../visao/recursos/imagens/";
        $imagem  = "logo.jpg";
        if(isset($img) && $img !== NULL){
            $foto_cami = $img['tmp_name'];
            move_uploaded_file($foto_cami,$caminho.$imagem);
        }
        return $imagem;
    }
    $modelo = new ModelEmpresa();
    $empresa = new Empresa();
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codempresa"])){
            $empresa->setCodempresa($_REQUEST["codempresa"]);
        }        
        if(isset($_REQUEST["fantasia"])){
            $empresa->setFantasia($_REQUEST["fantasia"]);
        }
        if(isset($_REQUEST["razaosocial"])){
            $empresa->setRazaosocial($_REQUEST["razaosocial"]);
        }    
        if(isset($_REQUEST["cnpj"])){
            $empresa->setCnpj($_REQUEST["cnpj"]);
        }              
        if(isset($_REQUEST["cep"])){
            $empresa->setCep($_REQUEST["cep"]);
        }        
        if(isset($_REQUEST["tipologradouro"])){
            $empresa->setTipologradouro($_REQUEST["tipologradouro"]);
        }
        if(isset($_REQUEST["logradouro"])){
            $empresa->setLogradouro($_REQUEST["logradouro"]);
        }          
        if(isset($_REQUEST["numero"])){
            $empresa->setNumero($_REQUEST["numero"]);
        }    
        if(isset($_REQUEST["bairro"])){
            $empresa->setBairro($_REQUEST["bairro"]);
        }            
        if(isset($_REQUEST["cidade"])){
            $empresa->setCidade($_REQUEST["cidade"]);
        }
        if(isset($_REQUEST["estado"])){
            $empresa->setEstado($_REQUEST["estado"]);
        }     
        if(isset($_REQUEST["telefone"])){
            $empresa->setTelefone($_REQUEST["telefone"]);
        }   
        if(isset($_REQUEST["celular"])){
            $empresa->setCelular($_REQUEST["celular"]);
        }          
        if(isset($_REQUEST["fax"])){
            $empresa->setFax($_REQUEST["fax"]);
        }          
        if(isset($_REQUEST["email"])){
            $empresa->setEmail($_REQUEST["email"]);
        }          
        if(isset($_FILES["logo"])){
            $nome = upload($_FILES["logo"]);
            $empresa->setLogo($nome);
        }      
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($empresa);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($empresa);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($empresa->getCodempresa());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codempresa"])){
                            $retorno = $modelo->procurarObjeto($empresa->getCodempresa());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($empresa->getNome());
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
                $mensagem = "Erro ao realizar comando de $submit empresa";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            echo ("<script>location.href=('../painel/Empresa.php');</script>");  
        }
    }

?>
