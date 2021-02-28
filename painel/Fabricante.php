<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codfabricante"])){
        include("../controlador/ControleFabricante.php");
        if(isset($retorno)){
            $fabricante = mysql_fetch_array($retorno);
        }else{
            $fabricante = NULL;
        }
    }
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Fabricante") === FALSE){
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
            <form action="../controlador/ControleFabricante.php" name="formFabricante" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de fabricantes</legend>
                    <input type="hidden" name="codfabricante" value="<?php if(isset($fabricante)){echo($fabricante["codfabricante"]);}?>"/>                  
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($fabricante)){echo($fabricante["nome"]);}?>"/>
                    </p>                      
                    <p>
                        <label>Logo:</label>
                        <input type="file" name="logo" accept="image/*"/>
                        <?php 
                        if(isset($fabricante["logo"])){
                            echo("<img src='../visao/recursos/imagens/$fabricante[logo]' title='imagem logo' alt='imagem logo'/>");
                        }
                        ?>
                    </p>
                                      
                    <p>
                        <?php if(!isset($fabricante)){?>
                            <input type="submit" name="submit" value="Cadastrar"/>
                        <?php }else{?>
                            <input type="submit" name="submit" value="Editar"/>
                            <input type="submit" name="submit" value="Excluir"/>
                        <?php }?>
                    </p>
                </fieldset>
            </form>
            <?php
                    $_REQUEST["submit"] = "Procurar Nome";
                    $_REQUEST["nome"]   = "";
                    include("../controlador/ControleFabricante.php");
                    if(isset($retorno) && $retorno !== FALSE){
                        $qtd = mysql_num_rows($retorno);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Qtd. Produtos</th>
                                        <th>Imagem</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($fabricante = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $fabricante["codfabricante"] ."</td>");
                                    echo("<td><a href='Fabricante.php?codfabricante=$fabricante[codfabricante]&submit=Procurar' title='Perfil da fabricante'>". $fabricante["nome"] ."</a></td>");
                                    echo("<td>".$fabricante["qtd"]."</td>");
                                    if(isset($fabricante["logo"])){
                                        echo("<td><img width='50' height='50' src='../visao/recursos/imagens/$fabricante[logo]' alt='Logo fabricante $fabricante[nome]' title='Logo fabricante $fabricante[nome]'/></td>");
                                    }else{
                                        echo("Sem imagem");
                                    }
                                    echo("<td><a href='ControleFabricante.php?codfabricante=$fabricante[codfabricante]&submit=Excluir' title='Excluir da fabricante'>Excluir</a></td>");
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
