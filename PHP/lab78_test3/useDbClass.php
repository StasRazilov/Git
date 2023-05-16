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
 
echo "========================================================<br>";
echo "========================================================<br><br>";
$n1=$db->getCityByID(7);
echo $n1."<br>";
 

echo "========================================================<br>";
echo "========================================================<br><br>";

$n2=$db->getByName('Jerusalem');
echo $n2."<br>";



echo "<br><br><br><br><br><br><br><br><br>";
echo "<br><br><br><br><br><br><br><br><br>";
echo "<br><br><br><br><br><br><br><br><br>";

 

$db=null;
  
 
?>


	