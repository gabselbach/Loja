<?php
include '../conexao.php';
include '../class/Cliente.class.php';
	
	$nome=$_POST['nome'];
	$sobrenome=$_POST['sobrenome'];
	$id=$_POST['id'];
	$telefone=$_POST['telefone'];
	$cidade=$_POST['cidade'];
	$endereco=$_POST['endereco'];
	$num=$_POST['num'];
	$pessoa= new Cliente($id);
	$pessoa->setNome($nome);
	$pessoa->setSobrenome($sobrenome);
	$pessoa->setCidade($cidade);
	$pessoa->setNumero($num);
	$pessoa->setTelefone($telefone);
	$pessoa->setEndereco($endereco);
	$pessoa->AlterarCliente($mysqli);
	echo true;

?>