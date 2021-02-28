<?php
    include("includes/validaLogin.php");   
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Contato") === FALSE){
        $_SESSION["erro"] = "";
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
        <?php include("includes/head.php");?>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <form action="../controlador/EnviaContato.php" name="formContato" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Formulário de Contato</legend>
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value=""/>
                    </p>      
                    <p>
                        <label>E-mail:</label>
                        <input title="Opcional caso queira receber a resposta em outro e-mail" type="email" name="email" size="50" maxlength="50" value=""/>
                    </p>   
                    <p>
                        <label>Assunto:</label>
                        <select name="assunto">
                            <option>Dúvida</option>
                            <option>Sugestão</option>
                            <option>Reclamação</option>
                            <option>Erro no sistema</option>
                        </select>
                    </p>
                    <p>
                        <label>Mensagem:</label>
                        <textarea cols="80" rows="10" name="mensagem" required placeholder="Digite aqui a sua mensagem"></textarea>
                    </p>
                                      
                    <p>
                        <input type="submit" name="submit" value="Enviar"/>
                    </p>
                </fieldset>
            </form>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
