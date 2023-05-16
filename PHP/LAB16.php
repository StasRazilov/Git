<?php
declare(strict_types=1);
/////////////   <!-- Stas Razilov  -->    //////////////////

	//////////////////////////////////////////
	//  Checks if we entered two parameters
    if (isset($_GET['number1']) && isset($_GET['number2']))
	{
		 //////////////////////////////////////////
	     // Checks if both parameters are numbers
		 // Prints a message accordingly
		 if (is_numeric($_GET['number1']) && is_numeric($_GET['number2']))
		 {
			$number1 = $_GET['number1'];
            $number2 = $_GET['number2'];
	
	        echo "<br><br><br>";
            echo "$number1 * $number2 = ".($number1 * $number2);
		 }
		 else if(is_numeric($_GET['number1'])) 
	     {
		    echo "number2 is not number<br>Goodbye!";
	     } 
	      else if(is_numeric($_GET['number2'])) 
	     {
	    	echo "number1 is not number<br>Goodbye!";
	     }
		 else
		 {
			echo "number1 and number2 is not numbers<br>Goodbye!"; 
		 }
	}
	////////////////////////////////////////////////////////////
	// Checks which of the parameters has not been entered and notifies accordingly
	// Prints a message accordingly
	else if(isset($_GET['number1']))
	{
		echo "number2 are not set<br>Goodbye!";
	}
	else if(isset($_GET['number2']))
	{
		
		echo "number1 are not set<br>Goodbye!";
	}
	else
	{
		echo "number1 and number2 are not set<br>Goodbye!";
	}
	
	 
?>


