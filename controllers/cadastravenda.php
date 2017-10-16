<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();
include '../conexao.php';
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../class/Produto.class.php';
if(isset($_SESSION['id'])){
	$prod=$_POST['codigo'];
	$cliente=$_SESSION['id'];
	$qt=$_POST['qtescolhida'];
	$valor=$_POST['total'];
	$venda=new Venda();
	$venda->setIdCliente($cliente);
	$venda->setTotal($valor);
	$data = date('Y-m-d');
	$dataentrega=date('Y-m-d', strtotime($data. ' + 5 days'));
	$venda->setDataVenda($data);
	$venda->setDataEntrega($dataentrega);
	$venda->setCodCli($cliente);
	$venda->InserirVenda($mysqli);
	$idvenda=$mysqli->insert_id;
	$produto= new Produto($prod);
	$produto->setQuantidadeComprada($qt);
	$produto->setIdVenda($idvenda);
	$produto->InserirPossui($mysqli);
	header('location:../meuspedidos.php');
}
?>