<?php
include '../conexao.php';
include '../class/Produto.class.php';
	$nome=$_POST['nome'];
	$valor=$_POST['valor'];
	$categoria=$_POST['categoria'];
	$quantidade=$_POST['quantidade'];
	$descricao=$_POST['descricao'];
	$produto= new Produto(null,$nome,$valor,$descricao,$quantidade,$categoria);
	$produto->InserirProduto($mysqli);


?>