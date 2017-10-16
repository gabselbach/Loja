<?php
include '../conexao.php';
include '../class/Produto.class.php';
$cod=$_POST['prod'];
$foto=$_FILES['arquivo'];
ini_set('display_errors', true);
error_reporting(E_ALL);
$p= new Produto($cod);
$p->AddFoto($mysqli,$foto);
header('location:../adm/listaprodutos.php');
?>