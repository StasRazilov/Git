 <?php
include 'dbClass.php';
 
$db = new dbClass();
 
  
if(empty($_POST ['submit']))
{
	
	if (!empty($_POST ['USERNAME']))
	{
		$db->UserUpdateUsername($_POST['USERNAME']);
 	}	
	
	
	
	if (!empty($_POST ['MOBILEPHONE']))
	{
		$db->UserUpdateMobilephone($_POST['MOBILEPHONE']);
 	}
	
	
	
	if (!empty($_POST ['NAMEOfOFFICE']))
	{
		$db->UserUpdateNameOfOffice($_POST['NAMEOfOFFICE']);
 	}
	
	
	
	if (!empty($_POST ['ADDRESS']))
	{
		$db->UserUpdateStreet($_POST['ADDRESS']);
 	}	
	






	if (!empty($_POST ['PASS1'])&&!empty($_POST ['PASS2'])&&!empty($_POST ['PASS3']))
	{ 
		if(password_verify($_POST['PASS1'],$_SESSION['UserNow']->getPassword()))// if the password matches
		{
			if( $_POST ['PASS2']!=$_POST ['PASS3'] )// if  the password  is not matches
			{
				echo "<script type=\"text/javascript\">window.alert('אימות סיסמא שגוי'); </script>"; 
				$this->disconnect();
				$db=null; 
				return ;
			}
			$db->UserUpdatePass($_POST['PASS2']);
			echo "<script type=\"text/javascript\">window.alert('הסיסמא עודכנה'); </script>";
		}
		else
		{
			echo "<script type=\"text/javascript\">window.alert('סיסמת משתמש שגויה'); </script>";
		}
	}
	else if(empty($_POST ['PASS2'])&&empty($_POST ['PASS3']))
	{
		echo "<script type=\"text/javascript\">window.alert('לא הוקלט סיסמא נוכחית'); </script>";
	}
	else  
	{
		echo "<script type=\"text/javascript\">window.alert('אתה אידיוט'); </script>";
	}
	
		
		
 
 
	$db->newSESSION($_SESSION['UserNow']->getEmail());
	$db=null; 
	header("Location:../Pages/UserUpdateDetails.php");

}
  
$db=null; 
  
  
	   
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 