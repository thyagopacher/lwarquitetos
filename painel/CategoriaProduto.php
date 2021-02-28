<?php
    try{
        $painel = TRUE;
        include("includes/validaLogin.php");
        if(isset($_REQUEST["codcategoria"])){
            include("../controlador/ControleCategoriaProduto.php");
            if(isset($retorno) && $retorno !== FALSE){
                $categoria    = mysql_fetch_array($retorno);
                $nome         = $categoria["nome"];
                $codmestre    = $categoria["codmestre"];
                $codcategoria = $_REQUEST["codcategoria"];
            }else{
                $categoria = NULL;
            }
        }
        include("../controlador/ProcurarTodasCategorias.php");
    }catch(Exception $ex){
        echo("Erro causado por: $ex");
    }
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "CategoriaProduto") === FALSE){
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
            <form action="../controlador/ControleCategoriaProduto.php" name="formCategoria" method="post">
                <fieldset>
                    <legend>Gerenciamento de categoria</legend>
                    <input type="hidden" name="codcategoria" value="<?php echo($codcategoria);?>"/>
                    <p>
                        <label>Categoria:</label>
                        <select name="codmestre" title="Escolha aqui a categoria mestre">
                            <?php
                            if(isset($retornotudo) && $retornotudo !== FALSE && mysql_num_rows($retornotudo) > 0){
                                echo("<option value=''>Nenhuma</option>");
                                while($mestre = mysql_fetch_array($retornotudo)){
                                    if(isset($codmestre) && $codmestre !== NULL && $codmestre === $mestre["codcategoria"]){
                                        echo("<option value='$mestre[codcategoria]' selected>$mestre[nome]</option>");
                                    }else{
                                        echo("<option value='$mestre[codcategoria]'>$mestre[nome]</option>");
                                    }
                                }
                            }else{
                                echo("<option>Nada encontrado</option>");
                            }
                            ?>
                        </select>
                    </p>                     
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($_REQUEST["codcategoria"])){echo($nome);}?>"/>
                    </p>                             
                    <p>
                        <?php if(!isset($_REQUEST["codcategoria"])){?>
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
                    include("../controlador/ControleCategoriaProduto.php");
                    if(isset($retorno) && $retorno !== FALSE){
                        $qtd = mysql_num_rows($retorno);
                        echo("Encontrou $qtd resultados<br>");
             ?>
                           <table border="1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Cat. Mestre</th>
                                        <th>Qtd. Produtos</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            if($qtd > 0){
                                while($categoria = mysql_fetch_array($retorno)){
                                    echo("<tr>");
                                    echo("<td>". $categoria["codcategoria"] ."</td>");
                                    echo("<td><a href='CategoriaProduto.php?codcategoria=$categoria[codcategoria]&submit=Procurar' title='Perfil da categoria'>". $categoria["nome"] ."</a></td>");
                                    echo("<td>". $categoria["mestre"] ."</td>");
                                    echo("<td>".$categoria["qtd"]."</td>");
                                    echo("<td><a href='../controlador/ControleCategoriaProduto.php?codcategoria=$categoria[codcategoria]&submit=Excluir' title='Excluir da categoria'>Excluir</a></td>");
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
