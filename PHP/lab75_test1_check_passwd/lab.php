<?php
$test_password1=password_hash("kuku",PASSWORD_DEFAULT);

$test_password2=password_hash("kuku",PASSWORD_DEFAULT);


echo "<br><br>test_password-'kuku'= ".$test_password1."<br><br>";
echo "<br><br>test_password-'kuku'= ".$test_password2."<br><br>";

if(password_verify("kuku",$test_password))
{
	echo "true";
}
else
{
	echo "flas";
}
  
?>


	