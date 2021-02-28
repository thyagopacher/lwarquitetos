    <meta charset="utf-8" />
    <?php
            $painel = TRUE;
            $antes  = "../";    
            include($antes."controlador/ProcurarConfiguracao.php");
            include($antes."controlador/ProcurarEmpresa.php");
            $empresa      = mysql_fetch_array($retorno);
            $configuracao = mysql_fetch_array($retornoconfiguracao);    
    ?>    
    <meta name="description" content="Painel de controle do site da empresa <?=$empresa["fantasia"];?>" />
    <title><?=$empresa["fantasia"];?> | Painel</title>
    <link href="recursos/css/menuLateral.css" type="text/css" rel="stylesheet" />
    <?php include("includes/javascriptMenulateral.php");?>
    <link href="recursos/css/style.css" type="text/css" rel="stylesheet" />