/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function procuraPessoa(){
    var procurar = document.getElementById("nome").value;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","../controlador/ProcurarPessoa.php?procurar="+procurar,true);
    xmlhttp.send();
}

