<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					<li><a href="cadastroproduto.php">Cadastro de Produto</a></li>
					<li><a href="listraprodutos.php">Listar Produtos</a>
						
					<li><a href="#">Conferir Vendas</a></li>
				
                </ul>
			</div>
		<div id="meio" class="mo">
			<div id="texto">
				<p>Toda a parte de edição dos produtos,exclução dos mesmos é feito nessa pagina, por este motivo tenha muito cuidado com o que é feito nessa parte. Os produtos por conter dados de venda não são excluidos e sim desativados de porem serem vendidos, mas não são excluidos da base de dados</p>
			</div>
			<div class="tabela">
				<table border='3'>
		        	<?php
		                include '../conexao.php';
		                include '../class/Produto.class.php';
		                $produto= new Produto();
		                $produto->ListaP($mysqli);
		            ?>
		        </table>
		    </div>
		</div>
		<div id="rodape">
		<p>&nbsp </p>
		<p>&nbsp</p>
		<p>&nbsp</p>
		<p id="cop">Copyright © 2016 - Top Game</p>
		</div>
	</div>
</body>
</html>