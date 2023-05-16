<?php 

  
	
require_once "../CLASS/User.php";
session_start(); 
 
 
 
if(isset($_SESSION['UserNow'])) 
{    

  

	if($_SESSION['UserNow']->getPermissionsField()==1)
	{	
 		require_once('../Pages/require_once/MasterMenu.php'); // master
	}
	else if($_SESSION['UserNow']->getPermissionsField()==2|| $_SESSION['UserNow']->getPermissionsField()==4)
	{	
 		require_once('../Pages/require_once/UserMenu.php');  // VIP user or user
	}
	else if($_SESSION['UserNow']->getPermissionsField()==3)
	{
 		require_once('../Pages/require_once/DeliveryMenu.php');  // delivery
	} 
 
}
else 
{
	require_once('../Pages/require_once/HomeMenu.php');
} 

?>
 