<?php

session_start();
require 'conexao.php';
require 'class/Cliente.class.php';


	$usuario= new Cliente ($_SESSION['usuario'],null,null,null,null,null,null,null);
	$usuario->GetCliente($mysqli);
	?>
	<form name="alterar" action="altera_infousuario.php" method="POST">
	Nome: <input type="text" name="nome" value=<?php echo $usuario->getNome();?>><br>
	Nome: <input type="text" name="sobrenome" value=<?php echo $usuario->getSobrenome();?>><br>
	Sobrenome:<input type="text" name="sobrenome" value=<?php  echo $usuario->getSobrenome();?>><br>
	Login:<input type="text" name="login"value=<?php echo $usuario->getLogin();?>><br>
	Senha: <input type="text" name="senha" value=<?php echo $usuario->getSenha();?>><br>
	Telefone :<input type="text" name="telefone" value=<?php  echo $usuario->getTelefone();?>><br>
	Cidade :<input type="text" name="cidade" value=<?php  echo $usuario->getCidade();?>><br>
	<input type="submit" name="Enviar" value="Enviar">
	</form>
<?php
if(!empty($_POST["Enviar"])){
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$nascimento=$_POST['telefone'];
$usuario =new Cliente ($_SESSION['usuario'],$nome,$sobrenome,$login,$senha,$telefone,$cidade);
$usuario->AlteraUsuario($mysqli);

}
?>