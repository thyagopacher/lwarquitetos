<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codcargo"])){
        include("../controlador/ControleCargo.php");
        if(isset($retorno)){
            $cargo = mysql_fetch_array($retorno);
        }else{
            $cargo = NULL;
        }
    } 
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Cargo") === FALSE){
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
            <form action="../controlador/ControleCargo.php" name="formCargo" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de cargos</legend>
                    <input type="hidden" name="codcargo" value="<?php if(isset($cargo)){echo($cargo["codcargo"]);}?>"/>                  
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($cargo)){echo($cargo["nome"]);}?>"/>
                    </p>                      
                    <p>
                        <label>Salário:</label>
                        <input required type="text" name="salario" size="10" maxlength="10" onKeyPress="return(MascaraMoeda(this,'.',',',event));"  value="<?php if(isset($cargo)){echo(number_format($cargo['salario'], 2, ',', '.'));}?>"/>
                    </p> 
                                      
                    <p>
                        <?php if(!isset($cargo)){?>
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
                    include("../controlador/ControleCargo.php");
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
                                        <th>Salário</th>
                                        <th>Total</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($cargo = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $cargo["codcargo"] ."</td>");
                                    echo("<td><a href='Cargo.php?codcargo=$cargo[codcargo]&submit=Procurar' title='Perfil da cargo'>". $cargo["nome"] ."</a></td>");
                                    echo("<td>".$cargo["qtd"]."</td>");
                                    echo("<td>".number_format($cargo['salario'], 2, ',', '.')."</td>");
                                    echo("<td>".number_format($cargo['total'], 2, ',', '.')."</td>");
                                    echo("<td><a href='ControleCargo.php?codcargo=$cargo[codcargo]&submit=Excluir' title='Excluir da cargo'>Excluir</a></td>");
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
