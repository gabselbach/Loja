<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
include 'conexao.php';
include 'class/Cliente.class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/labc.png" /> 
    <title>Top Game</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/minhaconta.css">
         <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/basico.js"></script>
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

            <div id="conteudo" >
                <?php

                    if(isset($_SESSION['id'])){
                        $id=$_SESSION['id'];
                        $cliente=new Cliente($id);
                        $cliente->GetCliente($mysqli);
                        $nome=$cliente->getNome();
                        $sobrenome=$cliente->getSobrenome();
                        $endereco=$cliente->getEndereco();
                        $numero=$cliente->getNumero();
                        $telefone=$cliente->getTelefone();
                        $cidade=$cliente->getCidade();
                    }
                    
                    ?>
                
                    <form action="" method="POST" id="formulario">
                    <br>
                        <label for="nome">Nome</label><label style="margin-left: 120px;" for="Sobrenome">Sobrenome</label><br>
                        <input type="text" name="nome" value="<?php echo $nome;?>" required="required"/>
                        <input type="text" value="<?php echo $sobrenome;?>" name="sobrenome" required="required"/><br>
                        <label for="telefone">Telefone</label><br>
                        <input type="text" value="<?php echo $telefone;?>"  name="telefone"  required="required"/><br>
                        <label for="endereco">Endereco</label><label style="margin-left:100px;" for="Numero">Numero</label><br>
                        <input type="text" value="<?php echo $endereco;?>" name="endereco"  required="required"/>
                        <input type="text" name="num"value="<?php echo $numero;?>"  required="required"/><br>
                        <label for="cidade">Cidade</label><br>
                        <input type="text"value="<?php echo $cidade;?>" name="cidade"  required="required"/><br>
                          <input type="hidden"value="<?php echo $id;?>" name="id"/>
                        <div class="saida"></div><br><br><br>
                        <input class="botao" type="submit" name="cadastrar" value="Salvar Alterações" /><br>

                    </form>

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