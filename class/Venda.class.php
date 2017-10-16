<?php
include 'Cliente.class.php';
Class Venda Extends Cliente {
	Private $idvenda;
	Private $idCliente;
	Private $statusVenda;
	Private $dataVenda;
	Private $dataEntrega;
	private $total;
	private $codcli;
	public function __construct($_id=null,$_idCliente=null,$_statusVenda=null,$_dataVenda=null,$_dataEntrega=null,$_total=null,$cod=null){
			parent::__construct($_idCliente=null);
		$this->idvenda=$_id;
		$this->statusVenda=$_statusVenda;
		$this->dataVenda=$_dataVenda;
		$this->dataEntrega=$_dataEntrega;
		$this->total=$_total;
		$this->codcli=$cod;
	}

	public function getIdVenda(){
		return $this->idvenda;
	}
	public function setIdVenda($cod){
		return $this->idvenda=$cod;
	}
	public function getCodCli(){
		return $this->codcli;
	}
	public function setCodCli($cod){
		$this->codcli=$cod;
	}

	public function getStatusVenda(){
		return $this->statusVenda;
	}
	public function setDataVenda($_dataVenda){
		$this->dataVenda= $_dataVenda;
	}
	public function getDataVenda(){
		return $this->dataVenda;
	}
	public function getDataEntrega(){
		return $this->dataEntrega;
	}
	public function setDataEntrega($_dataEntrega){
		$this->dataEntrega = $_dataEntrega;
	}

	public function getTotal(){
		return $this->total;
	}
	public function setTotal($_total){
		$this->total = $_total;
	}
	public function InserirVenda($mysqli){
		$sql="INSERT INTO venda VALUES" ."(null,$this->codcli,'pendente','$this->dataVenda','$this->dataEntrega',$this->total)";
		$mysqli->query($sql);
		echo $sql;
		if($mysqli->affected_rows==1){
			echo"insert";
		}else{
			echo"not";
		}
	}
	public function ConfereVenda($mysqli){
		$sql= "SELECT  CodVenda,StatusVenda,DataVenda,DataEntrega,TotalVenda from venda where CodCliente=$this->codcli";
		$result=$mysqli->query($sql);
		while($linha=$result->fetch_array()){
			$this->idvenda=$linha['CodVenda'];
			$this->statusVenda=$linha['StatusVenda'];
			$this->dataVenda=$linha['DataVenda'];
			$this->dataEntrega=$linha['DataEntrega'];
			$this->total=$linha['TotalVenda'];

		}
	}
	public function ConfereVendas($mysqli){
		$sql= "SELECT  * from venda";
		$result=$mysqli->query($sql);
		while($linha=$result->fetch_array()){
			$this->idvenda=$linha['CodVenda'];
			$this->statusVenda=$linha['StatusVenda'];
			$this->dataVenda=$linha['DataVenda'];
			$this->dataEntrega=$linha['DataEntrega'];
			$this->total=$linha['TotalVenda'];
			$query="SELECT CodProduto from possui where CodVenda=".$linha['CodVenda']."";
			$r=$mysqli->query($sql);
			while($linha2=$r->fetch_array()){
				$this->codcli=$linha2['CodProduto'];
			}
		}
	}
	public function AlteraVenda($mysqli){
		$sql="UPDATE venda set StatusVenda='$this->statusVenda' where CodVenda=$this->idvenda";
		$mysqli->query($sql);
		if($mysqli->affected_rows==1){
			echo"alt";
		}else{
			echo"NOTE";
		}
	}
	public function most(){
		echo "ola";
	}


}
?>