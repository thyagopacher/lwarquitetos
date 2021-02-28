<?php
    include("includes/validaLogin.php");   
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Configuracao") === FALSE){
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
        <script type="text/javascript" src="../visao/recursos/javascript/tiny/tiny_mce.js"></script>
    </head> 
    <body> 
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <?php
            if(isset($_SESSION["erro"]) && $_SESSION["erro"] !== NULL && $_SESSION["erro"] !== ""){
                echo("<div id='erro'>");
                echo($_SESSION["erro"]);
                echo("</div>");
            }
            ?>              
            <form action="../controlador/ControleConfiguracao.php" name="formConfiguracao" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de configuração</legend>
                    <input type="hidden" name="codconfiguracao" value="<?php if(isset($configuracao)){echo($configuracao["codconfiguracao"]);}?>"/>                                     
<!--                    <p>
                        <label>E-mail PagSeguro:</label>
                        <input type="email" name="emailpagseguro" size="50" maxlength="50" title="Para liberação de compras via pagseguro" value="<?php if(isset($configuracao)){echo($configuracao["emailpagseguro"]);}?>"/>
                    </p>-->
<!--                    <p>
                        <label>Cor body:</label>
                        <input type="color" name="corbody" value="<?php if(isset($configuracao)){echo($configuracao["corbody"]);}?>"/>
                    </p>                    
                    <p>
                        <label>Cor topo:</label>
                        <input type="color" name="cortopo" value="<?php if(isset($configuracao)){echo($configuracao["cortopo"]);}?>"/>
                    </p>
                    <p>
                        <label>Cor rodapé:</label>
                        <input type="color" name="corrodape" value="<?php if(isset($configuracao)){echo($configuracao["corrodape"]);}?>"/>
                    </p> -->
<!--                    <p>
                        <label>Cor original:</label>
                        <select name="cor">
                            <option>NÃO</option>
                            <option>SIM</option>
                        </select>
                    </p>-->
                    <p>
                        <label>Palavra chave:</label>
                        <textarea name="palavrachave" placeholder="Digite suas palavras chave aqui" cols="80" rows="10"><?php if(isset($configuracao)){echo($configuracao["palavrachave"]);}?></textarea>
                    </p> 
                    <p>
                        <label>Descrição:</label>
                        <textarea name="descricao" placeholder="Digite sua mini descrição aqui" cols="80" rows="10"><?php if(isset($configuracao)){echo($configuracao["descricao"]);}?></textarea>
                    </p> 
                    <p>
                        <label>Quem somos:</label>
                        <textarea class="text" name="quemsomos" placeholder="Digite o quem somos aqui" cols="80" rows="10"><?php if(isset($configuracao)){echo($configuracao["quemsomos"]);}?></textarea>
                    </p>                      
                                      
                    <p>
                        <?php if(!isset($configuracao)){?>
                            <input type="submit" name="submit" value="Cadastrar"/>
                        <?php }else{?>
                            <input type="submit" name="submit" value="Editar"/>
                            <input type="submit" name="submit" value="Excluir"/>
                        <?php }?>
                    </p>
                </fieldset>
            </form>         
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
