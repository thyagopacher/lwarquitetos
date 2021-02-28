<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    $_REQUEST["submit"] = "Procurar Nome";
    $_REQUEST["nome"]   = "";
    include("../controlador/ControleApresentacao.php");  
    $apresentacao = mysql_fetch_array($retorno);
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Apresentacao") === FALSE){
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
        <script type="text/javascript" src="../visao/recursos/javascript/Mascara.js"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/jquery.js"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/Endereco.js"></script>        
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
            <form action="../controlador/ControleApresentacao.php" name="formApresentacao" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro de Apresentação</legend>
                    <input type="hidden" name="codapresentacao" value="<?php if(isset($apresentacao)){echo($apresentacao["codapresentacao"]);}?>"/>                  
                    <p>
                        <label>Sobre nós:</label>
                        <textarea cols="70" rows="10" name="sobrenos" placeholder="Digite aqui sobre nós"><?php if(isset($apresentacao)){echo($apresentacao["sobrenos"]);}?></textarea>
                    </p>
                    <p>
                        <label>Extensões:</label>
                        <textarea cols="70" rows="10" name="extensoes" placeholder="Digite aqui extensoes"><?php if(isset($apresentacao)){echo($apresentacao["extensoes"]);}?></textarea>
                    </p>                     
                    <p>
                        <label>Logo:</label>
                        <input type="file" name="imagem" accept="image/*"/>
                        <?php 
                        if(isset($apresentacao["imagem"])){
                            echo("<img width='100' height='50' src='../visao/recursos/imagens/$apresentacao[imagem]' title='imagem apresentação' alt='imagem apresentação'/>");
                        }else{
                            echo("Nenhuma foto carregada ainda");
                        }
                        ?>
                    </p>
                                      
                    <p>
                        <?php if(!isset($apresentacao)){?>
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
