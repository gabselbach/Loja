
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
	<title>Top Game</title>
	
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<script type="text/javascript">
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
	 <div id="lg">
        <?php
			session_start();
        	if(isset($_SESSION['Adm'])){
                $cod=$_SESSION['id'];
                echo" <div id=\"area\"><a href=\"#\" onclick=\"javascript: abremenucliente();\"><p>ola".$_SESSION['Adm']."<img style=\"float:right;\" src=\"../images/seta.png\"/></p></a></div>";
            }

        ?>
                     
    </div>
 <div id="info">
                <ul>
                    <li><a href="../sair.php">Sair</a></li>
                </ul>
            </div>
	<div id="tudo">
		<div id="cabecalho">
			<p>&nbsp</p>
				<ul class="drop_menu">
					<li><a href="#">Cadastro de Produto</a></li>
					<li><a href="listaprodutos.php">Listar Produtos</a>
						
					<li><a href="#">Conferir Vendas</a></li>
                </ul>
			</div>
		<div id="meio" class="mo">
			<div class="cadastra">
				<form action="../controllers/InserirProduto.php" method="POST"><br>
				Nome:<input type="text" name="nome" required="campo vazio" /><br>
				Valor:<input type="text" name="valor"required="campo vazio" /><br>
				Quantidade<input type="text" name="quantidade"required="campo vazio"/><br><br>Descrição:<br>
				<textarea cols="40" rows="8"  name="descricao"required="campo vazio"></textarea><br><br>
				<?php 
					include '../conexao.php';
					require_once '../class/Produto.class.php';

					$p1= new Produto();
					
					$p1->ListaCategoria($mysqli);
						?>
						<br><br>
				<button class="botao " type="submit">Cadastrar</button>
				</form>
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