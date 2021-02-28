<?php
    if(isset($painel) && $painel === "index"){
        $antes = "";
    }else{
        $antes = "../";
    }
    include($antes."modelo/ModelSlideShow.php");
    
    $modelo        = new ModelSlideShow();
    $slideshow     = new SlideShow();
    $retornoslides = $modelo->procurarTodos();
?>