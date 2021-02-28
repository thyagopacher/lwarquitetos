    <div id="topo">
        <img width="150" alt="" src="../visao/recursos/imagens/logo.jpg">
    	<div id="barra">
            
    	</div>
        <?php if(isset($_SESSION["codpessoa"])){?>
        <div id="menu_horizontal">
            <a href="index.php">Inicio</a>
            <a href="Configuracao">Configuração</a>
            <a href="Empresa">Empresa</a>
            <a href="Produto">Projeto</a>
            <a href="ProcurarProduto">Procurar Projeto</a>
            <a href="Pessoa">Pessoa</a>
            <a href="ProcurarPessoa">Procurar Pessoa</a>
            <a href="../controlador/Logout.php">Sair</a>
        </div>
        <?php }?>
<!--        <div id="busca">
            <form action="" name="formProcurar" method="post">
                <p>
                    <input type="search" name="nome" placeholder="Faça sua pesquisa aqui"/>
                    <input type="image" src="../visao/recursos/imagens/btprocurar.png" alt="Procurar" title="Procurar" name="submit"/>
                </p>
            </form>
        </div>-->
    
    </div>