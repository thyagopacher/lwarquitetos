<?php
    function verificaImagens($produto){
        $indice = 0;
        for($i = 1; $i < 9; $i++){
            if(!isset($produto["imagem". $i]) || $produto["imagem". $i] === "" || $produto["imagem". $i] === NULL){
                $indice = $i;
                break;
            }
        }
        return $indice;
    }
    include("includes/validaLogin.php");
    $painel = TRUE;
    if(isset($_REQUEST["codproduto"])){
        require_once("../controlador/ProcurarProdutoCodigo.php");
        if(isset($retornoproduto)){
            $produto = mysql_fetch_array($retornoproduto);
            $indice  = verificaImagens($produto) - 1;         
        }else{
            echo("Retorno sem preenchimento");
            $produto = NULL;
        }
    }
    if($indice < 0 || !isset($indice) || $indice === "" || $indice === NULL){
        $indice = 0;
    }      
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Produto") === FALSE){
        $_SESSION["erro"] = "";
    }     
    require_once("../controlador/ProcurarTodasCategorias.php");
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
            label{
                width: 190px;
            }
        </style>
        <script type="text/javascript" src="../visao/recursos/javascript/Mascara.js"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/tiny/tiny_mce.js"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/tiny/CarregaEditor.js"></script>
        <script type="text/javascript" src="../visao/recursos/javascript/AbreInputFile.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <form action="../controlador/ControleProduto.php" name="formProduto" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de produtos</legend>
                    <input type="hidden" name="codproduto" value="<?php if(isset($produto)){echo($produto["codproduto"]);}?>"/>
                    <p>
                        <label>Vitrine:</label>
                        <select name="vitrine" title="Aparece na página inicial">
                            <?php 
                            if(isset($produto) && isset($produto["vitrine"]) && $produto["vitrine"] === "SIM"){?>
                                <option>NÃO</option>
                                <option selected>SIM</option>
                            <?php 
                            }
                            if(isset($produto) && isset($produto["vitrine"]) && $produto["vitrine"] === "NÃO"){?>
                                <option selected>NÃO</option>
                                <option>SIM</option>                            
                           <?php
                            }
                            if((isset($produto) && ($produto["vitrine"] === NULL || $produto["vitrine"] === "")) || (!isset($produto) && $produto["vitrine"] !== "NÃO" && $produto["vitrine"] !== "SIM")){
                            ?>
                                <option>SIM</option>           
                                <option>NÃO</option>                     
                            <?php 
                            }?>
                        </select>
                    </p> 
                    <p>
                        <label>Categoria:</label>
                        <select name="codcategoria">
                            <?php
                                if(mysql_num_rows($retornotudo) > 0){
                                    while($categoria = mysql_fetch_array($retornotudo)){
                                        if(isset($produto["codcategoria"]) && $produto["codcategoria"] === $categoria["codcategoria"]){
                                            echo("<option value='$categoria[codcategoria]' selected>".$categoria["nome"]."</option>");
                                        }else{
                                            echo("<option value='$categoria[codcategoria]'>".$categoria["nome"]."</option>");
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
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($produto)){echo($produto["nome"]);}?>"/>
                    </p>
                    <p>
                        <label>Breve Descrição:</label>
                        <input required type="text" name="breve" title="Máximo 100 caracteres" size="100" maxlength="100" value="<?php if(isset($produto)){echo($produto["breve"]);}?>"/>
                    </p>
                    <p>
                        <label>Descrição:</label>
                        <textarea cols="70" rows="10" id="descricao" name="descricao"><?=$produto["descricao"]?></textarea>
                    </p>
                    <?php
                    include("ImagemVariosInput.php");
                    //include("ImagemUmInput.php");
                    ?>
                    <p>
                        <?php if(!isset($produto)){?>
                            <input type="submit" name="submit" value="Cadastrar"/>
                        <?php }else{?>
                            <input type="submit" name="submit" value="Editar"/>
                            <input type="submit" name="submit" value="Excluir"/>
                            <input type="submit" name="submit" value="Cadastrar Slide Show"/>
                        <?php }?>
                    </p>
                </fieldset>
            </form>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
