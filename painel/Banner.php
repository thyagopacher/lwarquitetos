<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codbanner"])){
        include("../controlador/ControleBanner.php");
        if(isset($retorno)){
            $banner = mysql_fetch_array($retorno);
        }else{
            $banner = NULL;
        }
    }
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Banner") === FALSE){
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
            <?php
            if(isset($_SESSION["erro"]) && $_SESSION["erro"] !== NULL && $_SESSION["erro"] !== ""){
                echo("<div id='erro'>");
                echo($_SESSION["erro"]);
                echo("</div>");
            }
            ?>              
            <form action="../controlador/ControleBanner.php" name="formBanner" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de banners</legend>
                    <input type="hidden" name="codbanner" value="<?php if(isset($banner)){echo($banner["codbanner"]);}?>"/>                  
                    <p>
                        <label>Link:</label>
                        <input required type="url" name="link" size="50" value="<?php if(isset($banner)){echo($banner["linksite"]);}?>"/>
                    </p>                      
                    <p>
                        <label>Imagem:</label>
                        <input type="file" name="imagem" accept="image/*"/>
                        <?php 
                        if(isset($banner["imagem"])){
                            echo("<img src='../visao/recursos/imagens/$banner[imagem]' title='imagem imagem' alt='imagem imagem'/>");
                        }
                        ?>
                    </p>
                                      
                    <p>
                        <?php if(!isset($banner)){?>
                            <input type="submit" name="submit" value="Cadastrar"/>
                        <?php }else{?>
                            <input type="submit" name="submit" value="Editar"/>
                            <input type="submit" name="submit" value="Excluir"/>
                        <?php }?>
                    </p>
                </fieldset>
            </form>
            <?php
                    $_REQUEST["submit"] = "Procurar Link";
                    $_REQUEST["link"]   = "";
                    include("../controlador/ControleBanner.php");
                    
                    if(isset($retorno) && $retorno !== FALSE){
                        $qtd = mysql_num_rows($retorno);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Link</th>
                                        <th>Imagem</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($banner = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $banner["codbanner"] ."</td>");
                                    echo("<td><a href='Banner.php?codbanner=$banner[codbanner]&submit=Procurar' title='Perfil da banner'>". $banner["linksite"] ."</a></td>");
                                    if(isset($banner["imagem"])){
                                        echo("<td><img width='50' height='50' src='../visao/recursos/imagens/$banner[imagem]' alt='Imagem banner' title='Imagem banner'/></td>");
                                    }else{
                                        echo("Sem imagem");
                                    }
                                    echo("<td><a href='../controlador/ControleBanner.php?codbanner=$banner[codbanner]&submit=Excluir' title='Excluir da banner'>Excluir</a></td>");
                                    echo("</tr>");
                                } 
                            }else{
                                echo("Não encontrado");
                            }?>
                                </tbody>
                            </table>
                    <?php
                         }else{
                             echo("Nada encontrado");
                         }
            ?>            
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
