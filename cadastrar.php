
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="icon" type="image/png" href="images/labc.png" /> 
    <title>Top Game</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
       <script src="js/jquery.js"></script>

    <script src="js/cadastrar.js"></script>


    
    <script>
    function abremenu(){
        var mostradiv = document.getElementById('login');
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
        <div id="btn">
            <a href="#" onclick=" abremenu();">
            <img class="entr" src="images/entrar.png"/>
            <p>Entrar</p>
            </a>
       </div>
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
                    <li><a href="livros.php">Livros</a></li>
                    <li><a href="acessorios.php">Acessorios</a></li>

                </ul>
			</div>

		<div id="meio" class="mo baixa">
               <div id="cadastro">
                    <form action="" method="POST" id="formu">
                    <br>
                        <label for="nome">Nome</label><label style="margin-left: 180px;" for="Sobrenome">Sobrenome</label><br>
                        <input type="text" name="nome"  required="required"/>
                        <input type="text" name="sobrenome" required="required"/><br>
                        <label for="email">Email</label><label style="margin-left: 180px;" for="Senha">Senha</label><br>
                        <input type="email" name="login"  required="required"/>
                        <input type="password" name="senha"  required="required"/><br>
                        <label for="telefone">Telefone</label><br>
                        <input type="text" name="telefone"  required="required"/><br>
                        <label for="endereco">Endereco</label><label style="margin-left:150px;" for="Numero">Numero</label><br>
                        <input type="text" name="endereco"  required="required"/>
                        <input type="text" name="num"  required="required"/><br>
                        <label for="cidade">Cidade</label><br>
                        <input type="text" name="cidade"  required="required"/><br>
                        <label for="cpf">CPF</label><br>
                        <input type="text" name="cpf"  required="required"/><br><br><br><br>
                        <div class="saida"></div>
                        <input type="submit" name="cadastrar" value="Cadastrar" /><br>
                        <br><br>
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