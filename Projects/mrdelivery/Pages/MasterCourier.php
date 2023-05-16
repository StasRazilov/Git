 
<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>צפיה בכל השליחים</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body dir="rtl">
<?php
require_once('../Pages/require_once/CheckUser.php'); //  check session
?>







<form  id="formInvitation"  class="contact-form">
 <div   class="wrapper"  >   
  <div class="title">צפיה בכל השליחים - 
  
<?php
require_once "../PHP/dbClass.php";
$db = new dbClass();

$CountCourier=$db->CountCourier();
 
echo "מס' שליחים רשומים:   $CountCourier "; 
?>   
  
</div> 
<div class="form">
 
<table class="customers">

 
<?php
 
$db->MasterViewAllCouriers();
 
$db=null;
 
?>
 
</table> 
<br><br><br><br><br><br> 
  
</div> 
</div>
</form>


<br><br><br><br><br><br><br><br>
 




















</body>
<?php  
    require_once('require_once/footer.php');
?>
</html>