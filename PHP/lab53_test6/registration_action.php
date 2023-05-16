<html>
<body>
<p>you entered: </p>
   <?php
    	$username=$_GET['name'];
		$password=$_GET['pword'];
		$email=$_GET['email'];
		
		
		echo "<p>username=".$username."</p>";
		echo "<p>email=".$email."</p>";
		echo "<p>password=".$password."</p>";
	?>
</body>
</html>
