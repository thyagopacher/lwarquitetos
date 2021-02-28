<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author ebiro_2
 */
class Menu {
    
    private $codmenu;
    private $linksite;
    private $nome;

    public function getCodmenu(){return $this->codmenu;}
    public function setCodmenu($codmenu){$this->codmenu = $codmenu;}        
    public function getLinksite(){return $this->linksite;}
    public function setLinksite($linksite){$this->linksite = $linksite;}     
    public function getNome(){return $this->nome;}
    public function setNome($nome){$this->nome = $nome;}

}

?>
