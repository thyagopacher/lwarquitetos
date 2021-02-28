<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author ebiro_2
 */
class Conexao {
     
   private $host          = "localhost";
   private $usuario       = "lwarq_banco";
   private $senha         = "banco2013"; 
   private $banco         = "lwarq_banco";   
  
//   private $usuario       = "root";
//   private $senha         = "";    
   
   private $db; 
   public  $conexao;   
   
   public function conectar(){
       $this->conexao = mysql_connect($this->host, $this->usuario, $this->senha);
       $this->db = mysql_select_db($this->banco);
       if(!$this->db){    
           $sql = "CREATE DATABASE $this->banco";
           if (mysql_query($sql, $this->conexao)) {
               $this->db = mysql_select_db($this->banco) or die("Erro ao selecionar banco de dados:<br>". mysql_error());
           }else{
               echo("Erro ao tentar criar banco de dados causado por:". mysql_error());
           }       
       }
   }
   
   public function desconectar(){
       mysql_close($this->conexao) or die("Não pode desconectar do banco de dados por causa:<br>".  mysql_error());
   }
   
   # Aqui est� o segredo evitando grava��o de caracteres esquizidos no banco
   public function converteUTF8(){
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');	        
   }
  
}

?>
