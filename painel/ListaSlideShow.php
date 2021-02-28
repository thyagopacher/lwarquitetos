<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "ListaSlideShow") === FALSE){
        $_SESSION["erro"] = "";
    }     
?>
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
                    $painel = TRUE;
                    include("../controlador/ProcurarSlide.php");
                    if(isset($retornoslides)){
                        $qtd = mysql_num_rows($retornoslides);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Titulo</th>
                                        <th>Texto</th>
                                        <th>Imagem</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($slideshow = mysql_fetch_array($retornoslides)){
                                    echo("<tr>");
                                    echo("<td>". $slideshow["codslideshow"] ."</td>");
                                    echo("<td><a href='SlideShow.php?codslideshow=$slideshow[codslideshow]&submit=Procurar' title='Perfil da slideshow'>". $slideshow["titulo"] ."</a></td>");
                                    echo("<td>". $slideshow["texto"] ."</td>");
                                    if(isset($slideshow["imagem"]) && $slideshow["imagem"] !== NULL && $slideshow["imagem"] !== ""){
                                        echo("<td><img width='150' height='100' src='../visao/recursos/imagens/$slideshow[imagem]' alt='Imagem slideshow' title='Imagem slideshow'/></td>");
                                    }else{
                                        echo("<td>Nada encontrado</td>");
                                    }
                                    echo("<td>");
                                    echo("<a class='btexcluir' href='../controlador/ControleSlideShow.php?codslideshow=$slideshow[codslideshow]&submit=Excluir' title='Excluir de slideshow'>X</a>");
                                    echo("<a title='Clique aqui para editar' href='SlideShow.php?codslideshow=$slideshow[codslideshow]'>Editar</a>");
                                    echo("</td>");
                                    echo("</tr>");
                                } 
                            }else{
                                echo("Não encontrado");
                            }?>
                                </tbody>
                            </table>
                    <?php
                         }
            ?>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
