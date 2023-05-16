<!-- Stas Razilov  -->
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>


<form action="<?=$_SERVER['SCRIPT_NAME']?>" method=post> 
 input your text: <input type="text" name="str"> <br>
    select potion for changing text:  <br>
    <input type="checkbox" name="bold" value="bold">Change text to boild<br>
    <input type="checkbox" name="italic" value="italic">Change text to italic<br>
    <input type="checkbox" name="underline" value="underline">Add underline to text<br>
    <input type="submit" value="Click here">
    
</form>
   
</body>
</html>



<?php
require_once "lab25function.php";

    if(isset($_POST['str'])) // בודק אם הוקלט טקסט 
	{
        $newStr=new Text;
        $newText=$newStr->set($_POST['str']);
        if(isset($_POST['bold'])||isset($_POST['italic'])||isset($_POST['underline'])) // בודק אם נבחרה פעולה כולשהי 
		{
            if(isset($_POST['bold'])) // אם נבחר יכנס 
                $newText=$newStr->bold($newText);
            if(isset($_POST['italic'])) // אם נבחר יכנס 
               $newText=$newStr->italic($newText);
            if(isset($_POST['underline'])) // אם נבחר יכנס 
               $newText=$newStr->underline($newText);
            echo $newText."<br>"; 
        }
        else // אם לא נבחרה פעולה כלל ידפיס  
		{
			echo "No action selected";
		}
		
    }
    else // אם לא הוקלט טקסט ידפיס  
	{
		echo "No text selected";
	}         
?>





