<?php
require_once("City.php");

class dbClass
{
 
 	private $host;
	private $db;
	private $charset;
 	private $user;
	private $pass;
	
	private  $opt=array(
	           PDO::ATTR_ERRMODE   =>PDO::ERRMODE_EXCEPTION,
		       PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
 
  
    private $connection;

	public function __construct(string $host="localhost",string $db="students",string $charset="utf8",string $user="root",string $pass="")
	{
		$this->host=$host;
		$this->db=$db;
		$this->charset=$charset;
		$this->user=$user;
		$this->pass=$pass;
	}
	 
	private function connect()
	{
		$dns="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$this->connection=new PDO($dns,$this->user,$this->pass,$this->opt);
    }
	
	public function disconnect()
	{
		$this->connection=null;
	}
	
	
	public function getCities()
	{
		$this->connect();
		$citiesArray=array();
		$result=$this->connection->query("SELECT * FROM city");
		
		
		while($row=$result->fetchObject('City'))
		{
			$citiesArray[]=$row;
			echo $row->getCityId().' '.$row->getCityName()."<br>";
		}
		$this->disconnect();
		return $citiesArray; 	
	}
	
	
	
	
	
	
	
	
	public function getCityByID(int $id): string
	{
		$this->connect();
		$statement=$this->connection->prepare("SELECT * FROM city WHERE cotyCode=:id");
		$statement->execute([':id'=>$id]);
		
		$result=$statement->fetchObject('City');
		
		$this->disconnect();
		return $result->getCityName();
		
	}
 
 
 
 
 
 
 
 
 
 
 
 
 
 public function getByName(string $name):string
	{
		$this->connect();
		$statement=$this->connection->prepare("SELECT * FROM city WHERE cityName=:name");
		$statement->execute([':name'=>$name]);
		
		$result=$statement->fetchObject('City');
		
		$this->disconnect();
		return $result->getCityId();
		
	}
}
  
 
?>







	