<?php

if(strlen($_POST['client_name'])>0)
{
	$name=$_POST['client_name'];
}
else
{
	$name="unnamed";
}
$result="hello $name! welcome to our site!";

?>

<html>
<head>
<title>First page</title>
</head>

<body>
<p>
    <?php
    	print $result;
	?>
</p>

</body>

</html>

