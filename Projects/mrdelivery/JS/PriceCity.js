"use strict";
 
var PricePages=0;  //  price print
var numPages=0;    //  count pages all files
var numFiles=0;    // count files

var Price=0;  //  price city



function toggleALL(source) 
{
    var checkboxes = document.getElementsByName('formDoor[]');
    for(var i=0, n=checkboxes.length;i<n;i++) 
    {
        checkboxes[i].checked = source.checked;
    }
}









var count=0; 
function NumberPages(iAA) 
{ 
	function innerScope()
	{  
		var input = document.getElementById("FilesInput");
		var reader = new FileReader();
		  
			reader.readAsBinaryString(input.files[iAA]);

			reader.onloadend = function()
			{
				count = reader.result.match(/\/Type[\s]*\/Page[^s]/g).length;
				
				numPages=numPages+count;
 			}  
	}
	return innerScope();
}








  
  

function ValidateSizeFileLegalDelivery(file) 
{  
    

    if(file.files.length>5)
    {
        alert("ניתן לעלות עד 5 קבצים בלבד");	
        document.getElementById("FileLegalDelivery").innerHTML= "" 
                +"<div  id='FileLegalDelivery'  class='inputfield'>"
                +"<label>הוסף קבצים למסירה:</label>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
                +"<input   id='FilesInput'  onchange='ValidateSizeFileLegalDelivery(this)'     action='../PHP/dbClass.php'  name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div> ";
     
        return;
    } 
    
    let flag=0;
    var FileSize;
    for(let i=0;i<file.files.length;i++) 
    {
        FileSize = file.files[i].size / 1024 / 1024; // in MiB  
        if (FileSize > 5)   // MB5 - max size file
        { 
            flag=1;
            alert("גודל הקובץ: "+file.files[i].name+" "+" "+ " גדול מידי"+"\nיש לעלות קבצים שגודלם לא עולה על 5MB"); 	  
        }  
	} 
	if(flag)
	{
        document.getElementById("FileLegalDelivery").innerHTML= "" 
            +"<div  id='FileLegalDelivery'  class='inputfield'>"
            +"<label>הוסף קבצים למסירה:</label>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
            +"<input    id='FilesInput' onchange='ValidateSizeFileLegalDelivery(this)'     action='../PHP/dbClass.php'  name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div> ";
    }




    return;

}
    
   

