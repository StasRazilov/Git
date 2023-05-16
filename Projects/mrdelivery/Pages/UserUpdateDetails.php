 


<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>עדכון פרטים</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>




<body dir="rtl">  
 
 
<?php
require_once('../Pages/require_once/CheckUser.php'); //  check session
?>

<main  >

<form   class="contact-form" method="post" action="../PHP/UserUpdate.php">
 <div   class="wrapper"  >   
  <div class="title">עדכון פרטים</div><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="UserUpdateDetails">
 
  
        
        <label><b>שם פרטי:</b>&nbsp;&nbsp;<?php echo $_SESSION['UserNow']->getUserName()."</label>"; ?>    
        <input class="input" type="text"  name="USERNAME" placeholder="עדכן שם משתמש"  maxlength="95"   />
        <br><br>
         
         
        <label><b>טלפון נייד/משרד:</b>&nbsp;&nbsp;<?php echo $_SESSION['UserNow']->getMobile()."</label>"; ?>   
        <input class="input" type="tel" name="MOBILEPHONE" placeholder="עדכן טלפון נייד/משרד"   maxlength="25"  />
        <br><br>

         
        <label><b>שם המשרד:</b>&nbsp;&nbsp;<?php  echo $_SESSION['UserNow']->getNameOfOffice()."</label>"; ?>   
        <input class="input" type="text" name="NAMEOfOFFICE" placeholder="עדכן שם המשרד"  maxlength="95"    />
        <br><br>

     
        <label><b>כתובת המשרד:</b>&nbsp;&nbsp;<?php   echo $_SESSION['UserNow']->getStreet()."</label>"; ?>  
        <input class="input" type="text" name="ADDRESS" placeholder="כתובת המשרד"   maxlength="95"  />
        
        <br><br><br><br> 

     
     
   
        <label>עדכון סיסמא חדשה</label><br><br>
        
        <input  style="float: right; width:40% ; "  class="input" type="password" name="PASS1"  placeholder="הקלט סיסמא נוכחית"  maxlength="20" />
        <br><br>		
        
        <input style="float: right; width:40% ; "  class="input" type="password" name="PASS2" placeholder="הקלט סיסמא חדשה"   maxlength="20" />
        <br><br>
        
        <input style="float: right; width:40% ; "  class="input" type="password" name="PASS3"  placeholder="הקלט שוב את הסיסמא החדשה לאימות"     maxlength="20"  />
        <br><br><br><br><br>
                
        <button  type="submit" class="btn" name="submit">עדכן</button> 
       
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