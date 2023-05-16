<?php
require_once "dbClass.php";
$db = new dbClass();



if(empty($_POST['submit']))
{

    if(empty($_POST ['PASS']))
    {
		$db=null;
		echo "<script type=\"text/javascript\">window.alert('לא הוכנס סיסמא');window.location.href = '../Pages/Login.php';</script>"; 
        
    }
    else if(empty($_POST["EMAIL"])) 
	{
	
        $db=null;
		echo "<script type=\"text/javascript\">window.alert('לא הוכנס מייל');window.location.href = '../Pages/Login.php';</script>"; 
 
	} 
	else 
	{
			$email = $_POST["EMAIL"];

    }    
	 
	 
	 
	$PermissionsField=$db->checkEmailAndPass($_POST ['EMAIL'],$_POST ['PASS']);

 
		
	if($PermissionsField==1)  // master
	{
		$db=null;	
		header("location:../Pages/MasterInvitations.php");
	}
	else if($PermissionsField==2) //  user
	{   
		$db=null;
		header("location:../Pages/UserInvitationOrder.php");
	}	
	else if($PermissionsField==3) // delivery
	{
		$db=null;
		header("location:../Pages/DeliveryTreatmentOrders.php");	
	}
	else if($PermissionsField==4) //  user VIP
	{
		$db=null;
		header("location:../Pages/UserManyInvitations.php");
	}
	else
	{
		$db=null;
		echo "<script type=\"text/javascript\">window.alert('אחד הפרטים שהזנת שגויים');window.location.href = '../Pages/Login.php';</script>"; 
	}
	
	
 
	 

}
else//   if not, all required fields are filled
{
	$db=null;
	echo "<script type=\"text/javascript\">window.alert('לא הוכנסו פרטים');window.location.href = '../Pages/Login.php';</script>"; 
}
 
  
?>