 
<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>דף ראשי</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body dir="rtl">
<?php
require_once('../Pages/require_once/CheckUser.php'); //   check session
?>
  
  
  
  
  
  
<main >
<form class="contact-form" method="post" action="../PHP/ReceptorPhpMyAdmin.php">
<div   class="wrapper">
    <div class="title">הוספת שליח </div><br><br><br><br><br><br><br>

    <div class="form">
	             
  
      <div class="inputfield">
          <input class="input"   type="number"  name="IDENTITYCARD" placeholder="תז-שליח"  required />
      </div>  
	  
	  
      <div class="inputfield">
          <input class="input"   type="text"  name="USERNAME" placeholder="שם-שליח"  required />
      </div>  

  
      <div class="inputfield">
          <input  class="input"  type="email" name="EMAIL" placeholder="מייל"  required />
      </div> 
	   
	   
      <div class="inputfield">
          <input class="input" type="tel" name="MOBILEPHONE" placeholder="טלפון נייד" required />
      </div>  
	   
	   
      <div class="inputfield">
          <input class="input" type="password" name="PASS1" placeholder="*סיסמא" required />
      </div> 
	    
	   
      <div class="inputfield">
          
          <input class="input" type="password" name="PASS2" placeholder="אימות סיסמא" required />
      </div>
  
    
    <div class="inputfield">
        <input class="input" type="text" name="ADDRESS" placeholder="כתובת השליח" required/>
    </div><br><br><br>
    

    <div class='inputfield'>    
    <input value='מאשר/ת את תקנון האתר' type='checkbox' name='ThanTheSiteRules'  required>
    <label  style=' margin-right: 10px;'>קראתי ואישרתי את <a style='color:#0d68a8' href='Terms.php'> <u> תקנון האתר  </u> </a></label> 
    </div><br>  



	 
	  
      <div class="inputfield">
	    <button   class="btn" name="submit"> צור חשבון </button> 
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