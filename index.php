<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>            
            <?php include("visao/includes/head.php");?>
            <title><?=$empresa["fantasia"]?> | Inicio</title>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/superfish.js"></script>
            <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
            <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	  
            <script type="text/javascript" src="js/touchTouch.jquery.js"></script>
            <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>

            <script>		
                     jQuery(window).load(function() {	
                     $x = $(window).width();		
            if($x > 1024)
            {			
            jQuery("#content .row").preloader();    }	

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
        <?php include("visao/includes/topo.php");?>    
<div class="bg-content">
      <div class="container">
    <div class="row">
          <div class="span12"> 
        <!--============================== slider =================================-->
        <?php 
        $_REQUEST["submit"] = "Procurar Nome";
        $_REQUEST["nome"]   = "";
        include("controlador/ControleSlideShow.php");
        $slides = $retorno;        
        include("visao/includes/slideshow.php");
        ?>
        <span id="responsiveFlag"></span>
        
        <div class="block-slogan">
                <h2>Quem somos?</h2>
                <div>
                    <p>
                        <?=$configuracao["quemsomos"];?>
                    </p>
                </div>
            </div>
        </div>
        </div>
  </div>
      
      <!--============================== content =================================-->
      
      <div id="content" class="content-extra">
      
    <div class="row-1">
          <div class="container">
            <div class="row">
            <?php
                include("controlador/ProcurarProdutoVitrine.php");
                $produtos = $resultado;
            ?>
              <ul class="thumbnails thumbnails-1">
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
                  
                  if(mysql_num_rows($produtos) > 0){
                      while($produto = mysql_fetch_array($produtos)){
                ?>
                    <li class="span3">
                      <div class="thumbnail thumbnail-1">
                      <h3><?=$produto["categoria"]?></h3>
                      <img src="thumbs.php?w=270&h=146&imagem=visao/recursos/imagens/<?=verificaImagem($produto)?>" alt="<?=$produto["nome"]?>">
                      <!--<img src="visao/recursos/imagens/<?=$produto["imagem1"]?>" alt="<?=$produto["nome"]?>">-->  
                      <div id="marca"><img src="visao/recursos/imagens/logo.jpg" alt="logo"/></div>
                        <section> 
                            <strong><?=$produto["nome"]?></strong><br>
                            <?php 
                            if(strlen($produto["breve"]) > 150){
                                echo(substr(($produto["breve"]), 0, 150) . '...');
                            }else{
                                echo($produto["breve"]);
                            }
                            ?>
                        </section>
                      <a href="Conteudo.php?codproduto=<?=$produto["codproduto"]?>" class="btn btn-1">Leia mais</a> 
                      </div>
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
          
          
<?php
    $_REQUEST["submit"] = "Procurar Nome";
    $_REQUEST["nome"]   = "";
    require_once($antes."controlador/ControleApresentacao.php");
    $apresentacao = mysql_fetch_array($retorno);
?>          
    <div class="container">
          <div class="row">
        <article class="span6">
              <!--<h3>Apresentação</h3>-->
              <div class="wrapper">
            <figure class="img-indent">
                <img style="border: 10px solid white;margin-top: 55px;" src="thumbs.php?w=540&h=540&imagem=visao/recursos/imagens/<?=$apresentacao["imagem"]?> " alt="Imagem proprietários" title="Proprietários"/>
            </figure>
<!--            <div class="inner-1 overflow extra">
                  <div class="txt-1">
			<?=$apresentacao["sobrenos"]?>		
                  </div>
                  <div class="border-horiz"></div>
                </div>   -->
          </div>
            </article>
         <article class="span6">
         <br /><br />
                <div class="overflow">
                       <ul class="list list-pad">
                       <li><b>Apresentação:</b></li>
                       </ul>
                </div>
                <p>
                    <?=$apresentacao["sobrenos"]?>	
                </p>          
        
                <div class="overflow">
                       <ul class="list list-pad">
                       <li><b>Extensões:</b></li>
                       </ul>
                </div>
                <p>
                    <?=$apresentacao["extensoes"]?>	
                </p>       	
            </article>
      </div>
        </div>
  </div>
    </div>

    <?php include("visao/includes/rodape.php");?>
</body>
</html>