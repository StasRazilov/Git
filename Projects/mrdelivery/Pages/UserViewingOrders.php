 


<!DOCTYPE html>
<html lang="en" lang="he">
<head> 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>צפיה בהזמנות</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body dir="rtl">  

 
<?php
require_once('../Pages/require_once/CheckUser.php'); //  check session
?>




<form  id="formInvitation"    method="post" action="../Pages/UserInvitationUpdate.php">
 <div   class="wrapper"  >   
  <div class="title">  צפיה בהזמנות  </div><br><br><br><br><br><br><br><br>
 
 
<div  class="inputfield">
<table class="customers">

 	
<?php 

require_once "../PHP/dbClass.php";
$db = new dbClass();

$db->UserViewOrders($_SESSION['UserNow']->getIdUser());
 
$db=null;
 
?>
 
</table>
 
</div> 
</div>
<br><br><br><br><br><br><br>
</form>


</body>
<?php  
    require_once('require_once/footer.php');
?>
</html>