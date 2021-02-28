<?php
    session_start();
    if(!isset($_SESSION["codpessoa"])){
        echo("<script>location.href='Login.php';</script>");
    }
?>