function ValidateSizeFileSubmission(file) 
{   
    

    if(file.files.length>5)
    {
        alert("ניתן לעלות עד 5 קבצים בלבד");	
        document.getElementById("FileSubmission").innerHTML= ""  
            +"<div  id='FileSubmission' class='inputfield'>"
            +"<label>הוסף קבצים להגשה:</label>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
            +"<input   id='FilesInput'  onchange='ValidateSizeFileSubmission(this)'   name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div>" ;
             
        return;
    } 
    
    let flag=0;
    var FileSize;
    for(let i=0;i<file.files.length;i++) 
    {
        FileSize = file.files[i].size / 1024 / 1024; // in MiB  
        if (FileSize > 5)   // MB5 - max size file
        { 
            flag=1;
            alert("גודל הקובץ: "+file.files[i].name+" "+" "+ " גדול מידי"+"\nיש לעלות קבצים שגודלם לא עולה על 5MB"); 	  
        }  
	} 
	if(flag)
	{
        document.getElementById("FileSubmission").innerHTML= ""  
            +"<div  id='FileSubmission' class='inputfield'>"
            +"<label>הוסף קבצים להגשה:</label>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
            +"<input    id='FilesInput' onchange='ValidateSizeFileSubmission(this)'   name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div>  " ;
    }





    return;

}
    
   
   
      
   
   
   
   
   
   
   
   
   
     
function start()
{
 
	var d=document.getElementById("Start");
	var displaytext=d.options[d.selectedIndex].text;
   
	 if (displaytext === "")
		{
		  document.getElementById("Invitation").innerHTML="";
          document.getElementById("Price").innerHTML="";
		  Price=0;
 		} 
    	else if (displaytext === "מסירה משפטית") //  check if the user actually recorded their name
        {
            document.getElementById("Price").innerHTML="";
            Price=0;
            document.getElementById("Invitation").innerHTML= ""
            +"<div class='inputfield'>"               
            +"<input  class='input'  type='text' name='CaseNumber' placeholder='מספר תיק'  maxlength='250' ></div> " 
            
            
            +"<div class='inputfield'>"
            +"<label>*בחר סוג מסירה</label>"               
            +"<br><select   class='input' name='DeliveryType'   size='5'   required>"
            +"<option>משפטית-התראה</option><option>משפטית-תביעה</option><option>הוצל''פ-התראה</option><option>הוצל''פ-אזהרה</option> </select ></div><br>"
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='FullNameOfTheRecipient' placeholder='*שם מלא של הנמען'  maxlength='145'   required  ></div> " 
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='number' name='toID' placeholder='ת.ז. של הנמען'    min='999999' max='9999999999'    ></div> " 
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='PhoneOfTheRecipient' placeholder='טלפון של הנמען'  maxlength='45'  ></div> " 
            
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Address' placeholder='*כתובת' required  maxlength='145'  ></div> " 
            
            
            +"<div class='inputfield'>"
            +" <label>*בחר עיר</label>"  
            +"<br><select class='input' name='CITY'  class='SelectStyle'  id='PriceCity1' onchange='PriceCity();'  required>"
            
            
            +"<option></option>" 
            
            +"<option>א-שייח' דנון</option> "
            +"<option>אור עקיבא</option>"
            +"<option>איבטין</option>"
            +"<option>אפק</option>"         
            +"<option>בנימינה</option>"       
            +"<option>בוסתן הגליל</option>"
            +"<option>בן עמי</option>"
            +"<option>בית אורן</option>" 
            +"<option>בת שלמה</option>"
            +"<option>גבע כרמל</option>"
            +"<option>ג'סר א זרקא</option>"
            +"<option>דור</option> "
            +"<option>הבונים</option>"
            +"<option>החותרים</option> "
            +"<option>זכרון יעקב</option>"
            +"<option>חיפה</option>"
            +"<option>טירת הכרמל</option>"
            +"<option>יגור</option>"
            +"<option>כפר ביאליק</option>" 
            +"<option>כפר חסידים</option>" 
            +"<option>כפר מסריק</option>"
            +"<option>כרם מהר''ל</option>"
            +"<option>לוחמי הגטאות</option>"            
            +"<option>מגדים</option>"
            +"<option>מזרעה</option>" 
            +"<option>מטה אשר</option>"
            +"<option>מעגן מיכאל</option>"  
            +"<option>מעיין צבי</option>"
            +"<option>נהריה</option>"
            +"<option>נווה ים</option>"
            +"<option>נחשולים</option>"
            +"<option>נשר</option>"      
            +"<option>נתיב השיירה</option>"
            +"<option>עברון</option>" 
            +"<option>עוספיא דאלית אל כרמל</option>"     
            +"<option>עופר</option>" 
            +"<option>עין איילה</option> " 
            +"<option>עין הוד</option>"
            +"<option>עין חוד</option> " 
            +"<option>עין הכרמל</option>"
            +"<option>עין המפרץ</option>"
            +"<option>עכו</option>"
            +"<option>עתלית</option>"
            +"<option>פוריידיס</option>" 
            +"<option>צרופה</option>"
            +"<option>קיסריה</option>" 
            +"<option>קריית אתא</option> "
            +"<option>קריית ביאליק</option>"
            +"<option>קריית חיים-חיפה</option>"
            +"<option>קריית חשמל</option>"
            +"<option>קריית ים</option>"
            +"<option>קריית מוצקין</option>" 
            +"<option>רגבה</option>"
            +"<option>רכסים</option>" 
            +"<option>רמת יוחנן</option>" 
            +"<option>שבי ציון</option>" 
            +"<option>שדות ים</option>"
            +"<option>שמרת</option>" 
            +"<option>שפרעם</option>"            
                        
            +"<option disabled></option>"            
            +"<option style='font-weight: bold; ' disabled>מרכז הארץ</option>"            
            +"<option>תל אביב</option>"            
            +"<option>רמת גן</option>"            
            +"<option>בני ברק</option>"            
            +"<option>פתח תקווה</option>"            
            +"<option>הרצליה</option>"            
            +"<option>רעננה</option>"            
            +"<option>כפר סבא</option>"            
            +"<option>הוד השרון</option>"            
            +"<option>נתניה</option>"            
            +"<option>חדרה</option>"            
              
            +"<option>כפר ויתקין</option>"            
            +"<option>בית יצחק שער חפר</option>"            
            +"<option>מכמורת</option>"            
            +"<option>משמרת השרון</option>"            

            +"</select ></div><br>"
            
             
            
            +"<div  id='FileLegalDelivery'  class='inputfield'>"
            +"<label>הוסף קבצים למסירה:</label>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
            +"<input   id='FilesInput'  onchange='ValidateSizeFileLegalDelivery(this)'     action='../PHP/dbClass.php'  name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div><br><br><br> "

            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'   maxlength='250'  ></div> " 
            
            
            +"<div class='inputfield'> "  
            +"<input value='מאשר/ת את תקנון האתר' type='checkbox' name='ThanTheSiteRules'  required>"
            +"<label  style=' margin-right: 10px;'>קראתי ואישרתי את <a style='color:#0d68a8' href='Terms.php'> <u> תקנון האתר  </u> </a></label> "
            +"</div><br>"

		} 
	    else if (displaytext === "הגשה") //  check if the user actually recorded their name
		{
            document.getElementById("Price").innerHTML="";
            Price=0;
            document.getElementById("Invitation").innerHTML=""
            
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Submission'     placeholder='*הגש ב...'   maxlength='145'  required></div> " 
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Address'      placeholder='*כתובת'   maxlength='145' required ></div> " 
            
            
            +"<div class='inputfield'>"
            +"<label>*בחר עיר</label>"
            +"<br><select  name='CITY'  class='input'  id='PriceCity1' onchange='PriceCity();'  required>"
            
            
            +"<option></option>" 
            
            +"<option>א-שייח' דנון</option> "
            +"<option>אור עקיבא</option>"
            +"<option>איבטין</option>"
            +"<option>אפק</option>"         
            +"<option>בנימינה</option>"       
            +"<option>בוסתן הגליל</option>"
            +"<option>בן עמי</option>"
            +"<option>בית אורן</option>" 
            +"<option>בת שלמה</option>"
            +"<option>גבע כרמל</option>"
            +"<option>ג'סר א זרקא</option>"
            +"<option>דור</option> "
            +"<option>הבונים</option>"
            +"<option>החותרים</option> "
            +"<option>זכרון יעקב</option>"
            +"<option>חיפה</option>"
            +"<option>טירת הכרמל</option>"
            +"<option>יגור</option>"
            +"<option>כפר ביאליק</option>" 
            +"<option>כפר חסידים</option>" 
            +"<option>כפר מסריק</option>"
            +"<option>כרם מהר''ל</option>"
            +"<option>לוחמי הגטאות</option>"            
            +"<option>מגדים</option>"
            +"<option>מזרעה</option>" 
            +"<option>מטה אשר</option>"
            +"<option>מעגן מיכאל</option>"  
            +"<option>מעיין צבי</option>"
            +"<option>נהריה</option>"
            +"<option>נווה ים</option>"
            +"<option>נחשולים</option>"
            +"<option>נשר</option>"      
            +"<option>נתיב השיירה</option>"
            +"<option>עברון</option>" 
            +"<option>עוספיא דאלית אל כרמל</option>"     
            +"<option>עופר</option>" 
            +"<option>עין איילה</option> " 
            +"<option>עין הוד</option>"
            +"<option>עין חוד</option> " 
            +"<option>עין הכרמל</option>"
            +"<option>עין המפרץ</option>"
            +"<option>עכו</option>"
            +"<option>עתלית</option>"
            +"<option>פוריידיס</option>" 
            +"<option>צרופה</option>"
            +"<option>קיסריה</option>" 
            +"<option>קריית אתא</option> "
            +"<option>קריית ביאליק</option>"
            +"<option>קריית חיים-חיפה</option>"
            +"<option>קריית חשמל</option>"
            +"<option>קריית ים</option>"
            +"<option>קריית מוצקין</option>" 
            +"<option>רגבה</option>"
            +"<option>רכסים</option>"
            +"<option>רמת יוחנן</option>" 
            +"<option>שבי ציון</option>" 
            +"<option>שדות ים</option>"
            +"<option>שמרת</option>" 
            +"<option>שפרעם</option>"   
            
            +"<option disabled></option>"            
            +"<option style='font-weight: bold; ' disabled>מרכז הארץ</option>"            
            +"<option>תל אביב</option>"            
            +"<option>רמת גן</option>"            
            +"<option>בני ברק</option>"            
            +"<option>פתח תקווה</option>"            
            +"<option>הרצליה</option>"            
            +"<option>רעננה</option>"            
            +"<option>כפר סבא</option>"            
            +"<option>הוד השרון</option>"            
            +"<option>נתניה</option>"            
            +"<option>חדרה</option>"            
           
            +"<option>כפר ויתקין</option>"            
            +"<option>בית יצחק שער חפר</option>"            
            +"<option>מכמורת</option>"            
            +"<option>משמרת השרון</option>"            

            +"</select ></div><br>"
            
            
            +"<div  id='FileSubmission' class='inputfield'>"
            +"<label>הוסף קבצים להגשה:</label>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
            +"<input  id='FilesInput' onchange='ValidateSizeFileSubmission(this)'   name='FILE[]'  style='width:300px;  font-size:1.5rem;'  type='file'   title='ניתן לעלות קבצים רק בפורמט PDF בלבד'      accept='application/pdf, application/vnd.ms-excel'       multiple required></div><br><br><br>  " 
            
            
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Remarks'      placeholder='הערות' maxlength='250'  ></div> " 
            
            
            +"<div class='inputfield'> "  
            +"<input value='מאשר/ת את תקנון האתר' type='checkbox' name='ThanTheSiteRules'   required>"
            +"<label  style=' margin-right: 10px;'>קראתי ואישרתי את <a style='color:#0d68a8' href='Terms.php'> <u> תקנון האתר  </u></a></label> "
            +"</div><br>" 
		} 
    	else if (displaytext === "איתור כתובת") //  check if the user actually recorded their name
        {
            document.getElementById("Price").innerHTML="";
            Price=0;
            document.getElementById("Invitation").innerHTML= ""
         
        
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='FullNameOfTheRecipient' placeholder='*שם מלא של החייב'  maxlength='145'   required  ></div> " 
             +"<div class='inputfield'>"
            +"<input  class='input'  type='number' name='toID' placeholder='*ת.ז. של החייב'    min='999999' max='9999999999'    ></div> " 
 
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='PhoneOfTheRecipient' placeholder='טלפון של החייב  '  maxlength='45'  ></div> " 
 
         
            +"<div class='inputfield'>"
            +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'   maxlength='250'  ></div> " 
            
 
            +"<div class='inputfield'> "  
            +"<input value='מאשר/ת את תקנון האתר' type='checkbox' name='ThanTheSiteRules'  required>"
            +"<label  style=' margin-right: 10px;'>קראתי ואישרתי את <a style='color:#0d68a8' href='Terms.php'> <u> תקנון האתר  </u> </a></label> "
            +"</div><br>"
            Price=120;
            
            var OriginalPrice=Price;
            var Percent=(Price*10)/100;
            
            Price=Price-Percent;
            

            document.getElementById("Price").innerHTML=     "<div   class='inputfield'>"
                                                            +"<br><br><hr><br><br><br>"
                                                            +"<H2 style=' width: 30%;  margin: 10px 430px;  text-align: center; font-size:  25px;'  >ביצוע עד 7 ימי עסקים</H2> <br><br><br>"       
         
                                                            +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right;  font-size:  22px;"  > מחיר: '+OriginalPrice+'ש"ח</H2> '  
                                                         
                                                            +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right;  font-size:  22px;"  > הנחה: '+Percent+'ש"ח</H2> '  
                                                             
                                                            +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right; font-size:  22px;"  > <br><u>סה"כ לתשלום:  '+Price+'ש"ח </u></H2>' 
                                                          
        
                                                            +"<input type='number' style=' border: none;  width: 4%;    color:  #ffffff;'  type='text'   name='Price' value='"+Price+"' readonly>  <br><br><br><br> " 
         
                                                            +"<button   type='submit' class='btn' name='submit'  '> פתיחת הזמנה </button></div><br><br><br>";

  

          
		}   

} 


