<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
include 'conexao.php';
include 'class/Produto.class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
    <title>Top Game</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/meuspedidos.css">
</head>
<body>

	<div id="tudo">
		<div id="cabecalho">
			<p>&nbsp</p>
				<ul class="drop_menu">
                <div id="mexe">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Jogos</a>
                        <ul>
                            <li><a href="cardgame.php">Cartas/Card Game</a></li>
                            <li><a href="tabuleiro.php">Tabuleiro</a></li>
                        </ul>
                        </li>
                        <li><a href="miniatura.php">Miniaturas</a></li>
                    <li><a href="livros.php">Livros</a></li>
                    <li><a href="acessorios.php">Acessorios</a></li>
                    </div>
                  
                </ul>
			</div>
           
		<div id="meio" class="mo">
            
            <div id="minhaarea">
                <ul>
                    <li><a href="meuspedidos.php">Meus Pedidos</a></li>
                    <li><a href="minhaconta.php">Minha Conta</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>

            <div id="conteudo">
                <h1>Seus Pedidos</h1>
                <table >
                    <tr>
                <?php

                    if(isset($_SESSION['id'])){
                        $venda=new Venda();
                        $venda->setCodCli($_SESSION['id']);
                        $venda->ConfereVenda($mysqli);
                        $codvenda=$venda->getIdVenda();
                        $produto=new Produto();
                        $produto->setIdVenda($codvenda);
                        $produto->ListaPossui($mysqli);
                        $produto->GetProduto($mysqli);
                        $datacompra=$venda->getDataVenda();
                        $dataentrega=$venda->getDataEntrega();   
                        $datacompra=date('d/m/Y', strtotime($datacompra));
                        $dataentrega=date('d/m/Y', strtotime($dataentrega));
                        echo "<th></th>";
                         echo "<th>Data de Compra</th><th>Data de Entrega</th><th>
                         Valor Total</th></tr><tr>";

                        echo "<td><div id=\"foto\">";
                            $produto->ColocaNovaFoto($mysqli);
                        echo "</div></td>
                        <td>".$datacompra."</td><td>". $dataentrega."</td>
                        <td>R$:".$venda->getTotal()."";
                       
                    }
                    
                    ?>
                    <tr>
                </table>
                <div id="aviso">
                    <p>O produto pode ser retirado em nossa loja ou oferecemos entrega no prazo estipulado por valor unico de R$:10.00</p><br>
                    <p> Endereço na loja: <i>Rua Gonçalves Chaves 856- Pelotas-Rio Grande do Sul</i></p>
                </div>
            </div>
		</div>
		<div id="rodape">
		<p>&nbsp </p>
		<p>&nbsp</p>
		<p>&nbsp</p>
		<p id="cop">Copyright © 2016 - Top Game </p>
		</div>
	</div>
</body>
</html>