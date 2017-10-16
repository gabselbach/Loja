<?php
Class Cliente {
	Private $id;
	Private $nome;
	Private $sobrenome;
	Private $login;
	Private $senha;
	Private $telefone;
	private $endereco;
	private $numero;
	private $cidade;
	private $cpf;

	public function __construct($_id=null,$_nome=null,$_sobrenome=null,$_login=null,$_senha=null,$_telefone=null,$_endereco=null,$_num=null,$_cidade=null,$_cpf=null){
		$this->id=$_id;
		$this->nome=$_nome;
		$this->sobrenome=$_sobrenome;
		$this->login=$_login;
		$this->senha=$_senha;
		$this->telefone=$_telefone;
		$this->endereco=$_endereco;
		$this->numero=$_num;
		$this->cidade=$_cidade;
		$this->cpf=$_cpf;
	}

	public function getIdCliente(){
		return $this->id;
	}
	public function setIdCliente($_id){
		$this->id = $_id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($_nome){
		$this->nome = $_nome;
	}

	public function getSobrenome(){
		return $this->sobrenome;
	}
	public function setSobrenome($_sobrenome){
		$this->sobrenome = $_sobrenome;
	}
	

	public function getLogin(){
		return $this->login;
	}
	public function setLogin($_login){
		$this->login= $_login;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($_senha){
		$this->senha = $_senha;
	}

	public function getTelefone(){
		return $this->telefone;
	}
	public function setTelefone($_telefone){
		$this->telefone = $_telefone;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function setEndereco($_endereco){
		$this->endereco = $_endereco;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($_numero){
		$this->numero = $_numero;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function setCidade($_cidade){
		$this->cidade = $_cidade;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setCpf($_cpf){
		$this->cpf = $_cpf;
	}

	//FIM DOS GETS E SETS
	public function ConfereCliente($mysqli){
		$query= "SELECT login,cpf FROM cliente where Login LIKE '$usuario' and Cpf=$cpf";	
		$mysqli->query($query);
		if($mysqli->affected_rows>0){
				return "verdadeiro";
			}else{
				return false;
			}
	}
	public function GetCliente($mysqli){
		$query="SELECT * from cliente Where CodCliente=$this->id";
		$resultado=$mysqli->query($query);
		while($linha=$resultado->fetch_array()){
		$this->nome=$linha['Nome'];
		$this->sobrenome=$linha['Sobrenome'];
		$this->endereco=$linha['Endereco'];
		$this->numero=$linha['Numero'];
		$this->telefone=$linha['Telefone'];
		$this->cidade=$linha['Cidade'];
	}
		
	}
	public function InserirCliente($mysqli){
 			$query= "INSERT INTO cliente Values" . "(NULL,'$this->nome','$this->sobrenome','$this->login','$this->senha','$this->endereco',$this->numero,$this->telefone,'$this->cidade',$this->cpf)";
		$mysqli->query($query);
		echo $sql;
		if($mysqli->affected_rows==1){
			//return true;
		}else{
			//return false;
		}

 	}
 	public function AlterarCliente($mysqli){
		$query = "UPDATE cliente set " . "Nome='$this->nome', Sobrenome ='$this->sobrenome', Endereco='$this->endereco', Telefone='$this->telefone', Cidade='$this->cidade'" .  "where CodCliente =$this->id"; 
		$mysqli->query($query);

	}

}
?>