<!DOCTYPE html>
<html lang="en">
	<head>
            <?php include("visao/includes/head.php");?>        
            <title><?=$empresa["fantasia"]?> | <?=$titulo?></title>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style_alternativo.css" type="text/css" media="screen">
            <style>
                #mapa { 
                    width: 640px;
                    height: 200px;
                    border: 10px solid #ccc;
                    margin-bottom: 20px;
                }
            </style>
            <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <!--scripts necessários para abrir google maps api-->
           <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
           <script type="text/javascript" src="visao/recursos/javascript/jquery.min.js"></script> 
           <script type="text/javascript" src="visao/recursos/javascript/mapa.js"></script>   
           <script type="text/javascript" src="visao/recursos/javascript/jquery-ui.custom.min.js"></script>
            
            <script type="text/javascript" src="visao/recursos/javascript/menu.js"></script>
	</head>
	<body>
            <?php
                include("visao/includes/topo.php");
            ?> 
            <div class="bg-content">       
                <?php 
                echo($empresa["tipologradouro"].",".
                        $empresa["logradouro"].",".
                        $empresa["numero"].",".
                        $empresa["cidade"]."-".
                        $empresa["estado"]
                        );
                ?>
                <input type="hidden" name="endereco" id="endereco" value="<?php echo($empresa["tipologradouro"].",".$empresa["logradouro"].",".$empresa["cidade"])?>"/>
                <input type="hidden" name="txtLatitude" id="txtLatitude" value=""/>
                <input type="hidden" name="txtLongitude" id="txtLongitude" value=""/>
                <h4>Mapa abaixo:</h4>
                <div id="mapa"></div>                
            </div>
            <?php
                include("visao/includes/rodape.php");
            ?> 
        </body>
</html>