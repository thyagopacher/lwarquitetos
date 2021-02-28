<?php
    include("includes/validaLogin.php");
    $painel = TRUE;
    if(isset($_REQUEST["codpessoa"])){
        include("../controlador/ControlePessoa.php");
        if(isset($retorno)){
            $pessoa = mysql_fetch_array($retorno);
        }else{
            $pessoa = NULL;
        }
    }
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "Pessoa") === FALSE){
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
            <form action="../controlador/ControlePessoa.php" name="formPessoa" method="post">
                <fieldset>
                    
                    <legend>Gerenciamento de pessoas</legend>
                    <input type="hidden" name="codpessoa" value="<?=$pessoa["codpessoa"];?>"/>
                    <p>
                        <label>Nome:</label>
                        <input required type="text" name="nome" size="50" maxlength="50" value="<?php if(isset($pessoa)){echo($pessoa["nome"]);}?>"/>
                    </p>
                    <p>
                        <label>CPF:</label>
                        <input required type="text" onkeypress="return mascaraInteiro(event);" name="cpf" size="11" maxlength="11" value="<?php if(isset($pessoa)){echo($pessoa["cpf"]);}?>"/>
                    </p> 
                    <p>
                        <label>Login:</label>
                        <input required type="text" name="login" size="50" maxlength="50"  value="<?php if(isset($pessoa)){echo($pessoa["login"]);}?>"/>
                    </p>
                    <p>
                        <label>Senha:</label>
                        <input required type="password" name="senha" size="20" maxlength="20"  value="<?php if(isset($pessoa)){echo($pessoa["senha"]);}?>"/>
                    </p>
                    <p>
                        <label>CEP:</label>
                        <input required type="text" name="cep" id="cep" size="8" maxlength="8" onblur="return getEndereco();"  value="<?php if(isset($pessoa)){echo($pessoa["cep"]);}?>"/>
                    </p>          
                    <p>
                        <label>Tipo Logradouro:</label>
                        <input required type="text" name="tipologradouro" id="tipologradouro" size="20" maxlength="20"  value="<?php if(isset($pessoa)){echo($pessoa["tipologradouro"]);}?>"/>
                    </p>    
                    <p>
                        <label>Logradouro:</label>
                        <input required type="text" name="logradouro" id="logradouro" size="50" maxlength="50" value="<?php if(isset($pessoa)){echo($pessoa["logradouro"]);}?>"/>
                    </p>    
                    <p>
                        <label>Número:</label>
                        <input type="text" name="numero" size="10" maxlength="10" value="<?php if(isset($pessoa)){echo($pessoa["numero"]);}?>"/>
                    </p>                   
                    <p>
                        <label>Bairro:</label>
                        <input required type="text" name="bairro" id="bairro" size="50" maxlength="50" value="<?php if(isset($pessoa)){echo($pessoa["bairro"]);}?>"/>
                    </p>       
                    <p>
                        <label>Cidade:</label>
                        <input required type="text" name="cidade" id="cidade" size="50" maxlength="50" value="<?php if(isset($pessoa)){echo($pessoa["cidade"]);}?>"/>
                    </p>     
                    <p>
                        <label>Estado:</label>
                        <input required type="text" name="estado" id="estado" size="5" maxlength="5"  value="<?php if(isset($pessoa)){echo($pessoa["estado"]);}?>"/>
                    </p>  
                    <p>
                        <label>E-mail:</label>
                        <input required type="email" name="email" size="50" maxlength="50"  value="<?php if(isset($pessoa)){echo($pessoa["email"]);}?>"/>
                    </p>                     
                    <p>
                        <label>Telefone:</label>
                        <input required type="text" onkeypress="return MascaraTelefone(this, event);" name="telefone" size="15" maxlength="14"  value="<?php if(isset($pessoa)){echo($pessoa["telefone"]);}?>"/>
                    </p>       
                    <p>
                        <label>Celular:</label>
                        <input required type="text" onkeypress="return MascaraTelefone(this, event);" name="celular" size="15" maxlength="14"  value="<?php if(isset($pessoa)){echo($pessoa["celular"]);}?>"/>
                    </p>                    
                    <p>
                        <?php if(!isset($_REQUEST["codpessoa"]) && !isset($pessoa)){?>
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
