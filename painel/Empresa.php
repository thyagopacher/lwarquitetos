<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_REQUEST["codempresa"])){
        include("../controlador/ControleEmpresa.php");
        if(isset($retorno)){
            $empresa = mysql_fetch_array($retorno);
        }else{
            $empresa = NULL;
        }
    }  
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Empresa") === FALSE){
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
            <form action="../controlador/ControleEmpresa.php" name="formEmpresa" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Gerenciamento de empresas</legend>
                    <input type="hidden" name="codempresa" value="<?php if(isset($empresa)){echo($empresa["codempresa"]);}?>"/>                  
                    <p>
                        <label>Fantasia:</label>
                        <input required type="text" name="fantasia" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["fantasia"]);}?>"/>
                    </p>
                    <p>
                        <label>Razão social:</label>
                        <input required type="text" name="razaosocial" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["razaosocial"]);}?>"/>
                    </p>   
                    <p>
                        <label>CNPJ:</label>
                        <input required type="text" name="cnpj" size="18" maxlength="18" onkeypress="return MascaraCNPJ(this, event);" value="<?php if(isset($empresa)){echo($empresa["cnpj"]);}?>"/>
                    </p> 
                    <p>
                        <label>Telefone:</label>
                        <input required type="text" name="telefone" size="15" maxlength="14" onkeypress="return MascaraTelefone(this, event);" value="<?php if(isset($empresa)){echo($empresa["telefone"]);}?>"/>
                    </p>   
                    <p>
                        <label>Celular:</label>
                        <input required type="text" name="celular" size="15" maxlength="14" onkeypress="return MascaraTelefone(this, event);" value="<?php if(isset($empresa)){echo($empresa["celular"]);}?>"/>
                    </p>    
                    <p>
                        <label>Fax:</label>
                        <input required type="text" name="fax" size="15" maxlength="14" onkeypress="return MascaraTelefone(this, event);" value="<?php if(isset($empresa)){echo($empresa["fax"]);}?>"/>
                    </p>       
                    <p>
                        <label>E-mail:</label>
                        <input required type="email" name="email" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["email"]);}?>"/>
                    </p>     
                    <p>
                        <label>CEP:</label>
                        <input required type="text" name="cep" id="cep" size="8" maxlength="8" onblur="return getEndereco();"  value="<?php if(isset($empresa)){echo($empresa["cep"]);}?>"/>
                    </p>          
                    <p>
                        <label>Tipo Logradouro:</label>
                        <input required type="text" name="tipologradouro" id="tipologradouro" size="20" maxlength="20"  value="<?php if(isset($empresa)){echo($empresa["tipologradouro"]);}?>"/>
                    </p>    
                    <p>
                        <label>Logradouro:</label>
                        <input required type="text" name="logradouro" id="logradouro" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["logradouro"]);}?>"/>
                    </p>    
                    <p>
                        <label>Número:</label>
                        <input type="text" name="numero" size="10" maxlength="10" value="<?php if(isset($empresa)){echo($empresa["numero"]);}?>"/>
                    </p>                   
                    <p>
                        <label>Bairro:</label>
                        <input required type="text" name="bairro" id="bairro" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["bairro"]);}?>"/>
                    </p>       
                    <p>
                        <label>Cidade:</label>
                        <input required type="text" name="cidade" id="cidade" size="50" maxlength="50" value="<?php if(isset($empresa)){echo($empresa["cidade"]);}?>"/>
                    </p>     
                    <p>
                        <label>Estado:</label>
                        <input required type="text" name="estado" id="estado" size="5" maxlength="5"  value="<?php if(isset($empresa)){echo($empresa["estado"]);}?>"/>
                    </p>                      
                    <p>
                        <label>Logo:</label>
                        <input type="file" name="logo" accept="image/*"/>
                        <?php 
                        if(isset($empresa["logo"])){
                            echo("<img src='../visao/recursos/imagens/$empresa[logo]' title='imagem 1' alt='imagem 1'/>");
                        }
                        ?>
                    </p>
                                      
                    <p>
                        <?php if(!isset($empresa)){?>
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
