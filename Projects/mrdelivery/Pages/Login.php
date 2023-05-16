 
<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>כניסה לחשבון</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>

<body dir="rtl">  
 
<?php
require_once('../Pages/require_once/CheckUser.php'); //   check session
?>
  
 
 <form   method="post" action="../PHP/userLogin.php">
   
<div   class="wrapper">
    <div  style=" padding: 5px 8px; border: 0px; background:#EEF3E2; cursor: pointer; border-radius: 3px; outline: none; "  class="title">כניסה לחשבון</div>
    <div class="form">
    <br><br><br><br><br><br><br><br>
	  
      <div class="inputfield">
          <input  class="input"  type="email" name="EMAIL" placeholder="מייל"  required />
      </div>

      <div class="inputfield">
          <input class="input" type="password" name="PASS" placeholder="סיסמא" required />
      </div><br><br><br> 

      <div class="inputfield">
		<button  type="submit" class="btn" name="submit"> כניסה לחשבון </button> 
      </div>
   
     <a  href="registration.php"><h2>הרשמה לאתר</h2></a>  
      
	
    </div>
    
    
    
    
    
    



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

<h2  style="  text-align: right;  ">

האתר עובר שידרוגים באופן מתמיד.
<br>

במקרה של תקלה או בעיה ניתן להשאיר הודעה בעמוד "צור קשר" או להתקשר 052-8579254

<br>
עמכם הסליחה
</h2>



<br><br><br><br><br><br><br><br><br> 

 
   
</div>	
	  
	  
	  
</form>
  
   
</body>

<?php  
    require_once('require_once/footer.php');
?>
 
</html>