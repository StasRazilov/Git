
<?php
 
 	  $host="localhost";
	  $db="students";
	  $charset="utf8";
	  $dns="mysql:host=$host;dbname=$db;charset=$charset";
	  $user="root";
	  $pass="";
	  $opt=array(
	       PDO::ATTR_ERRMODE   =>PDO::ERRMODE_EXCEPTION,
		   PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
 
  
    $connection=new PDO($dns,$user,$pass,$opt);

	$result=$connection->query("SELECT * FROM city");
	echo "<br><br><br><br>";
	while($row=$result->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['cotyCode'].' '.$row['cityName']."<br>";
	}
	 
    $connection=null;
   
?>


	