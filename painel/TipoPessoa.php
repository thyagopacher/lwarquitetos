<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codtipo"])){
        include("../controlador/ControleTipoPessoa.php");
        if(isset($retorno)){
            $tipo = mysql_fetch_array($retorno);
        }else{
            $tipo = NULL;
        }
    } 
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "TipoPessoa") === FALSE){
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
            <form action="../controlador/ControleTipoPessoa.php" name="formTipoPessoa" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de tipos</legend>
                    <input type="hidden" name="codtipo" value="<?php if(isset($tipo)){echo($tipo["codtipo"]);}?>"/>                  
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($tipo)){echo($tipo["nome"]);}?>"/>
                    </p>                      
                    <p>
                        <?php if(!isset($tipo)){?>
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
                    include("../controlador/ControleTipoPessoa.php");
                    if(isset($retorno) && $retorno !== FALSE){
                        $qtd = mysql_num_rows($retorno);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Qtd. Pessoas</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($tipo = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $tipo["codtipo"] ."</td>");
                                    echo("<td><a href='TipoPessoa.php?codtipo=$tipo[codtipo]&submit=Procurar' title='Perfil da tipo'>". $tipo["nome"] ."</a></td>");
                                    echo("<td>".$tipo["qtd"]."</td>");
                                    echo("<td><a href='ControleTipoPessoa.php?codtipo=$tipo[codtipo]&submit=Excluir' title='Excluir da tipo'>Excluir</a></td>");
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
