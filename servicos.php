<!DOCTYPE html>
<html lang="en">
	<head>
            <?php include("visao/includes/head.php");?>
            <title><?=$empresa["fantasia"]?> | Serviços</title>
            <link rel="icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
            <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/superfish.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
            <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
            <script>		
                     jQuery(window).load(function() {	
                     $x = $(window).width();		
            if($x > 1024)
            {			
            jQuery("#content .row").preloader();    }			 

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
        <article class="span12">
              <h3>Serviços</h3>
            </article>
        <div class="clear"></div>
        <ul class="thumbnails thumbnails-1 list-services">
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img1.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img2.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img3.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img4.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img5.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
              <li class="span4">
            <div class="thumbnail thumbnail-1"> <img  src="img/page2-img6.jpg" alt="">
                  <section> <a href="#" class="link-1">At vero eos et accusamus et iusto </a>
                <p>Deleniti atque corrupti quos dolores molestias excepturi sint occaecati cupiditate nonprovident similique sunt in culpa.</p>
              </section>
                </div>
          </li>
            </ul>
      </div>
        </div>
  </div>
    </div>

    <?php include("visao/includes/rodape.php");?>
</body>
</html>