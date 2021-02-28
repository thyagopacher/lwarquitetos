<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelPermissaoCargo
 *
 * @author ebiro_2
 */

require_once("Conexao.php");
require_once("entidade/PermissaoCargo.php");

class ModelPermissaoCargo {

    public $conexao;

    public function conectar(){
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }    
    
    public function inserirObjeto(PermissaoCargo $permissaocargo){
        $this->conectar();
        $query = "insert into permissaocargo (codmenu, codpermissao)"
                . " values('".$permissaocargo->getCodmenu()."', '".$permissaocargo->getCodpermissaocargo()."');";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }
    
    public function atualizarObjeto(PermissaoCargo $permissaocargo){
        $this->conectar();
        $query = "update permissaocargo set codmenu = '".$permissaocargo->getCodmenu()."', "
                . " codpermissao = '".$permissaocargo->getCodpermissaocargo()."'"
                . " where codpermissao = '".$permissaocargo->getCodpermissao()."'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }  
    
    public function excluirObjeto($codpermissao){
        $this->conectar();
        $query = "delete from permissaocargo where codpermissao = '$codpermissao'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }     
    
    public function procurarObjeto($codpermissao){
        $this->conectar();
        $query = "select * from permissaocargo where codpermissao = '$codpermissao'";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarCodmenu($codmenu){
        $this->conectar();
        $query = "select c.* "
                . " from permissaocargo c where codmenu like '%$codmenu%' order by codmenu asc";
        $this->conexao->converteUTF8();
        return mysql_query($query);  
    }       
    
    public function procurarTodos(){
        $this->conectar();
        $query     = "select c.* "
                . "  from permissaocargo p";
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
