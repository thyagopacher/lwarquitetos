<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelProduto
 *
 * @author ebiro_2
 */

require_once("Conexao.php");
require_once("entidade/Produto.php");

class ModelProduto {

    public $conexao;

    public function conectar(){
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }    
    
    public function comando($query){
        $this->conectar();
        return mysql_query($query);  
    }
    
    public function inserirObjeto(Produto $produto){
        $this->conectar();
        $query = "insert into produto (vitrine, descricao, nome, valor, codcategoria, codfabricante, imagem1, imagem2,"
                . " imagem3, imagem4, imagem5, imagem6, imagem7, imagem8, breve)"
                . " values('".$produto->getVitrine()."', '".$produto->getDescricao()."', '".$produto->getNome()."', '".$produto->getValor()."',"
                . " '".$produto->getCodcategoria()."', '".$produto->getCodfabricante()."', '".$produto->getImagem1()."',"
                . " '".$produto->getImagem2()."', '".$produto->getImagem3()."', '".$produto->getImagem4()."',"
                . " '".$produto->getImagem5()."', '".$produto->getImagem6()."', '".$produto->getImagem7()."',"
                . " '".$produto->getImagem8()."', '".$produto->getDescricao()."');";
        $this->conexao->converteUTF8();
        return mysql_query($query) or die(mysql_error());  
    }
    
    public function atualizarObjeto(Produto $produto){
        $this->conectar();
        $query = "update produto set vitrine = '".$produto->getVitrine()."', descricao = '".$produto->getDescricao()."',nome = '".$produto->getNome()."', "
                . " valor = '".$produto->getValor()."', codcategoria = '".$produto->getCodcategoria()."', codfabricante = '".$produto->getCodfabricante()."',"
                . " imagem1 = '".$produto->getImagem1()."', imagem2 = '".$produto->getImagem2()."', imagem3 = '".$produto->getImagem3()."', imagem4 = '".$produto->getImagem4()."',"
                . " imagem5 = '".$produto->getImagem5()."', imagem6 = '".$produto->getImagem6()."', imagem7 = '".$produto->getImagem7()."',"
                . " imagem8 = '".$produto->getImagem8()."', breve = '".$produto->getBreve()."'"
                . " where codproduto = '".$produto->getCodproduto()."'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }  
    
    public function excluirObjeto($codproduto){
        $this->conectar();
        $query = "delete from produto where codproduto = '$codproduto'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }     
    
    public function procurarObjeto($codproduto){
        $this->conectar();
        $query = "select * from produto where codproduto = '$codproduto'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarNome($nome){
        $this->conectar();
        $query = "select p.*, "
                . "(select nome from categoriaproduto where codcategoria = p.codcategoria) as categoria"
                . " from produto p where nome like '%$nome%' order by codproduto desc";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarTodos(){
        $this->conectar();
        $query     = "select p.*,"
                . "(select nome from categoriaproduto where codcategoria = p.codcategoria) as categoria "
                . "  from produto p order by codproduto desc";
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
