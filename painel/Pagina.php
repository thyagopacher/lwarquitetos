<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codpagina"])){
        include("../controlador/ControlePagina.php");
        if(isset($retorno)){
            $pagina = mysql_fetch_array($retorno);
        }else{
            $pagina = NULL;
        }
    }    
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Pagina") === FALSE){
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
        <script type="text/javascript" src="../visao/recursos/javascript/tiny/CarregaEditor.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <form action="../controlador/ControlePagina.php" name="formPagina" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de páginas</legend>
                    <input type="hidden" name="codpagina" value="<?php if(isset($pagina)){echo($pagina["codpagina"]);}?>"/>                  
                    <p>
                        <label>Titulo:</label>
                        <input required type="text" name="titulo" size="50" maxlength="50" value="<?php if(isset($pagina)){echo($pagina["titulo"]);}?>"/>
                    </p>                      
                    <p>
                        <label>Texto:</label>
                        <textarea name="texto" cols="80" rows="10" placeholder="Digite aqui seu conteúdo"><?php if(isset($pagina)){echo($pagina["texto"]);}?></textarea>
                    </p> 
<!--                    <p>
                        <label>Imagem:</label>
                        <input type="file" name="imagem" accept="image/*"/>
                        <?php 
                        if(isset($pagina["imagem"])){
                            echo("<img width='100' height='50' src='../visao/recursos/imagens/$pagina[imagem]' title='imagem da pagina' alt='imagem da pagina'/>");
                        }
                        ?>
                    </p>                                      -->
                    <p>
                        <?php if(!isset($pagina)){?>
                            <input type="submit" name="submit" value="Cadastrar"/>
                        <?php }else{?>
                            <input type="submit" name="submit" value="Editar"/>
                            <input type="submit" name="submit" value="Excluir"/>
                        <?php }?>
                    </p>
                </fieldset>
            </form>
            <?php
                    $_REQUEST["submit"] = "Procurar Titulo";
                    $_REQUEST["titulo"]   = "";
                    include("../controlador/ControlePagina.php");
                    if(isset($retorno) && $retorno !== FALSE){
                        $qtd = mysql_num_rows($retorno);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Titulo</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($pagina = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $pagina["codpagina"] ."</td>");
                                    echo("<td><a href='Pagina.php?codpagina=$pagina[codpagina]&submit=Procurar' title='Perfil da pagina'>". $pagina["titulo"] ."</a></td>");
                                    echo("<td><a href='ControlePagina.php?codpagina=$pagina[codpagina]&submit=Excluir' title='Excluir da pagina'>Excluir</a></td>");
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
