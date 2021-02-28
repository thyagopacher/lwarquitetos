<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleConfiguracao
 *
 * @author ebiro_2
 */
    session_start();
    $antes = "../";
    include("../modelo/ModelConfiguracao.php");
    $modelo        = new ModelConfiguracao();
    $configuracao  = new Configuracao();
    if(isset($_REQUEST["submit"])){
        $retorno = "";
        $submit  = $_REQUEST["submit"];
        if(isset($_REQUEST["codconfiguracao"])){
            $configuracao->setCodconfiguracao($_REQUEST["codconfiguracao"]);
        }        
        if(isset($_REQUEST["quemsomos"])){
            $configuracao->setQuemsomos($_REQUEST["quemsomos"]);
        }
        if(isset($_REQUEST["palavrachave"])){
            $configuracao->setPalavrachave($_REQUEST["palavrachave"]);
        }   
        if(isset($_REQUEST["descricao"])){
            $configuracao->setDescricao($_REQUEST["descricao"]);
        }     
        if(isset($_REQUEST["codempresa"])){
            $configuracao->setCodempresa($_REQUEST["codempresa"]);
        }      
        if(isset($_REQUEST["emailpagseguro"])){
            $configuracao->setEmailpagseguro($_REQUEST["emailpagseguro"]);
        }
        if(isset($_REQUEST["cor"])){
            $original = utf8_decode($_REQUEST["cor"]);
        }
        if(isset($_REQUEST["corbody"]) && $original === "NÃO"){
            $configuracao->setCorbody($_REQUEST["corbody"]);
        }
        if($original === "SIM"){
            $configuracao->setCorbody("");
        }            
        if(isset($_REQUEST["cortopo"]) && $original === "NÃO"){
            $configuracao->setCortopo($_REQUEST["cortopo"]);
        }
        if($original === "SIM"){
            $configuracao->setCortopo("");
        }       
        if(isset($_REQUEST["corrodape"]) && $original === "NÃO"){
            $configuracao->setCorrodape($_REQUEST["corrodape"]);
        }
        if($original === "SIM"){
            $configuracao->setCorrodape("");
        }           
        if($submit === "Cadastrar"){
            $retorno = $modelo->inserirObjeto($configuracao);
        }else{
            if($submit === "Editar"){
                $retorno = $modelo->atualizarObjeto($configuracao);
            }else{
                if($submit === "Excluir"){
                    $retorno = $modelo->excluirObjeto($configuracao->getCodconfiguracao());
                }else{
                    if($submit === "Procurar"){
                        if(isset($_REQUEST["codconfiguracao"])){
                            $retorno = $modelo->procurarObjeto($configuracao->getCodconfiguracao());
                        }
                    }else{
                        if($submit === "Procurar Nome"){
                            if(isset($_REQUEST["nome"])){
                                $retorno = $modelo->procurarNome($configuracao->getNome());
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
                $mensagem = "Erro ao realizar comando de $submit configuração";
                include($antes."controlador/EnviaErro.php");
            }
            echo ("<script>alert('$mensagem');</script>");
            if($submit === "Editar"){
                echo ("<script>location.href=('../painel/Configuracao.php?codconfiguracao=".$configuracao->getCodconfiguracao()."&submit=Procurar');</script>");  
            }else{
                echo ("<script>location.href=('../painel/Configuracao.php?codconfiguracao=".$configuracao->getCodconfiguracao()."&submit=Procurar');</script>");  
            }
        }
    }

?>
