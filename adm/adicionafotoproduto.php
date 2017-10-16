<?php
if(!empty($_GET['cod'])){
$codigo=$_GET['cod'];
session_start();
	}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
	<title>Top Game</title>
	
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	 <script src="../js/jquery.js"></script>
    <script src="../js/adm.js"></script>
    <script>
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
				<ul class="drop_menu " >
				<div id="mexe">
					<li><a href="cadastroproduto.php">Cadastro de Produto</a></li>
					<li><a href="listaprodutos.php">Listar Produtos</a>
						
					<li><a href="#">Conferir Vendas</a></li>
				</div>
                </ul>
			</div>
		<div id="meio" class="mo">
			<div class="cadastra novo">      
				<form  method="POST" action="../controllers/addfoto.php" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input class="file" type="file" name="arquivo" required="rest" />
					<input type="hidden" name="prod" value="<?php echo $codigo;?>"/><br>
					<input class="botao fotocad" type="submit" name="enviar" value="Enviar" />
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