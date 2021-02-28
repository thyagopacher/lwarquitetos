<script>
function abrelink(janela){
    location.href=janela;
}
</script>            
            <div class="flexslider">
                <?php if(mysql_num_rows($slides) > 0){?>
                <ul class="slides" style="width: 100%">
                    <?php while($slide = mysql_fetch_array($slides)){?>
                    <li> 
                        <a onclick="abrelink('<?=$slide["link"]?>');" style="display: block;" href="<?=$slide["link"]?>" title="<?=$slide["nome"]?>">
                            <img src="thumbs.php?w=770&h=575&imagem=visao/recursos/imagens/<?=$slide["imagem"]?>" alt="<?=$slide["texto"]?>">
                            <div id="marca" style="width: 940px;"><img src="thumbs.php?w=70&h=40&imagem=visao/recursos/imagens/logo.jpg" alt="logo"/></div>
                        </a>
                    </li>
                    <?php }?>
                </ul>
                <?php }else{
                    echo("Nenhum slide show cadastrado");
                }
                ?>
            </div>