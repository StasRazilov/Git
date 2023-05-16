<?php

if($_POST)
{
	echo '<pre>';
	echo (print_r($_POST,true));
	echo '</pre>';
}
?>

<form action="" method="post">
name: <input type="text" name="persona[name]"/><br/>
email: <input type="text" name="persona[email]"/><br/>
inpurt beer: <br/>

<h4>ch1</h4>
<input type=checkbox name=arr[] value=ch1>
<h4>ch2</h4>
<input type=checkbox name=arr[] value=ch2>
<h4>some string</h4>
<input type=checkbox name=arr[] value="some string">
<br>
<textarea   name=arr[]>some string</textarea>
<input type="submit" value="some string"/>

</form>


