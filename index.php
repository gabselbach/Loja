
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
      <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/basico.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
   <script type="text/javascript">
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 835);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
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

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('img/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
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
                    <li><a href="meuspedidos.php">Meus Pedidos</a></li>
                    <li><a href="minhaconta.php">Minha Conta</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>
	<div id="tudo">
		<div id="cabecalho">
        <p> &nbsp</p>
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
                     <li><a href="miniatura.php">Miniaturas</a></li>
					<li><a href="acessorios.php">Acessorios</a></li>
                    </div>
                </ul>
                </div>
		<div id="meio">
        <div id="galeria">
         <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 835px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('imgages/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>Assita
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 840px; height: 300px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <a href="https://www.chess.com/livechess"  target="_blank"><img data-u="image" src="images/xadrez.jpg" /></a>
            </div>
            <div data-p="112.50" style="display: none;">
               <a href="https://www.pokerstars.com/br/"  target="_blank">  <img data-u="image" src="images/poker.jpg" /></a>
            </div>
            <div data-p="112.50" style="display: none;">
               <a href="https://www.google.com.br/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&sqi=2&ved=0ahUKEwjrhIiNztjNAhVBPJAKHRWXA_wQ3ywIIjAA&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DDqvz8w-latE&usg=AFQjCNF2ez6iXFh3x3GFMUfhk2XOrSrIaQ&bvm=bv.126130881,d.Y2I"  target="_blank">   <img data-u="image" src="images/war.jpg" /></a>
            </div>
            <a data-u="ad" href="http://www.jssor.com" style="display:none">Bootstrap Slider</a>
        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
        </div>
    </div>
<div id="destaques">
<h1>Destaques:</h1><br>
<table><tr><tr></tr>
<?php
include 'class/Produto.class.php';
$cod=6;
$p= new Produto($cod);
$p->ListaPromo($mysqli);
$p->setId(7);
$p->ListaPromo($mysqli);
?>
</tr>
</table>  
<br>

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
<!--<p><i>Imagens</i>:Google Imagens</p><br>
     <p><i>Slide</i>:<a href="http://www.jssor.com/demos/simple-fade-slideshow.slider">Jssor</a></p><br>-->