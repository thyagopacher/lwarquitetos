/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function Orcamento(codproduto){
    var campo = '';
    if(document.getElementById("res").innerHTML === ""){
        campo += "<form action='../controlador/EnviaOrcamento.php' name='enviaOrcamento' method='post'>";
        campo += "<fieldset>";
        campo +=        "<legend>Pedido de orçamento</legend>";
        campo +=        "<input type='hidden' name='codproduto' value='" + codproduto + "'/>";
        campo +=        "<p>";
        campo +=            "<label>Nome:</label>";
        campo +=            "<input required type='text' name='nome' size='30' maxlength='50'/>";
        campo +=        "</p>";
        campo +=        "<p>";
        campo +=            "<label>E-mail:</label>";
        campo +=            "<input required type='text' name='email' size='30' maxlength='50'/>";
        campo +=        "</p>";   
        campo +=        "<p>";
        campo +=            "<input type='submit' name='submit' value='Enviar'/>";
        campo +=        "</p>";
        campo +=    "</fieldset>";
        campo += "</form>";
    }
    document.getElementById('res').innerHTML = campo;
}

function trocaImagem(indicep){
    if(indicep !== null && indicep !== ''){
        if(document.getElementById(indicep).src !== null && document.getElementById(indicep).src !== ''){
            document.getElementById('imgGrande').src = document.getElementById(indicep).src;
        }else{
            alert('Imagem vazia não pode ser trocada');
        }
    }else{
        alert('Não encontrou a imagem pequena');
    }
}

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'reverse',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	//$('.jqzoom').jqzoom();
});