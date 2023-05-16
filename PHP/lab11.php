<?php  
declare(strict_types=1); 
// stas razilov and nickolay
 
 
 /*
 function receives three sides and checks that the sum of each two sides
 is greater than a third
 If so, the three sides are summed if no returns 0
 */
function triangleVertices(int $a,int $b,int $c) 
{
	if(($a+$b)>=$c||($a+$c)>=$b||($c+$b)>=$a) 
	{
		return $a+$c+$b;
	}
	else
	{
		return 0;
	}
}
 
$cope=triangleVertices(2,1,2);
if($cope>0)
{
	echo "triangle perimeter $cope";
}
else
{
	echo "Error. A third rib must be greater than or equal to the previous two ribs";
}
 
?>
 
 
 
 
 
 
 
 
 
 
 