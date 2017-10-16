<?php
session_start();
include '../conexao.php';
include '../class/Cliente.class.php';
$email=$_POST['l'];
$senha=md5($_POST['s']);
$query = "SELECT CodCliente,Nome from cliente where Login='$email' and Senha='$senha' ";
			$mysqli->query($query);
		 if($mysqli->affected_rows==1){
		 	$resultado=$mysqli->query($query);
			while($linha=$resultado->fetch_array()){
			$_SESSION['id']=$linha['CodCliente'];
			$_SESSION['nome']=$linha['Nome'];
				echo 0;
			}
		}else{
			echo "Login ou Senha incorretos";
		}

?>