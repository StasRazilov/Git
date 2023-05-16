<!-- Stas Razilov  -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>

	<form action =""  method = 'post'> <!--building a form to go in post array-->
		Enter Full File Name: <input type = 'text' name = 'firstTextName' required> <!--first file name input to go to index firstTextName-->
		<input type = "submit" value = "click to send"> <!--submit button-->
	</form>
<?php    
        //////////////////////////////////////////////////////////////
        //function to count the amount of times a value is in array
		function timesInArray($val,$arr,$index)
		{  
				$time = 0;
				for($i = 0; $i < sizeof($arr);$i++) //loop to count the amount of times value is in array
				{
					if ($arr[$i][$index] == $val)
					{
						$time++;
					} 
				} 
				return $time;
		}
        ////////////////////////////////////////
		//a function to write in to file
		function wrightToFile($arr,$index)
		{  
			$wtFile = fopen("new_a1.txt","a"); //open file to add a line, if file not exist-> it will be created
			// if resalt file opend
			if($wtFile != false)
			{  
                $str = implode(":",$arr[$index]); //conect to a string 
                $str.="\r\n";
				fwrite($wtFile,$str); //wright string in to file
			}
			fclose($wtFile);
		}
		
        ///////////////////////////////////////////////////////////////////////
		//function to check if data is unique, if unique then wright to file
		function wrightIfUnique($arr)
		{  
			for($i = 0;$i<count($arr); $i++) //a loop to split the cells in arr by the char :
			{
				$arr[$i]= explode(":",$arr[$i]); 
			} 
			for ($i = 0; $i < count($arr); $i++)
			{
				if(timesInArray($arr[$i][0],$arr,0) == 1 && timesInArray($arr[$i][2],$arr,2) == 1 ) //if name & email apear only once in array
				{
					wrightToFile($arr,$i); //write to result file file
				} 
			} 
		}
		
        //////////////////////////////////
        //function to read from file
		function readInputFile($fo,&$arr)
		{  
			$line=file_get_contents($fo); //reading text from file 
			$arr=explode("\n",$line); //put in array, splited by enter
		} //end readInput file

        ///////////////////////////////////////
		//function to print the resalt array
		function printResFile()
		{  
			readInputFile("new_a1.txt",$res); //reading from resalts file
			echo "<br>The new file contains:";
			for($i = 0; $i < count($res); $i++)
			{
				echo "<br>".$res[$i];
			}
        }
		
		
		///////////////////////////////////////////
		//"cover" antill som input is enterd
	    if(isset($_POST['firstTextName']))
		{  
			$f1 = $_POST['firstTextName']; // string inputed from box
			
			////////////////////////////////////
			//check if input is correct 
		 	if (!strcmp($f1,"a1.txt"))
			{
				 readInputFile($f1,$fileOne); //writing first text to first array
				 wrightIfUnique($fileOne);
				 printResFile();
			}
			else 
			{
				echo "<br>No file found<br>";
			}
				 
	   } //end if
?>
</body>
</html>
