<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($_REQUEST["procurar"])){
        include("../modelo/ModelPessoa.php");
        $filtro = $_REQUEST["procurar"];
        $query  = "select * from pessoa p "
                . " where p.nome like '%$filtro%' or "
                . " p.logradouro like '%$filtro%' or"
                . " p.cidade like '%$filtro%' or"
                . " p.estado like '%$filtro%'";
        $modelo         = new ModelPessoa();
        $retornopessoa = $modelo->procurar($query);
        if(mysql_num_rows($retornopessoa) > 0){
            echo("<table border='1'>");
            echo("<thread>");
            echo("<tr>");
            echo("<th>Nome:</th>");
            echo("<th>Logradouro:</th>");
            echo("<th>Cidade:</th>");
            echo("<th>Estado:</th>");
            echo("<th>E-mail:</th>");
            echo("</tr>");
            echo("</thread>");
            echo("<tbody>");
            while($pessoa = mysql_fetch_array($retornopessoa)){
                echo("<tr>");
                echo("<td><a title='Clique para ver informações da pessoa' href='Pessoa.php?codpessoa=$pessoa[codpessoa]&submit=Procurar'>".$pessoa["nome"]."</a></td>");
                echo("<td><a title='Clique para visualizar endereço da pessoa no google maps' href=Localizacao.php?codpessoa=$pessoa[codpessoa]>".$pessoa["logradouro"]."</a></td>");
                echo("<td>".$pessoa["cidade"]."</td>");
                echo("<td>".$pessoa["estado"]."</td>");
                echo("<td><a href='mailto:$pessoa[email]'>".$pessoa["email"]."</a></td>");
                echo("</tr>");
            }
            echo("</tbody>");
            echo("</table>");
        }else{
            echo("Nada encontrado");
        }
    }
?>
