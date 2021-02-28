<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelApresentacao
 *
 * @author ebiro_2
 */

require_once("Conexao.php");
require_once("entidade/Apresentacao.php");

class ModelApresentacao {

    public $conexao;

    public function conectar(){
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }    
    
    public function inserirObjeto(Apresentacao $apresentacao){
        $this->conectar();
        $query = "insert into apresentacao (sobrenos, extensoes, imagem)"
                . " values('".$apresentacao->getSobrenos()."', '".$apresentacao->getExtensoes()."','".$apresentacao->getImagem()."');";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }
    
    public function atualizarObjeto(Apresentacao $apresentacao){
        $this->conectar();
        $query = "update apresentacao set sobrenos = '".$apresentacao->getSobrenos()."',"
                . " extensoes = '".$apresentacao->getExtensoes()."',"
                . " imagem = '".$apresentacao->getImagem()."' where codapresentacao = '".$apresentacao->getCodapresentacao()."'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }  
    
    public function excluirObjeto($codapresentacao){
        $this->conectar();
        $query = "delete from apresentacao where codapresentacao = '$codapresentacao'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }     
    
    public function procurarObjeto($codapresentacao){
        $this->conectar();
        $query = "select * from apresentacao where codapresentacao = '$codapresentacao'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarNome($nome){
        $query = "select * from apresentacao where sobrenos like '%$nome%' order by sobrenos asc";
        $this->conectar();
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarTodos(){
        $this->conectar();
        $query     = "select * from apresentacao";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }   
    
    public function procurar($query){
        $this->conectar();
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }     
    
}

?>
