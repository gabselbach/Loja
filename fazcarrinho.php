<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include 'conexao.php';
 require 'class/Produto.class.php';
if(!empty($_GET['cod'])){
	$cod= $_GET['cod'];
	$i=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
    <title>Top Game</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/fazcarrinho.css">
    <script src="js/jquery.js"></script>
        <script src="js/cookie.js"></script>
    <script src="js/basico.js"></script>


    <script>
    function abremenu(){
        var mostradiv = document.getElementById('login');
            if(mostradiv.style.display == 'none'){      
                mostradiv.style.display = 'block';
            }else{
                mostradiv.style.display = 'none';
            }
    }
    function abremenucliente(){
        var mostradiv = document.getElementById('info');
            if(mostradiv.style.display == 'none'){      
                mostradiv.style.display = 'block';
            }else{
                mostradiv.style.display = 'none';
            }
    }
    </script>
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
                            <li><a href="cardgame.php">Card Games</a></li>
                            <li><a href="tabuleiro.php">Jogos de Tabuleiro</a></li>
                        </ul>
                        </li>
                     <li><a href="livros.php">Livros</a></li>
                    <li><a href="miniatura.php">Miniaturas</a></li>
                    <li><a href="acessorios.php">Acessorios</a></li>
                    </div>
                </ul>
			</div>
		<div id="meio" class="mo">
			<br><h1 class="titulo">Meu Carrinho</h1><br>
            <div id="vt">
                <div id="carrinho">
                    <table>
                    <tr>
                    <form action="controllers/cadastravenda.php" method="POST">
                    <?php

                        $p=new Produto($cod);
                        $p->GetProduto($mysqli);
                        $qt=$p->getQuantidade();

                        echo  "<td>". $p->ColocaFoto($mysqli). "<div class=\"n\">".$p->getNome()."</div>
                       <td> <div class=\"quant\">
                        	<button class=\"but\" type=\"button\">+</button>
                         	<button class=\"buti \"type=\"button\">-</button>
                         	<input type=\"hidden\" name=\"codigo\" value=\"". $cod . "\"/>
                        	<input id=\"qt\"type=\"text\" name=\"quant\" value=\"1\"/>
                            <input type=\"hidden\" name=\"qtescolhida\" id=\"qtescolhida\"/>
                              <input id=\"tot\"type=\"hidden\" name=\"total\"/>
                        </div></td><td>
                        <div class=\"valor\">
                        	R$" . $p->getValor() . "
                       	</div> 

    					</td>
    					<td><div id=\"total\">

    						<input id=\"inicio\" name=\"valor\"type=\"hidden\" value=\"". $p->getValor()."\"/>". $p->getValor()."
    					</div></td>
    					</tr></table>
                       <button class=\"botao fz\" type=\"submit\"
                         >Comprar</button>";
                    ?>
                    </form>
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