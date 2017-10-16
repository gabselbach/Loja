<?php
session_start();
include '../conexao.php';
include '../class/Cliente.class.php';
$email=$_POST['login'];
$senha=md5($_POST['senha']);
$query = "SELECT CodCliente,Nome FROM cliente WHERE Login='$email' and Senha='$senha' and Tipo=2";
			$mysqli->query($query);
		 if($mysqli->affected_rows==1){
		 	$resultado=$mysqli->query($query);
			while($linha=$resultado->fetch_array()){
			$_SESSION['id']=$linha['CodCliente'];
			$_SESSION['Adm']=$linha['Nome'];
				echo 0;
			}
		}else{
			echo "Login ou Senha incorretos";
		}

?>