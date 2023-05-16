<html>
<body>
<p>you entered: </p>
   <?php
    	$username=$_GET['name'];
		$password=$_GET['pword'];
		$email=$_GET['email'];
		$VPword=$_GET['VPword'];
		
		
		if($email!=$VPword)
		{
			echo "error password";
		}
		else
		{
		   foreach($_GET as $value)
	       {
			  echo "<p>value= ".$value."</p><br>";
		   }
		}
	?>
</body>
</html>
