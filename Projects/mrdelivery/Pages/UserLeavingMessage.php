 
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
        <div class="title">השארת הודעה</div><br><br><br><br><br><br><br>
        <div class="form">
            
             
        	   
            <div  class="inputfield">
            <label>*בחר נושא פנייה</label> <br> 
            <select class="input" name="RequestSubject"  id="Message" onchange="message()"    required>  <!-- שולח את הבחירה של המשתמש לפרונקציה שמחזירה מחיר -->
            <option></option>  
            <option>הקפאה/ביטול הזמנה</option> 
            <option>הצעת התייעלות</option> 
            <option>כספים</option>  
            <option>אחר</option>  
            </select> <br/><br/>
            </div> 
        
        
        
        
        <div    id="IDMessage">
        
        </div>

 
        <div class="inputfield">
        <label>תוכן הפניה</label>  <br>
        <textarea rows="5" cols="20" name="ReferralContent"   class="input" type="text" name="ADDRESS" placeholder="עד 2000 תווים"   maxlength='1000'  require></textarea>
        
        </div><br><br><br>
        
        
        
        
        <div class="inputfield">
        <button   class="btn" name="submit">שלח הודעה</button> 
        </div>
        
 
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