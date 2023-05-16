<!DOCTYPE html>
<html lang="he">
<head>
<meta charset="utf-8">
<title>דף עברית</title>
</head>
<body>

<?php 

session_start();

$_SESSION['name']="value";
$arr=array("first","second","third");
$_SESSION['arr']=$arr;

echo "<a href='other.php'>דף נוסף</a>";

?>
</body>
</html>
 