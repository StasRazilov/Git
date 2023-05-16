 

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

<form enctype="multipart/form-data" id="formInvitation"  class="contact-form" method="post" action="../PHP/add_transaction_account1.php">
    <div   class="wrapper"  >   
        <div class="title">  הזמנת פעולה </div><br><br><br><br><br><br><br>
        <div class="form">
         
        <div style="    font-size: 20px;  text-align: right;">*<u>שדות חובה</div></u>
        <br><br><br> 

            
            <div  class="inputfield">
            <label >*בחר סוג הזמנה</label> <br> 
            <select class="input" name="OrderType"  id="Start" onchange="start()">
            <option> </option>
            <option>מסירה משפטית</option>
            <option>הגשה</option>  
            <option>איתור כתובת</option>  
            </select> <br/><br/>
            </div> 
            
            
            <div    id="Invitation">
  
            </div>
            
            
            <div id="Price">
                
            </div>
            
        </div> 
    </div>
</form>
  

 
<h3  style="float:right" id="PrintPriceCity" ></h3>


</main>
<br><br><br><br><br><br> 
 
 
</body>
<?php  
    require_once('require_once/footer.php');
?>

</html>