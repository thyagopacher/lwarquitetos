<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function verificaImagem($produto){
        $imagem = "";
        for($i = 1; $i < 9; $i++){
            if(isset($produto["imagem".$i]) && $produto["imagem".$i] !== NULL && $produto["imagem".$i] !== ""){
                $imagem = $produto["imagem".$i];
                break;
            }
        }
        return $imagem;
    } 

    if(isset($_REQUEST["procurar"])){
        include("../modelo/ModelProduto.php");
        $filtro = $_REQUEST["procurar"];
        $query  = "select * from produto p "
                . " where p.nome like '%$filtro%' or "
                . " p.descricao like '%$filtro%'";
        $modelo         = new ModelProduto();
        $retornoproduto = $modelo->procurar($query);
        if(mysql_num_rows($retornoproduto) > 0){
         ?>
         -Clique no nome para ver o perfil
         <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Imagem 1</th>
                    <th>Excluir</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
        <?php           
            while($produto = mysql_fetch_array($retornoproduto)){
                echo("<tr>");
                echo("<td>$produto[codproduto]</td>");
                echo("<td><a href='Produto.php?codproduto=$produto[codproduto]' title='Clique para editar o produto'>".$produto["nome"] . "</a></td>");
                echo("<td><img width='100' height='50' src='../visao/recursos/imagens/".  verificaImagem($produto)."' title='Imagem 1 do projeto'/></td>");
                echo("<td><a href='../controlador/ControleProduto.php?submit=Excluir&codproduto=$produto[codproduto]'>Excluir</a></td>");
                echo("<td><a href='SlideShow.php?codproduto=$produto[codproduto]'>Cadastrar Slide</a></td>");
                echo("</tr>");
            }
             ?>
            </tbody>
        </table>
<?php           
        }else{
            echo("Nada encontrado");
        }
    }
?>
