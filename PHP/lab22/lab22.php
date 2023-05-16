<!-- Stas  Razilov  -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<form action =""  method = 'post'> 
		first file: <input type = 'text' name = 'firstTextName' required> <!--first file name input to go to index firstTextName-->
		second file: <input type = 'text' name = 'secondTextName' required> <!--second file name input go to index secondTextName-->
		<input type = "submit" value = "Submit">  
	</form>
<?php
        //function to read from file
		function readInputFile($fo,&$arr)
		{
			$line=file_get_contents($fo); //reading text from file 
			$arr=explode(" ",$line); //put in array, splited by spaces
		}

		function myPrint_r($arr)
		{
			    //print array
				foreach($arr as $k => $v) 
				{
					echo $v."<br>";
				}
		}
		///////////////////////////////////////
        //"cover" antill som input is enterd
	    if(isset($_POST['firstTextName']) && isset($_POST['secondTextName']))
		{  
			$f1 = $_POST['firstTextName']; // string inputed from first box
			$f2 = $_POST['secondTextName']; // string input from second box
			//////////////////////////////////////////////
			//check if input is correct 
		 	if ((!strcmp($f1,"a1.txt") || !strcmp($f1,"a2.txt"))&&(!strcmp($f2,"a1.txt") || !strcmp($f2,"a2.txt")))
			{
			 	readInputFile($f1,$fileOne); //writing first text to first array
			 	readInputFile($f2,$fileTwo); //writing second text to second array	 
			 	$dif=array_unique( array_diff($fileOne,$fileTwo)); //making array with the values than in file one and not in two
			 	echo "<br>Words that appear in the first file and do not appear in the second file:<br>";
			 	myPrint_r($dif); 
				//making array with all the values that have at least two appirances in bowth files
				$aboveTwo = array_intersect(array_diff_assoc($fileOne ,array_unique($fileOne)),array_diff_assoc($fileTwo ,array_unique($fileTwo)));
				echo "<br>Words that appear in two files more than once:<br>";
				myPrint_r($aboveTwo); 
	        }  
			else //no such files
			{
				echo "<br>No files found<br>";
			} 
	   } //end if
?>
</body>
</html>
