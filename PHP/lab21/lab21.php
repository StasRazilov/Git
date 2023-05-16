<!-- Stas Razilov  -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style1.css"> 
	</head>
	<body>
	
<?php
 
define("FileName","names21.txt");
define("City","cities21.txt");

////////////////////////////////////////////////////////////
//function to read information from file into array, names
function readInputFile($str):array
{
	$names;
	$line=file_get_contents($str);
	$names=explode("\n",$line);
	return $names;
}

////////////////////////////////////////////////////////////
//function that returns string according to selection 
function selectItems($items,$selected=0)
{
	$text="";
	foreach($items as $k=>$v)
	{
		if($k===$selected)
		{
			$ch="selected";
		} 
		else
		{
			$ch="";
		} 
		$text.="<option$ch value='$k'>$v</option>\n";
	}
	return $text;
}

 
$names=readInputFile(FileName);
$cities=readInputFile(City);

if(isset($_POST['surname']))//checks if there's any information in $_POST
{
	$name=$names[$_POST['surname']];		
	echo '<div class="s1">',  "elected: {$_POST['surname']} , {$name}" ,'</div>';	
	file_put_contents("history_file.txt",$names[$_POST['surname']]." ",FILE_APPEND);
}
echo "<br>";
if(isset($_POST['city'])&&$_POST['city']!=0)//checks if there's any information in $_POST
{
	$city=$cities[$_POST['city']];
	echo '<div class="s1">',  "elected: {$_POST['city']} , {$city}" ,'</div>';
	file_put_contents("history_file.txt",$cities[$_POST['city']]."\n",FILE_APPEND);
}
else
{
	echo '<div class="error1">', "No city choosen",'</div>';
	file_put_contents("history_file.txt","\n",FILE_APPEND);
}
?>
	

<form action="<?=$_SERVER['SCRIPT_NAME']?>" method=post>
<h2>Select Name:</h2>
<select name=surname>
	<?=selectItems($names,$_POST['surname'])?>

</select>
<h2>Select City:</h2>
<select name=city>
	<?=selectItems($cities,$_POST['city'])?>
</select>
<br>
<br>
<input type=submit value="Click here">
</form>
</body>

