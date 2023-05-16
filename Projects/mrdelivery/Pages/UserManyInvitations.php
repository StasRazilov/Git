 

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
 
<main> 
<form enctype="multipart/form-data"    class="contact-form" method="post" action="../PHP/AddManyInvitations.php">
    <div   class="wrapper"  >   
        <div class="title">  הזמנת מסירה/הגשה</div><br><br><br><br><br><br><br>
        <div class="form"> 
            <div class='inputfield'>
            <label>הוסף הזמנה</label> <br>    
            <input  class='input'  type='text' name='FullTextInvitation' placeholder='חובה - הקלט עד 250 תווים'  maxlength='250'   required  ></div><br><br><br>
            
            <div class='inputfield'>
            <label>הוסף קבצים למסירה:</label>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input   action='../PHP/dbClass.php'  name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file' multiple  ></div><br><br><br> 
            
            <div class='inputfield'>
            <input  class='input'  type='text' name='Remarks'      placeholder='הערות' maxlength='250'  ></div> <br><br><br>
             
            <div class='inputfield'><br><button  type='submit' class='btn' name='submit'  >שמור</button></div><br><br><br> 
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