<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "ProcurarPessoa") === FALSE){
        $_SESSION["erro"] = "";
    }     
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php");?>
        <script type="text/javascript" src="../visao/recursos/javascript/PesquisaPessoa.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <!--<form action="" method="post" name="formpessoa">-->
                <fieldset>
                    <legend>Procurar Pessoa</legend>
                    <p>
                        <label>Nome:</label>
                        <input type="text" placeholder="Digite aqui o nome para pesquisa" name="nome" id="nome" size="50" maxlength="50"/>
                        <button onclick="procuraPessoa()">Procurar</button>
                    </p>                  
                </fieldset>
            <!--</form>-->
            <div id="txtHint"><b>Informações das pessoas serão listadas aqui...</b></div>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
