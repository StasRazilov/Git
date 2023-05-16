<?php
require_once "PointCalss.php";


$p1=new PointCalss;
$p2=new PointCalss;

$p1->x=3;
$p1->y=6;

$p2->x=1;
$p2->y=4;

$p1->add($p2);
echo $p1->x." ".$p1->y;
 
	
	
?>





