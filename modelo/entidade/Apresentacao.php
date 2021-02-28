<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Apresentacao
 *
 * @author ebiro_2
 */
class Apresentacao {
    
    private $codapresentacao;
    private $sobrenos;
    private $extensoes;
    private $imagem;
    public function getCodapresentacao(){return $this->codapresentacao;}
    public function setCodapresentacao($codapresentacao){$this->codapresentacao = $codapresentacao;}  
    public function getSobrenos(){return $this->sobrenos;}
    public function setSobrenos($sobrenos){$this->sobrenos = $sobrenos;}  
    public function getExtensoes(){return $this->extensoes;}
    public function setExtensoes($extensoes){$this->extensoes = $extensoes;}     
    public function getImagem(){return $this->imagem;}
    public function setImagem($imagem){$this->imagem = $imagem;}       
    
}

?>
