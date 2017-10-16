<?php
include '../conexao.php';

	
	$nome=$_POST['nome'];
	$email=$_POST['login'];
	$curso=$_POST['curso'];
	$matricula=$_POST['matricula'];
	$instituicao=$_POST['instituicao'];
	
 			$query= "INSERT INTO inscricao Values" . "(NULL,'$nome','$email','$curso','$matricula','$instituicao')";
		$mysqli->query($query);
		echo $sql;
		if($mysqli->affected_rows==1){
			//return true;
		}else{
			//return false;
		}

		//if($pessoa1->InserirCliente($mysqli)){
			//echo "Cadastro realizado com sucesso";
		
			//echo "Infelizmente não foi possivel fazer o cadastro";
		
	
		//echo "email ou cpf já cadastrados";
	
?>