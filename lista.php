
	
        <?php
        ini_set('display_errors', true);
error_reporting(E_ALL);
                include 'conexao.php';
               include 'class/Produto.class.php';
               $p=new Produto();
               $p->ListaP($mysqli);
