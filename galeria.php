<!DOCTYPE html>
<html lang="en">
	<head>
            <?php include("visao/includes/head.php");?>
            <title><?=$empresa["fantasia"];?> | Galeria</title>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/superfish.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>    
            <script type="text/javascript" src="js/touchTouch.jquery.js"></script> 
            <script type="text/javascript">
                if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	
            </script>
            <script>		
             jQuery(window).load(function() {	
                    $x = $(window).width();		
                    if($x > 1024){			
                        jQuery("#content .row").preloader();    
                    }			 
                    jQuery('.magnifier').touchTouch();
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
<?php
        if(!isset($_REQUEST["codcategoria"])){
            $_REQUEST["submit"] = "Procurar Nome";
            $_REQUEST["nome"]   = "";
            include("controlador/ControleProduto.php");
            $produtos = $retorno;
            $titulo = "Galeria - Geral";
        } elseif (isset ($_REQUEST["codcategoria"]) && $_REQUEST["codcategoria"] !== NULL && $_REQUEST["codcategoria"] !== "") {
            include("controlador/ProcurarProdutoCategoria.php");
            if($produtocategoria === FALSE){
                echo("Problema ao realizar pesquisa por categoria");
            }
            $produtos  = $produtocategoria;
            $_REQUEST["submit"]     = "Procurar";
            include("controlador/ControleCategoriaProduto.php");
            if($retorno !== FALSE){
	            $categoria = mysql_fetch_array($retorno) or die("Erro na seleção de categoria:".mysql_error());
	            $titulo    = "Projetos - ".$categoria["nome"];
            }else{
            	$titulo = "Erro na busca do titulo";
            }
       }
       
        function verificaImagem($produto){
            $imagem = "";
            for($i = 1; $i < 9; $i++){
                if(isset($produto["imagem".$i]) && $produto["imagem".$i] !== NULL && $produto["imagem".$i] !== ""){
                    $imagem = $produto["imagem".$i];
                    break;
                }
            }
            return $imagem;
        }         
        ?>              
        <article class="span12">
            <h3><?php echo("$titulo");?></h3>
         </article>
        <div class="clear"></div>
        
         <ul class="portfolio clearfix">  
            <?php 
            if(mysql_num_rows($produtos) > 0){
                while($produto = mysql_fetch_array($produtos)){
                    
            ?>
                    <li class="box">
                        <a href="Conteudo.php?codproduto=<?=$produto["codproduto"]?>" title="<?=$produto["nome"]?>">
                            <img width="200" height="150" alt="Imagem <?=$produto["nome"]?>" src="thumbs.php?w=200&h=150&imagem=visao/recursos/imagens/<?=  verificaImagem($produto)?>"  title="<?=$produto["nome"]?>"/>
                            <div id="marca"><img src="visao/recursos/imagens/logo.jpg" alt="logo"/></div>
                        </a>
                    </li>
            <?php 
                }
            }else{
                echo("Nada encontrado");
            }
            ?>
         </ul> 
      </div>
        </div>
  </div>
    </div>

        <?php
            include("visao/includes/rodape.php");
        ?> 
</body>
</html>