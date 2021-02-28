<?php
    if(isset($_REQUEST["codproduto"])){
        include("../controlador/ProcurarProdutoCodigo.php");
        if(isset($retornoproduto)){
           $produto = mysql_fetch_array($retornoproduto); 
           $_REQUEST["codcategoria"] = $produto["codcategoria"];
           $_REQUEST["codproduto"]   = $produto["codproduto"];
           include("../controlador/ProcurarProdutoCategoria.php");
        }else{
            echo("Retorno não voltou nada");
        }
    }else{
        echo("Não pode pesquisar sem código do produto");
    }
?>
<!DOCTYPE html>
<html> 
    <head>
        <?php include("includes/head.php");?>
        <link href="recursos/css/tema1/menuLateral.css" type="text/css" rel="stylesheet" />
        <link href="recursos/css/tema1/geral.css" type="text/css" rel="stylesheet" />
        <link href="recursos/css/tema1/quadroEsquerda.css" type="text/css" rel="stylesheet" />     
        <link href="recursos/css/tema1/produto.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="recursos/css/tema1/jquery.jqzoom.css" type="text/css">
        <?php include("includes/mudaCor.php");?>
        <script type="text/javascript" src="recursos/javascript/jquery.js"></script>
        <script type='text/javascript' src='recursos/javascript/jquery.jqzoom-core.js'></script> 
        <script type="text/javascript" src="recursos/javascript/Produto.js"></script>       
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/barraBusca.php");
        ?>
        <div id="ladoEsquerdo">
            <?php
            include("includes/menuLateral.php");
            include("includes/quadroEsquerda.php");
            ?>
        </div>
        <div id="conteudo">
            <div id="produto">
                <div id="imgsProduto">
                    <span style="font-size: 10px;">(Passe o mouse para o zoom)</span>
                    <div class="clearfix">
                        <a href="recursos/imagens/<?=$produto["imagem1"]?>" class="jqzoom" rel='gal1' > 
                            <img src="recursos/imagens/<?=$produto["imagem1"]?>" id="imgGrande" width="200" height="150" class="grande" title="Imagem grande produto"/>
                        </a>
                    </div>
                    <div class="clearfix">
                        <ul id="thumblist" class="clearfix" >
                        <?php if(isset($produto["imagem1"]) && $produto["imagem1"] !== NULL && $produto["imagem1"] !== ""){?>
                            <li>
                                <a href="javascript: trocaImagem('imagem1')"> 
                                    <img src="recursos/imagens/<?=$produto["imagem1"]?>" id="imagem1" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>
                        <?php }?>
                        <?php if(isset($produto["imagem2"]) && $produto["imagem2"] !== NULL && $produto["imagem2"] !== ""){?>
                            <li>    
                                <a href="javascript: trocaImagem('imagem2')"> 
                                    <img src="recursos/imagens/<?=$produto["imagem2"]?>" id="imagem2" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>
                        <?php }?>
                        <?php if(isset($produto["imagem3"]) && $produto["imagem3"] !== NULL && $produto["imagem3"] !== ""){?>
                            <li>    
                                <a href="javascript: trocaImagem('imagem3')"> 
                                    <img src="recursos/imagens/<?=$produto["imagem3"]?>" id="imagem3" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>    
                        <?php }?>
                        <?php if(isset($produto["imagem4"]) && $produto["imagem4"] !== NULL && $produto["imagem4"] !== ""){?>
                            <li>    
                                <a href="javascript: trocaImagem('imagem4')"> 
                                    <img src="recursos/imagens/<?=$produto["imagem4"]?>" id="imagem4" onclick="trocaImagem('imagem4');" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>    
                        <?php }?>
                        <?php if(isset($produto["imagem5"]) && $produto["imagem5"] !== NULL && $produto["imagem5"] !== ""){?>
                            <li>    
                                <a href="javascript: trocaImagem('imagem5')"> 
                                    <img src="recursos/imagens/<?=$produto["imagem5"]?>" id="imagem5" onclick="trocaImagem('imagem5');" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>    
                        <?php }?>
                        <?php if(isset($produto["imagem6"]) && $produto["imagem6"] !== NULL && $produto["imagem6"] !== ""){?>
                            <li>    
                                <a href='javascript:void(0);'  onclick="trocaImagem('imagem6');"> 
                                    <img src="recursos/imagens/<?=$produto["imagem6"]?>" id="imagem6" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>    
                        <?php }?>
                        <?php if(isset($produto["imagem7"]) && $produto["imagem7"] !== NULL && $produto["imagem7"] !== ""){?>
                             <li>   
                                <a href='javascript:void(0);'  onclick="trocaImagem('imagem7');"> 
                                    <img src="recursos/imagens/<?=$produto["imagem7"]?>" id="imagem7" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                             </li>    
                        <?php }?>
                        <?php if(isset($produto["imagem8"]) && $produto["imagem8"] !== NULL && $produto["imagem8"] !== ""){?>
                            <li>    
                                <a href='javascript:void(0);'> 
                                    <img src="recursos/imagens/<?=$produto["imagem8"]?>" id="imagem8" width="100" height="50" class="pequena" title="Imagem pequena produto"/>
                                </a>
                            </li>   
                        <?php }?>
                        </ul>
                    </div>
                </div>
                <div id="infProduto">
                    <h3><?=$produto["nome"]?></h3>
                    <span>R$ <?=number_format($produto['valor'], 2, ',', '.')?></span>
                    <?php 
                    if(isset($configuracao["emailpagseguro"]) && $configuracao["emailpagseguro"] !== NULL && $configuracao["emailpagseguro"] !== ""){
                        include("includes/formPagseguro.php");
                    }else{
                        include("includes/formOrcamento.php");
                    }
                    ?>
                </div>
                <div id="descricao">
                    <h4>DESCRIÇÃO</h4>
                    <span><?=$produto["descricao"]?></span>
                </div>
                <div id="outrosProdutos">
                    <h4>OUTROS PRODUTOS NA MESMA ÁREA:</h4>
                    <?php 
                    if(mysql_num_rows($produtocategoria) > 0){
                        while($outros = mysql_fetch_array($produtocategoria)){
                    ?>
                        <a href="Produto.php?codproduto=<?=$outros["codproduto"]?>">
                            <?php 
                            if(isset($outros["imagem1"])){?>
                                <img src="recursos/imagens/<?=$outros["imagem1"]?>" title="Imagem de <?=$outros["nome"]?>" alt="Imagem de <?=$outros["nome"]?>"/>
                            <?php 
                            }else{
                                echo($outros["nome"] - $outros["valor"]);
                            }
                            ?>
                        </a>
                   <?php 
                        }
                    }else{
                        echo("Não encontrado outros na mesma área");
                    }
                    ?>
                </div> 
                <?php
                $codproduto = $produto["codproduto"];
                include("includes/Comentario.php");
                $_REQUEST["codproduto"] = $codproduto;
                include("../controlador/ProcurarProdutoComentario.php");
                if(mysql_num_rows($retornocomentario) > 0){
                    while($comentario = mysql_fetch_array($retornocomentario)){
                        echo("$comentario[nome], $comentario[email], $comentario[texto]");
                    }
                }else{
                    echo("Nada encontrado de comentários");
                }
                ?>
            </div>
        </div>    
        <?php
        include("includes/rodape.php");
        ?>
    </body>
</html>
