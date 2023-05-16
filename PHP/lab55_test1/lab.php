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
beer: <br/>

<select multiple name="beer[]">
<option value="warthog">warthog</option>
<option value="guinness">guinness</option>
<option value="stuttgarter">stuttgarter</option>
</select><br/>
<input type="submit" name="send!"/>

</form>


