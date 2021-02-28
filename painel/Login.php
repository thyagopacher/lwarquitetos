<?php
    session_start();
    if(isset($_SESSION["codpessoa"])){
        echo("<script>alert('Bem vindo ao painel administrativo!');</script>");
        echo("<script>location.href='Home.php';</script>");
    }
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?php 
        include("includes/head.php");
        ?>    
    </head>
    <body>
        <?php include("includes/topo.php");?>
        <div id="conteudo">
            <form action="../controlador/ControlePessoa.php" name="login" method="post" class="login">
                <fieldset>
                    <legend>Login - Painel Administrativo</legend>
                    <p>
                        <label>Usuário</label>
                        <input required type="text" name="login" size="30" maxlength="30"/>
                    </p>
                    <p>
                        <label>Senha</label>
                        <input required type="password" name="senha" size="30" maxlength="30"/>
                    </p>  
                    <p>
                        <input type="submit" name="submit" value="Login"/>
                    </p>
                </fieldset>
            </form>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
