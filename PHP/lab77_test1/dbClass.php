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

	public function __construct(string $host="localhost",string $db="php_databases",string $charset="utf8",string $user="root",string $pass="")
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
		$result=$this->connection->query("SELECT * FROM users_data");
		
		
		while($row=$result->fetchObject('users_data'))
		{
			$citiesArray[]=$row;
			echo $row->getEmail().' '.$row->getUserName()."<br>";
		}
		$this->disconnect();
		return $citiesArray; 	
	}
	
}
  
 
?>







	