<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5. Continue Exercise from page 34 </title>
    <link rel="stylesheet" href="css/csspage34.css">
 

</head>
<body>
<h1>Hello!</h1>

<?php

$dat=date("d.m.y");
$tm=date("h:i:s");

echo "date $dat year <br>";
echo "time $tm   <br><br>";

for($i=1;$i<=5;$i++)
{
	echo "<li>quadrate $i=".($i*$i);
	echo "<li>cube $i=".($i*$i*$i)."<br><br>";	
}

?>
</body>



</body>
</html>


