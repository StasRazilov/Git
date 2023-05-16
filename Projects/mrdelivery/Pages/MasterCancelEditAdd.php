 
<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ביטול-עריכה-הוספת טפסים חתומים </title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body dir="rtl">  
 
<?php
require_once('../Pages/require_once/CheckUser.php'); //  check session
?>
  
 
  
 



<form enctype="multipart/form-data"      class="contact-form" method="post" action="../PHP/CancelEditAdd.php"> <!-- שולח לדף שבוא השליח מבצע את ההזמנה שבחר -->
<div   class="wrapper"  >   
<div class="form">
 
  
    
<table class="customers">
 
      
<?php
require_once "../PHP/dbClass.php";
$db = new dbClass();
  

$submit= $_SESSION['submit'];  
$formDoor=  $_SESSION['formDoor'];


unset($_SESSION['submit']);
unset($_SESSION['formDoor']);
 

$db->CancelEditAdd($submit,$formDoor);
 
 $db=null;
 
?>
 
</table>  
    
</div> 
</div>
</form>


<br><br><br><br><br><br><br><br>

















 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

</body>

<?php  
    require_once('require_once/footer.php');
?>

</html>