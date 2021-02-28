<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author ebiro_2
 */
class Produto {
    private $codproduto;
    private $nome;
    private $valor;
    private $codcategoria;
    private $codfabricante;
    private $breve;
    private $descricao;
    private $imagem1;
    private $imagem2;
    private $imagem3;
    private $imagem4;
    private $imagem5;
    private $imagem6;
    private $imagem7;
    private $imagem8;
    private $vitrine;
    public function getCodproduto(){
        return $this->codproduto;
    }
    public function setCodproduto($codproduto){
	$this->codproduto = $codproduto;                
    }    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
	$this->nome = $nome;                
    }    
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
	$this->valor = $valor;                
    }   
    public function getBreve(){
        return $this->breve;
    }
    public function setBreve($breve){
	$this->breve = $breve;                
    }     
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
	$this->descricao = $descricao;                
    } 
    public function getCodcategoria(){
        return $this->codcategoria;
    }
    public function setCodcategoria($codcategoria){
	$this->codcategoria= $codcategoria;                
    }       
    public function getCodfabricante(){
        return $this->codfabricante;
    }
    public function setCodfabricante($codfabricante){
	$this->codfabricante = $codfabricante;                
    } 
    public function getImagem1(){
        return $this->imagem1;
    }
    public function setImagem1($imagem1){
	$this->imagem1= $imagem1;                
    }   
    public function getImagem2(){
        return $this->imagem2;
    }
    public function setImagem2($imagem2){
	$this->imagem2= $imagem2;                
    }    
    public function getImagem3(){
        return $this->imagem3;
    }
    public function setImagem3($imagem3){
	$this->imagem3= $imagem3;                
    } 
    public function getImagem4(){
        return $this->imagem4;
    }
    public function setImagem4($imagem4){
	$this->imagem4= $imagem4;                
    }  
    public function getImagem5(){
        return $this->imagem5;
    }
    public function setImagem5($imagem5){
	$this->imagem5= $imagem5;                
    }     
    public function getImagem6(){
        return $this->imagem6;
    }    
    public function setImagem6($imagem6){
	$this->imagem6= $imagem6;                
    } 
    public function getImagem7(){
        return $this->imagem7;
    }
    public function setImagem7($imagem7){
	$this->imagem7 = $imagem7;                
    }    
    public function getImagem8(){
        return $this->imagem8;
    }
    public function setImagem8($imagem8){
	$this->imagem8 = $imagem8;                
    }
    public function getVitrine(){return $this->vitrine;}
    public function setVitrine($vitrine){$this->vitrine = $vitrine;}      
}

?>