function PriceCity()
{
	var d=document.getElementById("PriceCity1");
	var displaytext=d.options[d.selectedIndex].text;
 	 
	if (displaytext === "") //  check if the user actually recorded their name
		{
			Price=0;
 		} 
    	else if (displaytext === "חיפה"||displaytext === "טירת הכרמל"||displaytext === "נשר") //  check if the user actually recorded their name
		{
			Price=45;
   		} 
  
        else if (displaytext === "עין הוד"||displaytext === "עין איילה"||displaytext === "נחשולים"||
	         displaytext === "הבונים"||displaytext === "עתלית"||
			 displaytext === "עין הכרמל"||displaytext === "נווה ים"||displaytext === "כרם מהר''ל"||		 
			 displaytext === "עופר"||displaytext === "בת שלמה"||displaytext === "דור"||displaytext === "מגדים"||
			 displaytext === "החותרים"||displaytext === "צרופה"||displaytext === "גבע כרמל"||
			 displaytext === "זכרון יעקב"||displaytext === "מעיין צבי"||displaytext === "בנימינה"||
			 displaytext === "מעגן מיכאל"||displaytext === "קיסריה"||displaytext === "שדות ים"||displaytext === "אור עקיבא") 
		{
			Price=55;
  		} 
 	 	 
    else if (displaytext === "רמת יוחנן"||displaytext === "קריית אתא"||displaytext === "כפר ביאליק"||
	        displaytext === "קריית ביאליק"|| displaytext === "קריית מוצקין"|| displaytext === "קריית חיים-חיפה"||
	         displaytext === "קריית ים"||displaytext === "קריית חשמל" ) //  check if the user actually recorded their name
		{
			Price=50;
  		} 
 		 
    else if (displaytext === "כפר מסריק"||displaytext === "עין המפרץ"||displaytext === "עכו"||
	         displaytext === "נהריה"|| displaytext === "שמרת"|| displaytext === "בוסתן הגליל"||
	         displaytext === "לוחמי הגטאות"||displaytext === "מטה אשר"||displaytext === "רגבה"||
			 displaytext === "שבי ציון"|| displaytext === "עברון"|| displaytext === "בן עמי"||
			 displaytext === "נתיב השיירה"||displaytext === "יגור"||displaytext === "כפר חסידים"||displaytext === "אפק" ||displaytext === "רכסים")
		{
			Price=100;
  		}  
  		 
    else if (displaytext === "בית אורן"||displaytext === "פוריידיס"||displaytext === "ג'סר א זרקא"||displaytext === "שפרעם"||
            displaytext === "איבטין"||displaytext === "עין חוד"||displaytext === "מזרעה"||displaytext === "א-שייח' דנון"||displaytext === "עוספיא דאלית אל כרמל"||
            displaytext === "תל אביב"||displaytext === "רמת גן"||displaytext === "בני ברק"||displaytext === "פתח תקווה"||displaytext === "הרצליה"||
            displaytext === "רעננה"||displaytext === "כפר סבא"||displaytext === "הוד השרון"||displaytext === "נתניה"||displaytext === "חדרה"||
            displaytext === "כפר ויתקין"||displaytext === "בית יצחק שער חפר"||displaytext === "משמרת השרון"||displaytext === "מכמורת")
		{
			Price=150;
			
  		} 
 
    var OriginalPrice=Price;
    var Percent=(Price*10)/100;
    Price=Price-Percent;


    document.getElementById("Price").innerHTML=     "<div   class='inputfield'>"
                                                    +"<br><br><hr><br><br><br>"
                                                    +"<H2 style=' width: 30%;  margin: 10px 430px;  text-align: center; font-size:  25px;'  >ביצוע עד 7 ימי עסקים</H2> <br><br><br>"       
 
                                                    +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right;  font-size:  22px;"  > מחיר: '+OriginalPrice+'ש"ח</H2> '  
                                                 
                                                    +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right;  font-size:  22px;"  > הנחה: '+Percent+'ש"ח</H2> '  
                                                     
                                                    +'<H2 style=" width: 30%;  margin: 10px 430px;  text-align: right; font-size:  22px;"  > <br><u>סה"כ לתשלום:  '+Price+'ש"ח </u></H2>' 
                                                  

                                                    +"<input type='number' style=' border: none;  width: 4%;    color:  #ffffff;'  type='text'   name='Price' value='"+Price+"' readonly>  <br><br><br><br> " 
 
                                                    +"<button   type='submit' class='btn' name='submit'  '> פתיחת הזמנה </button></div><br><br><br>";

  
  
  
  
}
                                                     


 














