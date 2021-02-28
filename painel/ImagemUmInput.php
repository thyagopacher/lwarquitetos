                    <?php if($indice < 8){?>
                    <a class="botao" href="javascript: abreInput()">Abre Imagem</a>
                    Imagens abertas:<div title="Quantidade de inputs abertos" id="indice"><?=$indice?></div>
                    <?php }?>    
                    <?php if(isset($produto["imagem1"]) && $produto["imagem1"] !== NULL && $produto["imagem1"] !== ""){?>
                    <p>
                        <label>Imagem - 1:(200px 150px)</label><br>
                        <input type="file" name="imagem1" accept="image/*" title="Tamanho ideal 200px por 150px"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem1]' title='imagem 1' alt='imagem 1'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem1">X</a>
                    </p>
                    <?php }?>
                    <?php if(isset($produto["imagem2"]) && $produto["imagem2"] !== NULL && $produto["imagem2"] !== ""){?>
                    <p>
                        <label>Imagem - 2:</label><br>
                        <input type="file" name="imagem2" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem2]' title='imagem 2' alt='imagem 2'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem2">X</a>
                    </p> 
                    <?php }?>
                    <?php if(isset($produto["imagem3"]) && $produto["imagem3"] !== NULL && $produto["imagem3"] !== ""){?>
                    <p>
                        <label>Imagem - 3:</label><br>
                        <input type="file" name="imagem3" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem3]' title='imagem 3' alt='imagem 3'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem3">X</a>               
                    </p>
                    <?php }?> 
                    <?php if(isset($produto["imagem4"]) && $produto["imagem4"] !== NULL && $produto["imagem4"] !== ""){?>
                    <p>
                        <label>Imagem - 4:</label><br>
                        <input type="file" name="imagem4" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem4]' title='imagem 4' alt='imagem 4'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem4">X</a>                
                    </p>
                    <?php }?>  
                    <?php if(isset($produto["imagem5"]) && $produto["imagem5"] !== NULL && $produto["imagem5"] !== ""){?>
                    <p>
                        <label>Imagem - 5:</label><br>
                        <input type="file" name="imagem5" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem5]' title='imagem 5' alt='imagem 5'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem5">X</a>              
                    </p> 
                    <?php }?>  
                    <?php if(isset($produto["imagem6"]) && $produto["imagem6"] !== NULL && $produto["imagem6"] !== ""){?>
                    <p>
                        <label>Imagem - 6:</label><br>
                        <input type="file" name="imagem6" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem6]' title='imagem 6' alt='imagem 6'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem6">X</a>            
                    </p> 
                    <?php }?>     
                    <?php if(isset($produto["imagem7"]) && $produto["imagem7"] !== NULL && $produto["imagem7"] !== ""){?>
                    <p>
                        <label>Imagem - 7:</label><br>
                        <input type="file" name="imagem7" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem7]' title='imagem 7' alt='imagem 7'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem7">X</a>              
                    </p>
                    <?php }?>  
                    <?php if(isset($produto["imagem8"]) && $produto["imagem8"] !== NULL && $produto["imagem8"] !== ""){?>
                    <p>
                        <label>Imagem - 8:</label><br>
                        <input type="file" name="imagem8" accept="image/*"/><br>
                        <?php echo("<img width='150' height='100' src='../recursos/imagens/$produto[imagem8]' title='imagem 8' alt='imagem 8'/><br>");?>
                        <a class="btexcluir" href="../../controlador/ControleProduto.php?submit=Excluir Imagem&codproduto=<?=$produto["codproduto"]?>&ordem=imagem8">X</a>            
                    </p> 
                    <?php }?> 
                    <div id="res"></div> 