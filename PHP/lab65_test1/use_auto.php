<?php
 require_once "auto.php";
 
 $auto=new Auto(10,20);
 echo $auto->x;
 echo "<br>";
 echo $auto->y;
 echo "<br>";
 $auto->move(5,15);
 
 

 
?>