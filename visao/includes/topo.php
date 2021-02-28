<?php

    $painel = "index";

?>

<div class="spinner"></div> 

<!--============================== header =================================-->

<header>

    <div class="container clearfix">

    <div class="row">

        <div class="span12">

        <div class="navbar navbar_">

              <div class="container">

            <h1 class="brand brand_"><a href="index.php"><img alt="" src="visao/recursos/imagens/logo.jpg"> </a></h1>

            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>

            <div class="nav-collapse nav-collapse_  collapse">

                    <ul class="nav sf-menu">

                         <li><a href="index.php" onmouseover="fechaMenu();">Início</a></li>

                         <li class="sub-menu"><a href="#" onmouseover="abreMenu();">Projetos</a></li>

                         <li><a href="galeria.php" onmouseover="fechaMenu();">Galeria</a></li>

                         <!--<li><a href="blog.php" onmouseover="fechaMenu();">Blog</a></li>-->

                     <li><a href="contato.php" onmouseover="fechaMenu();">Contato</a></li>

                   </ul>

             </div>  
            <div id="res" onmouseover="abreMenu()">
                 <a href="galeria.php?codcategoria=12">Arquitetura</a>
                 <a href="galeria.php?codcategoria=11">Interiores</a>
                 <a href="galeria.php?codcategoria=13">Paisagismo</a>
                 <a href="galeria.php?codcategoria=15">Clientes Corporativos</a>
                 <a href="galeria.php?codcategoria=14">Show room</a>
            </div>

          </div>

            </div>

      </div>

     </div>

  </div>

</header>