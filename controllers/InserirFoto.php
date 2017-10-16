<?php
require_once 'class/Produto.class.php';
	$Foto= new Livro();
	$Foto->mostra_form_foto();

if(!empty($_POST['Enviar'])){
	$idpod=$_POST['idProduto'];
	$Foto= new Produto($idpod);
	$imagem=$_FILES['foto'];
	$Foto->processafoto($imagem,$mysqli);
}
?>