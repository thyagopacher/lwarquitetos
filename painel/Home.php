<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php");?>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            Bem vindo ao sistema:
            
            <?php include("includes/quadros.php");?>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
