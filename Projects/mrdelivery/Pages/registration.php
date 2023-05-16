 
    
<!DOCTYPE html>
<html xml:lang="he" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>הרשמה לאתר</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">


 


</head> 

<body dir="rtl"> 

   
 
<?php
    require_once('../Pages/require_once/CheckUser.php'); //  check session
    
    
    require_once "../PHP/dbClass.php";
    $db = new dbClass();
    
    $db->FuncCOUNTentry();
 
?>
 
     
<form   method="post" action="../PHP/ReceptorPhpMyAdmin.php">
 
    <div   class="wrapper1">
    <div  style=" padding: 5px 8px; border: 0px; background:#EEF3E2; cursor: pointer; border-radius: 3px; outline: none; "   class="title"> הרשמה לאתר</div> 
    
           
 
            
        <div class="form"> 
 
            <br><br> 
            <div class="registrationCSS1">    
            מסירות/הגשות החל מ-40ש''ח   
            </div> 
            <br><br><br><br><br><br>
            
            
            <div class="registrationCSS2">    
            בהזמנת 20 משלוחים ויותר בחודש החזר כספי של 20% מסכום ההזמנות
            </div> 
            <br><br> 
    
                <div style="    font-size: 20px;  text-align: right;">*<u>שדות חובה</div></u>
        
         
 
 
 
        <iframe class="Video1Registration"    src="https://www.youtube.com/embed/GmdW5A-jvnE?autoplay=1&mute=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>    </iframe>
     
  
         
        
         
            <br><br><br> 
             
            <div class="inputfield">   
                <input class="input"   type="text"  name="USERNAME" placeholder="*שם משתמש"   maxlength="95" equired />
            </div>  
            
            
            <div class="inputfield">
                <input  class="input"  type="email" name="EMAIL" placeholder="*מייל"  maxlength="95"  required />
            </div> 
            
            
            <div class="inputfield">
                <input class="input" type="tel" name="MOBILEPHONE" placeholder="*טלפון נייד/משרד"  maxlength="25"   required />
            </div>  
            
            
            <div class="inputfield">
                <input class="input" type="password" name="PASS1" placeholder="*סיסמא "  maxlength="20" required />
            </div> 
        
            	   
            <div class="inputfield"> 
                <input class="input" type="password" name="PASS2" placeholder="*אימות סיסמא " maxlength="20"  required />
            </div>
            
            
            <div class="inputfield">
                <input class="input" type="text" name="NAMEOfOFFICE" placeholder="שם המשרד"   maxlength="95" />
            </div> 
            
            
            <div class="inputfield">
                <input class="input" type="text" name="ADDRESS" placeholder="כתובת המשרד"  maxlength="95" />
            </div><br><br><br>
            
            
            <div class='inputfield'>  
                <input value='מאשר/ת את תקנון האתר' type='checkbox' name='ThanTheSiteRules'   required>
                <label  style=  'margin-right: 10px;'>קראתי ואישרתי את <a style='color:#0d68a8' href='Terms.php'> <u> תקנון האתר  </u></a></label> 
            </div><br>
        
         <br><br>
            <div class="inputfield">
                <button   class="btn" name="submit"> צור חשבון </button> 
            </div>
        
         
            <a  href="Login.php"><h2>כניסה לחשבון</h2></a>  
            
            
            
            <!-----

            <div class="registrationCSS3"><br><br>    
                <H2>קצת עלינו</H2>
                
                <p  style="  padding: 5px 1px;    "  >
                חברת ס. שירותים משפטים אנא חברה לשירותי עזר משפטים המעניקה ללקוחותיה מגוון שירותים כגון: מסירות משפטיות ומסירות אישיות של בתי משפט, הוצאה לפועל ועורכי דין כולל תצהירים כחוק בשיתוף תמונות בעת המסירה, הגשת
                תיקים וביצוע פעולות שונות בבתי המשפט, הגשת מכרזים לטאבו-רשם מקרקעין, רשם המשכונות, רשם החברות, רשם הירושות, בתי דין רבניים-שרעי, כנ"ר, איתור כתובות, איסוף חומר לרואי חשבון ועוד
                שירות שליחים מהיר במחירים הכי זולים בארץ
                
                <br><br>
                בברכה ס. שירותים משפטים
                </p> 
            </div> 
            
            ---->
            
    
        


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
    </div>	 
</form> 
 
<br><br><br><br><br><br> 
  
</body>

<?php  
    require_once('require_once/footer.php');
?>

</html>