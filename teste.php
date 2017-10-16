<?php
include 'conexao.php';
 require 'class/Produto.class.php';
if(!empty($_GET['cod'])){
	$pd=new array();
	$cod= $_GET['cod'];
	$i=0;
	if(!isset($_COOKIE['produtos'])){
		$p=new Produto($cod);
         $p->GetProduto($mysqli);
         $val=$p->getValor();
		$pd= array("$i"=>array("id"=> "$cod","quantidade" =>"1","valor"=>"$val"));
		$v=json_encode($pd);
		setcookie("produtos",$v,time()+18000, "/");
	}else{
		$pd=json_decode($_COOKIE['produtos']);
		foreach ($pd as $k => $value) {
			if($value[$k]["id"]!=$cod){
				array_push($pd,array("id"=>"$cod", "quantidade"=>"1", "valor"=>"$val"));
			}
		}
		$v=json_encode($pd);
		setcookie("produtos",$v,time()+18000, "/");
	}
	if(isset($_SESSION['id'])){
		$cliente= $_SESSION['id'];
		}
}
?>
