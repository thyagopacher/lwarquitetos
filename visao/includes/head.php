<?php
    $antes = "";
    $painel = "index";
    if($painel === TRUE){
        $antes = "../";
    }
    require_once($antes."controlador/ProcurarEmpresa.php");
    $empresa      = mysql_fetch_array($retorno);
    require_once($antes."controlador/ProcurarConfiguracao.php");
    $configuracao = mysql_fetch_array($retornoconfiguracao);    
?>    
<meta charset="utf-8" />
<meta name="language" content="portuguese">   
<meta name="robots" content="ALL" />
<meta name="keywords" content="<?=$configuracao["palavrachave"]?>" />
<meta name="description" content="<?=$configuracao["descricao"]?>" />
<meta name="author" content="webmaster@ebiro.com.br">
<script language="javascript">
    function Verificar()
    {
        var ctrl = window.event.ctrlKey;
        var tecla = window.event.keyCode;
        if (ctrl && tecla === 67) {
            alert("Proibido CTRL+C");
            event.keyCode = 0;
            event.returnValue = false;
        }
        if (ctrl && tecla === 86) {
            alert("Proibido CTRL+V");
            event.keyCode = 0;
            event.returnValue = false;
        }
    }

    function click() {
        if (event.button === 2 || event.button === 3) {
            oncontextmenu = 'return false';
        }
    }
    document.onmousedown = click;
    document.oncontextmenu = new Function("return false;");
</script>