<?php
# author : Rafael Clares 
# Inclui a classe thumbnail
include_once('thumbnail.inc.php');
# Cria nova thumb da imagem recebida por get
$thumb = new Thumbnail($_GET['img']);
# Seta o tamanho da thumb
$thumb->resize(120,120);
# Exibe a imagem
$thumb->show();
exit;
?>