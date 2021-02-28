<!DOCTYPE html>
<html lang="en">
	<head>
            <?php include("visao/includes/head.php");?>
            <title><?=$empresa["fantasia"]?> | Contato</title>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style_alternativo.css" type="text/css" media="screen">
            <style>
                #mapa { 
                    width: 310px;
                    height: 200px;
                    border: 5px solid #ccc;
                    margin-bottom: 20px;
                }
            </style>            
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/superfish.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
            <script src="js/forms.js"></script>
            <script>		
       jQuery(window).load(function() {	
        jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
       }); 

            </script>

            <!--[if lt IE 8]>
                    <div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
            <![endif]-->
            <!--[if (gt IE 9)|!(IE)]><!-->
            <!--<![endif]-->
            <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>    
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
      <![endif]-->
                <script type="text/javascript" src="visao/recursos/javascript/menu.js"></script>
                <!--scripts necessários para abrir google maps api-->
               <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
               <script type="text/javascript" src="visao/recursos/javascript/jquery.min.js"></script> 
               <script type="text/javascript" src="visao/recursos/javascript/mapa.js"></script>   
               <script type="text/javascript" src="visao/recursos/javascript/jquery-ui.custom.min.js"></script>            
            </head>

	<body>
        <?php
            include("visao/includes/topo.php");
        ?> 
<div class="bg-content"> 
      <!--============================== content =================================-->
      <div id="content">
      
    <div class="container">
          <div class="row">
        <article class="span8">
              <h3>Contato</h3>
              <div class="inner-1">
                  <form id="contact-form" action="controlador/EnviaContato.php" method="post" name="contato">
                  <div class="success"> Formulário de contato foi enviado!</div>
                  <fieldset>
                <div>
                    <label class="name">
                    <input required type="text" name="nome" placeholder="Seu nome">
                  <br>
                    <span class="error">*Isto não é um nome válido.</span> <span class="empty">*Este campo é obrigatório.</span> </label>
                    </div>
                  <div>
                    <label class="phone">
                    <input required name="telefone" placeholder="Digite aqui seu telefone" type="tel"/>
                    <br>
                    <span class="error">*Isto não é um telefone válido.</span> <span class="empty">*Este campo é obrigatório.</span> </label>
                    </div>
                <div>
                    <label class="email">
                    <input required name="email" type="email" placeholder="Digite aqui seu e-mail" value="Email">
                    <br>
                    <span class="error">*Isto não é um e-mail válido.</span> <span class="empty">*Este campo é obrigatório.</span> </label>
                    </div>
                <div>
                    <label class="message">
                    <textarea name="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
                    <br>
                    <span class="error">*A mensagem está muito pequena.</span> <span class="empty">*Este campo é obrigatório.</span> </label>
                    </div>
                <div class="buttons-wrapper"> 
                    <a class="btn btn-1" data-type="submit" onclick="contato.submit();">Enviar</a></div>
              </fieldset>
                </form>
          </div>
            </article>
        <article class="span4">
              <h3>Informações de contato</h3>
            <?php 
            echo($empresa["tipologradouro"].",".
                    $empresa["logradouro"].",".
                    $empresa["numero"].", sala 33, ".
                    $empresa["bairro"].",<br>". 
                    "CEP: $empresa[cep],".$empresa["cidade"]."-".
                    $empresa["estado"]
                    );
            ?>
            <input type="hidden" name="endereco" id="endereco" value="<?php echo($empresa["tipologradouro"].",".$empresa["logradouro"].",".$empresa["cidade"])?>"/>
            <input type="hidden" name="txtLatitude" id="txtLatitude" value=""/>
            <input type="hidden" name="txtLongitude" id="txtLongitude" value=""/>
            <h4>Mapa abaixo:</h4>
            <div id="mapa"></div>
            
                <address class="address-1">

              <div class="overflow">
              	    <?php
              	    if(isset($empresa) && $empresa["celular"] !== NULL && $empresa["celular"] !== "" && $empresa["celular"] !== "(00) 0000-0000"){
              	    ?>	
                    <span>Celular:</span><?=$empresa["celular"]?><br>
                    <?php
                    }
                    ?>
                    <span>Telefone:</span><?=$empresa["telefone"]?><br>
                    <span>FAX:</span><?=$empresa["fax"]?><br>
                    <span>E-mail:</span> 
                    <a href="#" class="mail-1">
                        <?=$empresa["email"]?>
                    </a>
                    <br>
                </address>
            </article>
      </div>
        </div>
  </div>
    </div>

        <?php
            include("visao/includes/rodape.php");
        ?> 
</body>
</html>