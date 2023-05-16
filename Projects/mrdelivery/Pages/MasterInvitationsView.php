 

<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>הזמנת פעולה</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="../JS/PriceCity.js"></script>
</head>

<body dir="rtl">  
 
<?php
require_once('../Pages/require_once/CheckUser.php'); //  check session
?>
 
   
<form enctype="multipart/form-data" id="formInvitation"  class="contact-form" method="post" action="../PHP/InvitationUpdate.php">
<div   class="wrapper">   
  
<?php
 
require_once "../PHP/dbClass.php";
$db = new dbClass();


/*
  echo "<br>AAAAA<br><br><pre>";
    print_r($_POST);
    echo "</pre>";
    
    echo "<br>BBBBB<br><br><pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    die("<br><br><br><br><br> ");
*/
if (!empty($_SESSION['View']))
{?>
    <div   class="title"> פרטי הזמנה - צפיה </div><br><br><br><br><br><br><br><hr>  <br><br>
    <div    class="form"> 
 
<?php 
   $View=$_SESSION['View'];
   unset($_SESSION['View']);

    $db->UserOrderDetailsView($View,"מספרהזמנה");

}
 
$db=null;


?>
 

 


</div>  


 
</div>   
</div>
</form>
 
<br><br><br><br><br><br> 
 
 
</body>
<?php  
    require_once('require_once/footer.php');
?>

</html>