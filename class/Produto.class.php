<?php
include 'Venda.class.php';
Class Produto Extends Venda {
	Private $id; 
	Private $nome;
	Private $valor;
	Private $quantidade;
	Private $categoria;
	Private $descricao;
	Private $quantidadeComprada;
	Private $idVenda;
	Private $idPossui;
	private $foto;
	private $idImagem;

	public function __construct($_id=null,$_nome=null,$_valor=null,$_descricao=null,$qt=null,$_categoria=null){
		$this->id=$_id;
		$this->nome=$_nome;
		$this->valor=$_valor;
		$this->descricao=$_descricao;
		$this->quantidade=$qt;
		$this->categoria=$_categoria;
	}
	public function getId(){
		return $this->id;
	}
	public function setID($_id){
		$this->id = $_id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($_nome){
		$this->nome = $_nome;
	}
	public function setIdVenda($cod){
		return $this->idVenda=$cod;
	}
	public function getIdVenda(){
		return $this->idVenda;
	}
	
	public function getvalor(){
		return $this->valor;
	}
	public function setValor($_valor){
		$this->valor = $_valor;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($_descricao){
		$this->descricao = $_descricao;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	public function setQuantidade($_qt){
		$this->quantidade = $_qt;
	}

	public function getCategoria(){
		return $this->categoria;
	}
	public function setCategoria($_categoria){
		$this->categoria = $_categoria;
	}

	public function getQuantidadeComprada(){
		return $this->quantidadeComprada;
	}
	public function setQuantidadeComprada($_quantidadeComprada){
		$this->quantidadeComprada = $_quantidadeComprada;
	}

	public function getIdPossui(){
		return $this->idPossui;
	}
	public function getFoto(){
		return $this->foto;
	}
	public function setFoto($_foto){
		$this->foto=$_foto;
	}
	public function getidImagem(){
		return $this->idimagem;
	}
	public function setidImagem($_idimagem){
		$this->idimagem=$_idimagem;
	}

	public function InserirProduto($mysqli){
		$sql="INSERT INTO produto Values" . "(null,' $this->nome',$this->valor,'$this->descricao',$this->categoria,$this->quantidade,1)";
		echo $sql;
		$mysqli->query($sql);
		if($mysqli->affected_rows==1){
			echo "produto cadastrado";
			header('location:../adm/cadastroproduto.php');
		}else{
			echo "nao cadastrado";
		}
	}
	public function AlterarProduto($mysqli){
		$sql="UPDATE produto set " . "Nome=' $this->nome ','Valor='$this->valor',Quantidade='$this->quantidade',CodCategoria='$this->categoria'" . "where CodProduto=$this->id";
		$mysqli->query($sql);
		if($mysqli->affected_rows==1){
			echo "alterado";
		}else{
			echo "não alterado";
		}
	}
	public function GetProduto($mysqli){
		$query="SELECT * from produto Where CodProduto=$this->id";
		$resultado=$mysqli->query($query);
		while($linha=$resultado->fetch_array()){
		$this->nome=$linha['Nome'];
		$this->valor=$linha['Valor'];
		$this->categoria=$linha['CodCategoria'];
		$this->quantidade=$linha['Quantidade'];
		$this->descricao=$linha['Descricao'];
	}
		
	}

	public function ListaProdutos($mysqli,$pala){
		$sql="SELECT p.CodProduto,p.Nome,p.Valor,f.Img from produto as p inner join categorias as c on (p.CodCategoria=c.CodCategorias) INNER JOIN fotos as f
		on (p.CodProduto=f.CodProduto) where c.nome='$pala' and p.condicao=1";
		$resultado = $mysqli->query($sql);
		
		while($linha= $resultado->fetch_array()){
			echo " <div class=\"flutua\"><a href=\"produto.php?cod=" . $linha['CodProduto'] . "\"><img src=\"foto/".$linha['Img'] . "\" width=\"250\" height=\"250\"/><br><div class=\"nome\">" . $linha['Nome'] . "</div><br><div class=\"preco\">
		R$".$linha['Valor']."</div><br></a></div>"; 
		}
	}
	public function ListaP($mysqli){
		$query= "SELECT * from produto where condicao=1";
		$resultado = $mysqli->query($query);
		
		while($linha = $resultado->fetch_array()){
		echo "<tr><td>" . $linha['Nome'] . "</td><td><a href=\"alteraproduto.php?cod=" . $linha['CodProduto'] . "\"><img src=\"../images/altera.png\"/></a></td>
		<td><a href=\"adicionafotoproduto.php?cod=" . $linha['CodProduto'] . "\"><img src=\"../images/foto.png\"/></a></td><td><a href=\"../controllers/DeletarProduto.php?cod=" . $linha['CodProduto'] . "\"><img src=\"../images/lixeira.png\"/></a></td>
			
		</tr>";
		}
	} 
	public function ListaPromo($mysqli){
		$query= "SELECT p.Nome,p.Valor,f.Img from produto as p INNER JOIN fotos as f
		on (p.CodProduto=f.CodProduto)  where p.CodProduto=$this->id";
		$resultado = $mysqli->query($query);
		while($linha = $resultado->fetch_array()){
		echo"<td><a href=\"produto.php?cod=" . $this->id . "\"><img src=\"foto/".$linha['Img'] . 
		"\" width=\"250\" height=\"250\"/><br><div class=\"nome\">" . $linha['Nome'] . "</div><br>
		<div class=\"preco\">R$".$linha['Valor']."</div></a></td>";

		}
	}
	public function InserirPossui($mysqli){
	    $sql= "INSERT INTO possui VALUES" . "(null,$this->idVenda,$this->id,'$this->quantidadeComprada')";
	    $mysqli->query($sql);
	    echo "<br>". $sql;
	    if($mysqli->affected_rows==1){
	    	echo"inse";
	    }else{
	    	echo"not";
	    }


	}
	public function ListaPossui($mysqli){
		$sql="SELECT CodProduto from possui where CodVenda=$this->idVenda";
		$result=$mysqli->query($sql);
  	$linha=$result->fetch_array();
		$this->id=$linha['CodProduto'];
	}
	public function ListaCategoria($mysqli){
		$sql="SELECT * from categorias";
		$resultado= $mysqli->query($sql);
		echo "Categoria:<SELECT name=categoria>";
    	while ($linha = $resultado->fetch_array())
    {
       echo "<OPTION VALUE=\"" . $linha['CodCategorias'] . "\"> " . $linha['Nome'] . "  </OPTION>";
    }	
	echo "</SELECT><br>";
  }
  public function AddFoto($mysqli,$foto){
  	if (!empty($foto["name"])) {
      $largura = 7000; // Largura máxima em pixels
      $altura = 9000; // Altura máxima em pixels
      $tamanho = 5000000; // Tamanho máximo do arquivo em bytes
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/(jpeg|png|gif|bmp)/", $foto["type"])){
       $error[] = "Isso não é uma imagem.";
    } 
    $dimensoes = getimagesize($foto["tmp_name"]); // Pega as dimensões da imagem
    // Verifica se a largura da imagem é maior que a largura permitida
    if($dimensoes[0] > $largura) {
      $error[] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    }
    // Verifica se a altura da imagem é maior que a altura permitida
    if($dimensoes[1] > $altura) {
      $error[] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    }
    // Verifica se o tamanho da imagem é maior que o tamanho permitido
    if($foto["size"] > $tamanho) {
      $error[] = "A imagem deve ter no máximo ".$tamanho." bytes";
    }
    // Se não houver nenhum erro
    if (empty($error)) {
    // Pega extensão da imagem
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    // Gera um nome único para a imagem
      $nome_imagem =$foto["name"];
    // Caminho de onde ficará a imagem
      $caminho_imagem = "../foto/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    
    }
    $query= "INSERT into fotos Values" . "(NULL,'$nome_imagem','$this->id')";
		$result = $mysqli->query($query);
		echo $query;
		if($mysqli->affected_rows==1){
			echo "produto cadastrado";
			
		}else{
			echo "nao cadastrado";
		}
    // Se houver mensagens de erro, exibe-as
    if (!empty($error)){
      foreach ($error as $erro){
       echo $erro . "<br/>";
      }
    }
    }    
  }
  public function ColocaFoto($mysqli){
  	$sql="SELECT f.Img from fotos as f inner join produto as p on (f.CodProduto=p.CodProduto)
  	where f.CodProduto=$this->id ";
  	$result=$mysqli->query($sql);
  	$linha=$result->fetch_array();
  	echo "<img class=\"pp\"width=\"300\" height=\"300\"align=\"left\" src=\"foto/". $linha['Img']."\"/>";
  }
  
  public function DeletaProduto($mysqli){
		$query="UPDATE produto set condicao=2 where CodProduto=$this->id";
		$mysqli->query($query);
		if($mysqli->affected_rows==1){
			echo "string";
		}else{
			echo "nao";
		}
	}
	 public function ColocaNovaFoto($mysqli){
  	$sql="SELECT f.Img from fotos as f inner join produto as p on (f.CodProduto=p.CodProduto)
  	where f.CodProduto=$this->id ";
  	$result=$mysqli->query($sql);
  	$linha=$result->fetch_array();
  	echo "<img src=\"foto/". $linha['Img']."\"/>";
  }
}
?>