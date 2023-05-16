 
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
 


  
  <main  >

<form   class="contact-form" method="post" action="../PHP/LeavingMessage.php">
    <div   class="wrapper"  >   
		<div class="form">
  
<?php
require_once "../PHP/dbClass.php";
$db = new dbClass();

  
$MaxMessage= $db->MaxMessage($_SESSION['UserNow']->getIdUser());

$db=null;
 

?> 
     
    

			<h2  style=" font-size: 40px; "><br><br><br>
 הודעתך מספר  <?php echo $MaxMessage; ?> התקבלה בהצלחה
<br>
<br>
			</h2>

        </div> 
    </div>
</form>
  

 
</main>
<br><br><br><br><br><br> 
 
 
</body>
<?php  
    require_once('require_once/footer.php');
?>

</html>