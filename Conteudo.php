<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
            <?php include("visao/includes/head.php");?>
            <?php
                $conteudo = "";
                $titulo   = "";
                if(isset($_REQUEST["codproduto"]) && $_REQUEST["codproduto"] !== NULL && $_REQUEST["codproduto"] !== ""){
                    $_REQUEST["submit"] = "Procurar";
                    include("controlador/ControleProduto.php");
                    $produto   = mysql_fetch_array($retorno);
                    $titulo    = $produto["nome"];
                } 
            ?>            
            <title><?=$empresa["fantasia"]?> | <?=$titulo?></title>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
            <style>
                .magnifier{
                    display: initial;
                }
            </style>
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
            <div id="fundo">
            <div class="bg-content">       
                <?php
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
                    $marca     = "<div id='marca' style='width: 100px'><img src='visao/recursos/imagens/logo.jpg' alt='imagem logo'/></div>";
                    $conteudo .= "<h4>$produto[nome]</h4>";
                    $conteudo .= "<div id='imagens'>";
                    $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/".  verificaImagem($produto)."' class='magnifier' >";
                    $conteudo .= "<img style='margin: 0 auto;margin-left: 15px;' src='thumbs.php?w=500&h=400&imagem=visao/recursos/imagens/".  verificaImagem($produto)."'/>";
                    $conteudo .= "<div style='margin-left: 15px;'>$marca</div>";
                    $conteudo .= "</a>";
                    $conteudo .= ("</div>");
                    $conteudo .= "<div id='texto'>";
                    $conteudo .= "<p>$produto[descricao]</p>";   
                    $conteudo .= "<div id='imgPequena'>";
                    if(isset($produto["imagem2"]) && $produto["imagem2"] !== NULL && $produto["imagem2"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem2]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem2]'/>";
                        $conteudo .= "</a>";
                    }
                    if(isset($produto["imagem3"]) && $produto["imagem3"] !== NULL && $produto["imagem3"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem3]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem3]'/>";
                        $conteudo .= "</a>";
                    }   
                    if(isset($produto["imagem4"]) && $produto["imagem4"] !== NULL && $produto["imagem4"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem4]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem4]'/>";
                        $conteudo .= "</a>";
                    }
                    if(isset($produto["imagem5"]) && $produto["imagem5"] !== NULL && $produto["imagem5"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem5]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem5]'/>";
                        $conteudo .= "</a>";
                    }
                    if(isset($produto["imagem6"]) && $produto["imagem6"] !== NULL && $produto["imagem6"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem6]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem6]'/>";
                        $conteudo .= "</a>";
                    }
                    if(isset($produto["imagem7"]) && $produto["imagem7"] !== NULL && $produto["imagem7"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem7]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem7]'/>";
                        $conteudo .= "</a>";
                    } 
                    if(isset($produto["imagem8"]) && $produto["imagem8"] !== NULL && $produto["imagem8"] !== ""){
                        $conteudo .= "<a href='thumbs.php?w=600&h=480&imagem=visao/recursos/imagens/$produto[imagem8]' class='magnifier' >";
                        $conteudo .= "<img width='120' height='60' src='thumbs.php?w=120&h=60&imagem=visao/recursos/imagens/$produto[imagem8]'/>";
                        $conteudo .= "</a>";
                    }
                    $conteudo .= ("</div>");                    
                    $conteudo .= "</div>";
                    echo($conteudo);
                ?>
            </div>
            </div><!--fim do fundo-->
            <?php
                include("visao/includes/rodape.php");
            ?> 
        </body>
</html>