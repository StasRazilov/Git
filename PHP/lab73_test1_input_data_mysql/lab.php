
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

	$affectedRows=$connection->exec("INSERT INTO city VALUES (null,'חיפה')");
	echo $affectedRows."     kkkk";
 $connection=null;
   
?>


	