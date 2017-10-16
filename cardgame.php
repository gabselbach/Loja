<?php
session_start();
include 'conexao.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
    <title>Top Game</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/jquery.js"></script>
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
 <div id="lg">
        <?php
                        if(isset($_SESSION['nome'])){
                            $cod=$_SESSION['id'];
                             echo" <div id=\"area\"><a href=\"#\" onclick=\"javascript: abremenucliente();\"><p>ola".$_SESSION['nome']."<img style=\"float:right;\" src=\"images/seta.png\"/></p></a></div>";
                        }else{


                    ?>
                            <div id="btn"><a href="#" onclick="javascript: abremenu();">
                                <img class="entr" src="images/entrar.png"/>
                                <p>Entrar</p><p>Cadastrar-se</p>
                                </a>
                            </div>
                    <?php
                        }
                    ?>
    </div>
    <div id="login">
            <br>
                 <form action="" method="POST" id="logar">
                    Login:<input type="text" name="l"/>
                    Senha:<input type="text" name="s"/>
                    <button class="botao" type="submit">Entrar</button>
                </form>
                <div class="erro">
                </div>
                <p class="cad">Ainda não tem cadastro?<a class="cadd" href="cadastrar.php">Cadastre-se</a></p> 
            </div>
            <div id="info">
                <ul>
                    <li><a href="sair.php?cod=<?php echo $cod?>">Meus Pedidos</a></li>
                    <li><a href="sair.php?cod=<?php echo $cod?>">Minha Conta</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>
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
            <div id="jogos">
                <?php
                    require 'class/Produto.class.php';

                    $card=new Produto();
                    $palavra="cardgame";
                    $card->ListaProdutos($mysqli,$palavra);
                   echo " <div class=\"clear\"> </div>";
                ?>
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