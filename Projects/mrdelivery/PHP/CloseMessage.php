<?PHP 
 
include('dbClass.php');
$db = new dbClass();
 
    
	
$db->CloseMessage($_POST['submit']);

$db=null;

echo "<script type=\"text/javascript\">window.alert('הודעה נסגרה');window.location.href = '../Pages/MasterAllMessage.php';</script>";


   
  
  
  
/*
echo "<br>AAA<pre>";
	print_r($_POST);
	echo "</pre>";
 


echo "<br>BBB<pre>";
print_r($_SESSION);
echo "</pre>";
	
	
	die("<br><br><br><br><br> ");
	
*/



?>




 
