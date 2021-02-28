<?php
    include("includes/validaLogin.php");
    $painel = TRUE;
    if(isset($_SESSION["erro"]) && strstr($_SESSION["erro"], "ProcurarComentario") === FALSE){
        $_SESSION["erro"] = "";
    }     
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php");?>
        <script type="text/javascript" src="../visao/recursos/javascript/PesquisaComentario.js"></script>
    </head>
    <body>
        <?php 
        include("includes/topo.php");
        include("includes/menuLateral.php");
        ?>
        <div id="conteudo">
            <fieldset>
                <legend>Procurar Comentário</legend>
                <p>
                    <label>Nome:</label>
                    <input type="search" placeholder="Digite aqui o nome para pesquisa" name="nome" id="nome" size="50" maxlength="50"/>
                    <input type="hidden" name="submited" value="true"/>
                    <button onclick="procuraComentario()">Procurar</button>
                </p>                  
            </fieldset>
            <div id="txtHint"><b>Informações dos produtos serão listadas aqui...</b></div>
        </div>
        <?php include("includes/rodape.php");?>
    </body>
</html>
