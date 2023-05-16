<?php
declare(strict_types=1);
/////////////   <!-- Stas Razilov  -->   //////////////////

	/////////////////////////
	// An array of names
	$ArrNames = array('aaa','bbb','ccc','ddd');
	
	/////////////////////////////////////
	// A function that enters the name
    // received by UML and looks for 
	// it in the global array
   function FindName() 
   {
	   global $ArrNames;  // Global array
	   $name=$_GET['name']; //  Inserts the name obtained in UML
       print "The name you entered in UML:  ".$name."<br><br>";
	   
	   ////////////////////////////////////
	   // A global search loop
       // And prints a message accordingly   
		for($i=0;$i<count($ArrNames);$i++)
			if($ArrNames[$i]==$name)
				{
				  print "The name found is in the index: ".$i."<br><br>";
				  return;
				}
		print "The name was not found<br><br>";	//if not found
   }
   FindName();
 
 
echo "<pre>";
print_r ($ArrNames);
echo "<pre>";

	 
?>



