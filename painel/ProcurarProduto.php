<?php
    $painel = TRUE;
    include("includes/validaLogin.php");
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "ProcurarProduto") === FALSE){
        $_SESSION["erro"] = "";
    }     
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php");?>
        <script type="text/javascript" src="../visao/recursos/javascript/PesquisaProduto.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
<!--            <form action="" method="post" name="formproduto">-->
                <fieldset>
                    <legend>Procurar:</legend>
                    <p>
                        <label>Nome:</label>
                        <input type="search" autofocus placeholder="Digite aqui o nome para pesquisa" name="nome" id="nome" size="50" maxlength="50"/>
                        <input type="hidden" name="submited" value="true"/>
                        <button onclick="procuraProduto()">Procurar</button>
                    </p>                  
                </fieldset>
            <!--</form>-->
            <div id="txtHint">
                <b>Informações dos produtos serão listadas aqui...</b><br>
                -Deixe o nome em branco volta todos os cadastrados<br>
                -Digite parte do nome ele retornara todos que tiverem aquilo que tu digitou<br>
            </div>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
