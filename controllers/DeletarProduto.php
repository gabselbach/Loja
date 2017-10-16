<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../conexao.php';
include '../class/Produto.class.php';
if(!empty($_GET['cod'])){
	$cod=$_GET['cod'];
	$p=new Produto($cod);
	$p->DeletaProduto($mysqli);
	
	header('location:../adm/listaprodutos.php');
}
?>