<!DOCTYPE html>
<html>
    <head>
        <?php 
        include("includes/head.php");
        if(isset($_REQUEST["codpessoa"])){
            $_REQUEST["submit"] = "Procurar";
            include($antes."controlador/ControlePessoa.php");
            if(isset($retorno)){
                $pessoa = mysql_fetch_array($retorno);
            }else{
                $pessoa = NULL;
            }
        }  
        if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Localizacao") === FALSE){
            $_SESSION["erro"] = "";
        }         
        ?>
        <style>
            #mapa { 
                width: 640px;
                height: 200px;
                border: 10px solid #ccc;
                margin-bottom: 20px;
            }
        </style>
        <!--scripts necessários para abrir google maps api-->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/jquery.min.js"></script> 
        <script type="text/javascript" src="../visao/recursos/javascript/mapa.js"></script>   
        <script type="text/javascript" src="../visao/recursos/javascript/jquery-ui.custom.min.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <?php 
               echo("Endereço de $pessoa[nome]<br>");
               echo($pessoa["tipologradouro"].",".
                    $pessoa["logradouro"].",".
                    $pessoa["numero"].",".
                    $pessoa["cidade"]."-".
                    $pessoa["estado"]
                    );
            ?>
            <input type="hidden" name="endereco" id="endereco" value="<?php echo($pessoa["tipologradouro"].",".$pessoa["logradouro"].",".$pessoa["cidade"])?>"/>
            <input type="hidden" name="txtLatitude" id="txtLatitude" value=""/>
            <input type="hidden" name="txtLongitude" id="txtLongitude" value=""/>
            <h4>Mapa abaixo:</h4>
            <div id="mapa"></div>
            
        </div>    
        <?php
        include("includes/bannerLateral.php");
        include("includes/rodape.php");
        ?>
    </body>
</html>
