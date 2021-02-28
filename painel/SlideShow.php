<?php
    include("includes/validaLogin.php");
    $painel = TRUE;
    if(isset($_REQUEST["codslideshow"])){
        if(!isset($_REQUEST["submit"])){
            $_REQUEST["submit"] = "Procurar";
        }
        include("../controlador/ControleSlideShow.php");
        if(isset($retorno)){
            $slideshow = mysql_fetch_array($retorno);
        }else{
            $slideshow = NULL;
        }
    }
    if(isset($_REQUEST["codproduto"])){
        include("../controlador/ProcurarProdutoCodigo.php");
        if(isset($retornoproduto)){
            $produto = mysql_fetch_array($retornoproduto);
            $slideshow["link"] = "http://www.lwarquitetos.com.br/novo/Conteudo.php?codproduto=$produto[codproduto]";
        }else{
            echo("Retorno sem preenchimento");
            $produto = NULL;
        }
    }    
    
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "SlideShow") === FALSE){
        $_SESSION["erro"] = "";
    }     
    include("../controlador/ProcurarTodasCategorias.php");
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
        <style>
            #conteudo label{
                width: 50px;
            }
        </style>
        <script type="text/javascript" src="../visao/recursos/javascript/tiny/CarregaEditor.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <form action="../controlador/ControleSlideShow.php" name="formSlideShow" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de slide show</legend>
		     <input type="hidden" name="codslideshow" value="<?php if(isset($slideshow)){echo($slideshow["codslideshow"]);}?>"/>
                     <p>
                        <label>Título:</label>
                        <input type="text" placeholder="Digite aqui o titulo para o slide" name="titulo" size="100" maxlength="100" value="<?php if(isset($slideshow)){echo($slideshow["titulo"]);}?>"/>
                    </p>
                    <p>
                        <label>Link:</label>
                        <input title="Link para quando clicar no slide redirecionar para a página" type="text" name="link" size="100" value="<?php if(isset($slideshow)){echo($slideshow["link"]);}?>"/>
                    </p>                    
                    <p>
                        <label>Foto:</label>
                        <input title="Tamanho ideal (940px por 574px)" type="file" name="imagem" accept="image/*"/>
                        <?php if(isset($slideshow)){echo("<img width='100' height='50' src='../visao/recursos/imagens/$slideshow[imagem]' alt='Imagem slide' title='Imagem slide'/>");}?>
                    </p>
                    <p>
                        <label>Texto:</label>
                        <textarea cols="70" rows="10" name="texto"><?php if(isset($slideshow)){echo($slideshow["texto"]);}?></textarea>
                    </p>
                    <p>
                        <?php if(!isset($slideshow)){?>
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
