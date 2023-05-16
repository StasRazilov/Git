<?php
require_once("dbClass.php");
 
 
 function print_array($arr)
 {
	 echo "<pre>";
	 print_r($arr);
	 echo "</pre>";
 }
 
$db=new dbClass();
$arr=$db->getCities();
print_array($arr);
$db=null;
  
 
?>


	