function Family()  
{
 
    var d=document.getElementById("Execution");
    var displaytext=d.options[d.selectedIndex].text;
 
 	if (displaytext === "נמסר לנמען")
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
 
                                                        +"<label >הוסף תמונה</label>  <br>"
                                                        +"<input   type='file'   name='Photo' required><br><br><br><br>" 
                                                        
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  required pattern='d{2}-d{2}-d{2}'  class='input'  type='date' name='date3' required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3' required><br><br><br><br>" 
                                                        
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'  maxlength='45'  required><br><br><br><br>"
                                                        
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'   maxlength='195' ><br><br><br><br>";  

   
 	}
 
	else if (displaytext === "בן/ת משפחה")
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
              
                                                        +"<label>  סוג קרבה  <input style=' border: none;  width: 4%;    font-size: 20PX;'  type='text'    readonly>  </label><br>"
                                                        +"<select class='input' name='TypeFamily'  class='SelectStyle' required><br>"
                                                        +"<option></option> "
                                                        +"<option>אישתו</option>"
                                                        +"<option>בעלה</option>"
                                                        +"<option>בן זוג</option>"
                                                        +"<option>בת זוג</option>"
                                                        +"<option>בן</option>"
                                                        +"<option>בת</option>"
                                                        +"<option>אחר</option>"
                                                        +"</select><br><br><br>"
                                             
                                                        +"<input  class='input'  type='text' name='NAME' placeholder='נמסר ל...'   maxlength='28'required><br><br><br>"
                                                        
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'  required><br><br><br><br>" 
    
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'  required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3'  required><br><br><br><br>" 
                                                       
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'   maxlength='45'  required><br><br><br><br>"
                                                    
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'   maxlength='195' ><br><br><br><br>";
 	}
 	
	else if (displaytext === "נמסר לנמען אך סירב לחתום") 
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
         
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'   required><br><br><br><br>" 
                                                       
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'   required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3'   required><br><br><br><br>" 
                                                   
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'   maxlength='45' required><br><br><br><br>"
                                                     
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='נא ציין מי סרב ומדוע:'  maxlength='195'  required><br><br><br><br>";
 	}
 		
	else if (displaytext === "סירב לחתום ולקבל -הושאר במקום") 
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
         
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'   required><br><br><br><br>" 
                                                        
                                                        
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'   required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3'   required><br><br><br><br>" 
                                                    
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'  maxlength='45' required><br><br><br><br>"
                                                    
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='נא ציין מי סרב ומדוע:'  maxlength='195'   required><br><br><br><br>";
 	}
 	
 	else if (displaytext === "מסרתי את הכתב למורשה של הנעמן") 
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
         
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'   required><br><br><br><br>" 
                                                        
                                                        
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'   required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3'   required><br><br><br><br>" 
                                                    
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'   maxlength='45'  required><br><br><br><br>"
                                                    
                                                        +"<input  class='input'  type='text' name='NAME' placeholder='נמסר ל...'    maxlength='28'  required><br><br><br>"

                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'    maxlength='195'  ><br><br><br><br>";

 
  	}
 	else if (displaytext === "ביקור שלישי הודבק במקום") //  visit 3
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
                                                  
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'  required> <br><br><br><br>" 
                                                        
                                                        
                                                        +"<label>ביקור 1</label><br>"
                                                        +"<input  class='input'  type='date' name='date1'  required><br>" 
                                                        +"<input  class='input'  type='time' name='time1'   required><br><br><br><br><br>" 
    
                                                        +"<label>ביקור 2</label><br>"
                                                        +"<input  class='input'  type='date' name='date2'  required><br><" 
                                                        +"<input  class='input'  type='time' name='time2'  required><br><br><br><br><br>" 
    
                                                        +"<label>ביקור 3</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'  required><br>" 
                                                        +"<input  class='input'  type='time' name='time3'  required><br><br><br><br><br>" 
                                                         
                                                        +"<input  class='input'  type='text' name='VerificationSource' placeholder='מקור אימות'  maxlength='45'  required><br><br><br><br>"
                                                        
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='הערות'   maxlength='195' ><br><br><br><br>";
 
 	} 
 	
 	else if (displaytext === "כתובת שגויה")
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"
                                                  
                                                        +"<label>הוסף תמונה</label> <br>" 
                                                        +"<input   type='file'   name='Photo'   required><br><br><br><br>" 
                                                         
                                                         
                                                        +"<label>נמסר ביום ושעה</label><br>"
                                                        +"<input  class='input'  type='date' name='date3'   required><br><br>" 
                                                        +"<input  class='input'  type='time' name='time3'   required><br><br><br><br>" 
                                                    
                                                    
                                                        +"<input  class='input'  type='text' name='Remarks' placeholder='כיצד הבנת שהכתובת שגויה יאללה פרט לפני אני שובר אותך'   maxlength='195'  required><br><br><br><br>";
 
 	} 
 	
 	
 	
 	
 	else if (displaytext === "")  
	{
        document.getElementById("Continued").innerHTML=   "<br><br>"; 
 	}
 	
    
    
}




function message() 
{
    var d=document.getElementById("Message");
    var displaytext=d.options[d.selectedIndex].text;
    
    if (displaytext === "") 
    {
        document.getElementById("IDMessage").innerHTML=   ""; 
    } 
    else if (displaytext === "הקפאה/ביטול הזמנה") 
    {
        document.getElementById("IDMessage").innerHTML=   "<br><br>"
         
        +" <div class='inputfield'>"
        +"<label>*מספר הזמנה</label><br>"
        +"<input  class='input' type='number'   name='OrderNumber'     min='1' max='5000' required /></div> <br>"; 
    }   
    else if (displaytext === "כספים") 
    {
        document.getElementById("IDMessage").innerHTML=   "";  
    }     
    else if (displaytext === "הצעת התייעלות") 
    {
        document.getElementById("IDMessage").innerHTML=   "";  
    } 
    else if (displaytext === "אחר") 
    {        
        document.getElementById("IDMessage").innerHTML=   "";  
    } 
    
    
    
    

} 



           
