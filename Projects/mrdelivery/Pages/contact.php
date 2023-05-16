 
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
  
  


 
<form   class="contact-form" method="post" action="../PHP/LeavingMessage.php">
    <div   class="wrapper"  >   
        <div  style=" padding: 5px 8px; border: 0px; background:#EEF3E2; cursor: pointer; border-radius: 3px; outline: none; "  class="title">צור קשר</div>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="form">
            
           
       
             
        <div  class="contactCSS1"  >
        
            <u><b style="	font-size: 30px; "  >צור קשר</b></u> 
            <br><br><br><br>  
            
            <a style=" 	font-size: 20px; " >  <br> 
            <b>כתובת: </b>&nbsp; שד' בן גוריון 21, חיפה


             <br><br>
             
            <b>טלפון: </b>&nbsp;  052-8579254 -  052-5156162
            <br><br>
            
            
            <b>דוא''ל: </b>&nbsp; mrdelivery.ch@gmail.com
            <br><br>
            
            <b>שעות פעילות: </b>
            08:00 - 17:00
            <br><br>  
            </a>  
        </div>  






        <div class="contactCSS2"   > 
            <div class="inputfield">
            <u><label>השארת הודעה</label></u><br>
            </div>
    
             
            <div class="inputfield">
                <input style="width:200px; height:50px;" class="input"   type="text"  name="USERNAME" placeholder="*שם מלא"   maxlength="95"   required/>
                &nbsp; 
                <input style="width:200px; height:50px;" class="input" type="tel" name="MOBILEPHONE" placeholder="*טלפון נייד/משרד"   maxlength="25" required/>
            </div>  
            
            
            <div class="inputfield">
                <input style="width:410px; height:50px;" class="input" type="email" name="EMAIL" placeholder="*מייל"   maxlength="95"  required/> 
            </div>  
            
        
            <div class="inputfield"> 
            
            <textarea   style="width:410px; height:300px;"  name="ReferralContent"   class="input" type="text" name="ADDRESS" placeholder="תוכן הפניה"   maxlength='1000'    required>
            
            </textarea>
 
            </div>
             
             
            <div class="inputfield">
                <button style="	font-size: 18px; "  class="btn" name="submit"  value="Contact" > שלח הודעה </button> 
            </div> 
        </div> 

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!--

      <div class="registrationCSS3"><br><br>    
                <H2  style="  text-align: right;    font-size: 25px; ">קצת עלינו</H2>
                <p  style="    font-size: 18px;   width: 50%; text-align: right; padding: 5px 1px;  background:#F0FFFF;  "  >
                    חברת ס. שירותים משפטים אנא חברה לשירותי עזר משפטים המעניקה ללקוחותיה מגוון שירותים כגון: מסירות משפטיות ומסירות אישיות של בתי משפט, הוצאה לפועל ועורכי דין כולל תצהירים כחוק בשיתוף תמונות בעת המסירה, הגשת
                    תיקים וביצוע פעולות שונות בבתי המשפט, הגשת מכרזים לטאבו-רשם מקרקעין, רשם המשכונות, רשם החברות, רשם הירושות, בתי דין רבניים-שרעי, כנ"ר, איתור כתובות, איסוף חומר לרואי חשבון ועוד
                    שירות שליחים מהיר במחירים הכי זולים בארץ
                    
                    <br><br>
        
                </p> 
            </div> 
            
   

-->



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