<?php
 

function ConfirmationOfDeliveryExecution($toName,$toAddress,$CaseNumber,$UserName,$toID,$UserAddress,
                                         $UserMobile,$IDInvitation) :string   
{

/*
	$toName="אבי נעלבי";  // שם הנמען
	$toAddress="ארלוזורוב 34/5  חיפה";  // כתובת הנמען
	$CaseNumber="12345-08-20";  // מס תיק   
	$UserName="עו''ד שמוליק ";  // שם המשתמש
	$toID="123456789";//תז של הנמען
	$UserAddress="הרצל 18 קומה 1 הרצליה פיתוח";  // כתובת המשתמש
	$UserMobile="0528526548";  // טלפון המשתמש
	$IDInvitation="21"; // אי די של ההזמנה
*/ 
   
	require('TCPDF/tcpdf.php');


	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);//make TCPDF object
    $pdf->setPrintHeader(false);

	$pdf->AddPage();//add page


	$pdf->SetFont('freesans','',10);
	$txt = " אל:    $toName 
           $toAddress";
	$pdf->MultiCell(120, 15, $txt, 1, 'R', 0, 1, 50, 15, true);




	$txt = "                מדינת ישראל -הוצל''פ                                                        אישור מסירה בתיק מספר:   $CaseNumber  
                                                                                                                                    מספר ת.ז.:   $toID
                                                                                                                                              חייב:   
                                                                                                                                         בא כוח:   $UserName  ";
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 32, true);

	$txt = " אל:    $toName
 בכתובת:  $toAddress";
	$pdf->MultiCell(120, 15, $txt, 1, 'R', 0, 1, 70, 52, true);



	/////////////////////////////////      visits    /////////////////////////////////////////////////////
	$pdf->SetFont('freesans','',9); 
	$txt = " ביקור 1 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 73, true);
	$pdf->SetFont('freesans','',7); 
	$txt = "                                 שם שליח                                                       שנה חודש יום                 שעה     "; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 76, true);

	$pdf->SetFont('freesans','',9); 
	$txt = " ביקור 2 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
	$pdf->MultiCell(180, 30, $txt, 0, 'R', 0, 1, 12, 84,true);
	$pdf->SetFont('freesans','',7); 
	$txt = "                                 שם שליח                                                       שנה חודש יום                 שעה     "; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 87, true);

	$pdf->SetFont('freesans','',9); 
	$txt = " ביקור 3 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
	$pdf->MultiCell(180, 30, $txt, 0, 'R', 0, 1, 12, 95, true);
	$pdf->SetFont('freesans','',7); 
	$txt = "                                 שם שליח                                                       שנה חודש יום                 שעה     "; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 98, true);
	////////////////////////////////////////////////////////////////////////////////////////////////////////






 	$pdf->SetFont('freesans','',9);
	$txt = "  [  ] מסרתי את הכתב לידיו                                                                              [  ] מסרתי את הכתב למורשה של הנעמן   "; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 110, true);

	$txt = "  [  ] בהעדרו מסרתי את הכתב ל______________   שהוא/יא  בן/ת  משפחתו/ה  הגר/ה  עימו  ונראה/ית  לי  שמלאו  לו/ה  18  שנה"; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 115, true);

	$txt = "  [  ] מסרתי את הכתב למורשה חתימה בית העסק                                          [  ]  הכתובת שגויה"; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 120, true);

	$txt = "  [  ]  העתיק מקום מגוריו לכתובת בלתי ידועה                                                 [  ]  סרב לחתום אך קיבל לידיו את הכתב"; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 125, true);
	$txt = "  [  ]  סרב לקבל ולחתום הכתב הכתב נשאר ___________________________________________"; 
	$pdf->MultiCell(180, 0, $txt, 0, 'R', 0, 1, 12, 130, true);




	$txt = "_____________________________________                       _______________               _______________                     ";  
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 155, true);
	$pdf->SetFont('freesans','',7);
	$txt = "                                  חתימת  המקבל                                             תאריך                                                                          השליח (המוסר)   חתימת השליח";  
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 159, true);


 
$pdf->SetFont('freesans','',8);
$pdf->MultiCell(200, 0,  $IDInvitation." id ", 0, 'R', 0, 1, 1, 273 , true);

$pdf->Output(__DIR__ . "/../PHP/uploads/$IDInvitation/אישור מסירה הוצלפ.pdf", 'F');
 
 
return "אישור מסירה הוצלפ.pdf";
}

  
  

function LegalProofOfDelivery($UserName="",$UserAddress="",$UserMobile="",$CaseNumber="",$Case="",$toName="",
                              $toAddress="",$IDInvitation):string     
{
	
	
 /*
	$UserName="עו''ד שמוליק ";  // שם המשתמש
	$UserAddress="הרצל 18 קומה 1 הרצליה פיתוח";  // כתובת המשתמש
	$UserMobile="0528526548";  // טלפון המשתמש
	$CaseNumber="12345-08-20";  // מס תיק  
	$Case="התראה/תביעה";  // הכתב
	$toName="אבי נעלבי";  // שם הנעמן
	$toAddress="כ/5  חיפה";  // כתובת הנעמן
	$IDInvitation="21"; // אי די של ההזמנה
 */

 
require_once('TCPDF/tcpdf.php');


//make TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
 
//add page
$pdf->AddPage();

 
$pdf->SetFont('freesans','',17);
$pdf->Cell(0 ,5,'אישור מסירה',0,1,'C' ); 
$pdf->SetFont('freesans','',10);  
$pdf->Ln(1);
 
$txt = "החזר אישור מסירה זה אל:"; 
$pdf->MultiCell(80, 0, $txt, 0, 'R', 0, 1, 115, 25, true); 
$txt = " שם: $UserName\n\n כתובת: $UserAddress \n\n טלפון: $UserMobile ";
$pdf->MultiCell(100, 30, $txt, 1, 'R', 0, 1, 95, 30, true);


$txt = " מס' תיק: $CaseNumber\n הכתב: $Case";
$pdf->MultiCell(70, 30, $txt, 0, 'R', 0, 0, 5, 30, true);
 

$pdf->SetFont('freesans','',13);
$txt = "    אל:  __________________________________________________________________\n\n    המען:  _________________________________________________________________";  
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 70, true);
$pdf->SetFont('freesans','',12);  
$txt = "               $toName\n\n                  $toAddress"; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 70, true);





/////////////////////////////////      visits    /////////////////////////////////////////////////////

$pdf->SetFont('freesans','',11); 
$txt = " ביקור 1 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 100, true);
$pdf->SetFont('freesans','',8); 
$txt = "                                      שם שליח                                                             שנה חודש יום                 שעה     "; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 105, true);
 
 

$pdf->SetFont('freesans','',11); 
$txt = " ביקור 2 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 115, true);
$pdf->SetFont('freesans','',8); 
$txt = "                                      שם שליח                                                             שנה חודש יום                 שעה     "; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 120, true);
 
 


$pdf->SetFont('freesans','',11); 
$txt = " ביקור 3 אני ____________ מצהיר שבתאריך ____________    _______  באתי למען של הנ''ל    [  ]   ואיש לא היה בבית"; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 130, true);
$pdf->SetFont('freesans','',8); 
$txt = "                                      שם שליח                                                             שנה חודש יום                 שעה     "; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 135, true);
////////////////////////////////////////////////////////////////////////////////////////////////////////


 


$pdf->SetFont('freesans','',11);
$txt = "  [  ] מסרתי את הכתב לידיו"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 150, true);
$txt = "  [  ] מסרתי את הכתב למורשה של הנעמן"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 160, true);
$txt = "  [  ] בהעדרו מסרתי את הכתב ל____________________________________________________
     שהוא/יא  בן/ת  משפחתו/ה  הגר/ה  עימו  ונראה/ית  לי  שמלאו  לו/ה  18  שנה"; 
$pdf->MultiCell(0, 20, $txt, 0, 'R', 0, 1, 0, 170, true);
$txt = "  [  ]  סרב לקבל ולחתום הכתב הכתב נשאר ___________________________________________"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 190, true);
$txt = "  [  ]  סרב לחתום אך קיבל לידיו את הכתב"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 200, true);





$txt = " _____________________________                             ______________                       _____________       ";  
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 260, true);
$pdf->SetFont('freesans','',8);
$txt = "                חתימת  המקבל                                                        תאריך                                                                          השליח (המוסר)   חתימת השליח";  
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 265, true);
 
  
 
$pdf->SetFont('freesans','',8);
$pdf->MultiCell(200, 0,  $IDInvitation." id ", 0, 'R', 0, 1, 1, 273 , true);


$pdf->Output(__DIR__ . "/../PHP/uploads/$IDInvitation/אישור מסירה משפטי.pdf", 'F');


return "אישור מסירה משפטי.pdf";
 
 
}

  
   
	 


function LegalAffidavit($deliveryName="",$deliveryID="",$UserName="",$CaseNumber="",$toAddress="",
						$VerificationSource="",$LawyerName="",$LawyerAddress="",$DepositionDay="",
						$DeliveredToFamilyMember="",$TypeOfCloseness="",$ModeOperation="",$Day1="",$Day2="",
						$DayDelivered="",$time1="",$time2="",$timeDelivered="",$IDInvitation,$RemarksField)  
{
    
	/*
	$deliveryName="סטס שש";  // שם השליח
	$deliveryID="123456789";  // תז של השליח
	$UserName="עו''ד שמוליק ";  // שם המשתמש
	$CaseNumber="12345-08-20";  // מס תיק 
	$toAddress="ארלוזורוב 34/5  חיפה";  // כתובת הנעמן
	$VerificationSource="שכן מקומה 2 דלת ימין  +  שילוט";  //  מקור אימות
	$LawyerName="עו''ד שמוליק את שמוליק";  // שם העורך דין החותם על התצהיר
	$LawyerAddress="נתנזון 1 חיפה ";  // כתובת העורך דין החותם על התצהיר
	$DepositionDay="25.9.20"; //היום שבוא נחתם התצהיר המשפטי
	$DeliveredToFamilyMember="יוסי"; //  נמסר לבן משפחה של הנמען
	$TypeOfCloseness="בן"; // סוג קרבה לנעמן
	$ModeOperation="בהעדרו מסרתי את הכתב ל";// אופן ביצוע המסירה -קיבל סירב הודבק וכו
	$Day1="20.9.20"; // ביקור 1
	$Day2="21.9.20"; // ביקור 2
	$DayDelivered="22.9.20"; // היום שבוא נמסרה המסירה
	$time1="8:00"; // שעה 1
	$time2="9:00"; // שעה 2
	$timeDelivered="10:00"; // בשעה שנמסרה 
	$IDInvitation אידי של ההזמנה על מנת שנדע באיזה תיקיה לשמור את הקובץ 
	$RemarksField  בערות לאם סירב וחתום או לקבל

 */
 
 
 
 
 
 
require_once('TCPDF/tcpdf.php');
 

//make TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
 
//add page
$pdf->AddPage();

 
$pdf->SetFont('freesans','',17);
$pdf->Cell(0 ,5,'תצהיר מוסר',0,1,'C' ); 
$pdf->SetFont('freesans','',10);  
 
 
 

$txt = "_____________                       ______________________                 "; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 25, true); 
$txt = "אני הח''מ   $deliveryName                                       נושא ת.ז.    $deliveryID           לאחר שהוזהרתי כי עליי לומר את האמת וכי 
אני צפוי לעונשים הקבועים בחוק לא אעשה כן מצהיר בזאת בכתב כדלקמן:"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 25, true); 
 
 
 
 
$txt = "       ____________________                           ____________________________________                                                    "; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 45, true); 
$txt = "אני מבצע כתבי דין עבור משרד:   $UserName                                                                  בתיק מס':   $CaseNumber"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 45, true); 
 
 
$txt = "                     _________________________________________________________    תאריך  __________________ "; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 52, true); 
$txt = "מקום ביצוע:   $toAddress                                                                                                                   $DayDelivered"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 52, true); 
 
 
 
 
  
$txt = "________________________________________________________________                     "; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 60, true); 
$txt = "מקור אימות:   $VerificationSource"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 60, true); 
 
 
 
 
  
$txt = "המסירה נמסרה:"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 68, true); 
 
 
 
$txt = "  [  ] מסרתי את הכתב לידיו";
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 75, true);
$txt = "  [  ] מסרתי את הכתב למורשה של הנעמן: ________________________________________"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 80, true);
$txt = "  [  ] בהעדרו מסרתי את הכתב ל________________________________________________
     שהוא/יא  בן/ת  משפחתו/ה  הגר/ה  עימו  ונראה/ית  לי  שמלאו  לו/ה  18  שנה"; 
$pdf->MultiCell(0, 20, $txt, 0, 'R', 0, 1, 0, 85, true);
$txt = "  [  ]  סרב לקבל ולחתום  הכתב נשאר במקום: ______________________________________"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 95, true);
$txt = "  [  ]  סרב לחתום אך קיבל לידיו את הכתב: ________________________________________"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 100, true);
 
 
$txt = "  [  ] הודבק על הדלת לאחר 3 ביקורים ביום  _________________  שעה: __________

                                                                       _________________  שעה: __________

                                                                       _________________  שעה: __________ "; 
$pdf->MultiCell(0, 30, $txt, 0, 'R', 0, 1, 0, 110, true);
 

$txt = "   אישור המסירה מצורך לתצהיר זה ומהווה חלק בלתי נפרד ממנו
   הנני מצהיר כי זה שמי וזו חתימתי וכל האמור לעיל אמת"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 140, true);
 

 
$txt ="
_________________        
               חתימת המצהיר





    אני הח''מ:    $LawyerName   מאשר בזה כי ביום:  _______________   $DepositionDay   הופיע בפני מר :    $deliveryName  במשרדי
  ברח':   $LawyerAddress  שזיהה את עצמו ע''י ת.ז מס':   $deliveryID  ולאחר שהזהרתיו כי עליו לומר את האמת
  וכי עליו לומר את האמת וכי יהיה צפוי לעונשים הקבועים בחוק אם לא אעשה כן
  
  אישר את הנכונות הצהרתו וחתם עליה
  




  
  
  
                                                                                                           חותמת וחתימת העו''ד   __________________";  
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 160, true);
 
  
  






 
 





 
if($ModeOperation=="נמסר לנמען")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 75, true);
}
else if($ModeOperation=="מסרתי את הכתב למורשה של הנעמן")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 80, true);
	$txt = "                                                                            $RemarksField"; 
    $pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 80, true);
}
else if($ModeOperation=="בן/ת משפחה")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 85, true);
	$txt = "                                                        $DeliveredToFamilyMember  -  $TypeOfCloseness "; 
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 85, true);
}
else if($ModeOperation=="סירב לחתום ולקבל -הושאר במקום")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 95, true);	
	$txt = "                                                                            $RemarksField"; 
    $pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 95, true);
}
else if($ModeOperation=="נמסר לנמען אך סירב לחתום")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 100, true);	
	$txt = "                                                                         $RemarksField"; 
$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 100, true);

}
else if($ModeOperation=="ביקור שלישי הודבק במקום")
{
	$pdf->MultiCell(0, 0,"X   ", 0, 'R', 0, 1, 10, 110, true);
	
	
	$txt = "$time1                              $Day1                                                                           "; 
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 110, true);
	
	$txt = "$time2                              $Day2                                                                           "; 
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 118, true);
	
		
	$txt = "$timeDelivered                              $DayDelivered                                                                           "; 
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0, 127, true);
	
 
}
 
 
 
 
$pdf->SetFont('freesans','',8);
$pdf->MultiCell(200, 0,  $IDInvitation." id ", 0, 'R', 0, 1, 1, 273 , true);

 $pdf->Output(__DIR__ . '/../PHP/uploads/'.$IDInvitation.'/תצהיר משפטי לא חתום.pdf', 'F');

 $pdf->Output();
 
return "תצהיר משפטי לא חתום.pdf";  

 

}
   

 
 
 
 
 
 
 
 
 
 
 

function IssuedAffidavit($deliveryName,$deliveryID,$deliveryAddress,$UserName,$toAddress,$VerificationSource="",$LawyerName,
					     $DepositionDay,$LawyerAddress,$LawyerNumber,$TypeCase,$DeliveredToFamilyMember="",
						 $TypeOfCloseness="",$RefusedToSign="",$RefusedToAccept="",$HowitWasDone,$timeDelivered,
						 $DayDelivered,$time2="",$Day2="",$time1="",$Day1="",$IDInvitation) 
{

/*



$deliveryName         שם השליח   
$deliveryID           תז של השליח המבצע   
$deliveryAddress  כתובת השליח ----- צריך להוסיףף בקוד של השרת SESSON   !!!!!!!!!!!!!
$UserName             שם המשתמש
$toAddress            הנעמן הנמען
$VerificationSource   מקור אימות
$LawyerName           שם העו''ד החותם על התצהיר      
$DepositionDay        יום שבוא נחתם התצהיר    
$LawyerAddress        כתובת העו''ד החותם על התצהיר
$LawyerNumber         מספר רישיון העו''ד החותם על התצהיר
$TypeCase             סוג המכתב התראה-אזהרה
$DeliveredToFamilyMember    מסירה לבן משפחה שם המקבל 
$TypeOfCloseness      מסירה לבן משפחה סוג קרבה
$RefusedToSign        סירב לחתום 
$RefusedToAccept      סירב לקבל 
$HowitWasDone         איך בוצע המסירה
$timeDelivered        שעת ביצוע
$DayDelivered         יום הביצוע            
$time2          שעה של ביקור 2 
$Day2           ביקור 2 
$time1          שעה של ביקור 1
$Day1           ביקור 1 
$IDInvitation   אידי של ההזמנה
*/ 
 
  
 
 
 
 

require_once('TCPDF/tcpdf.php');
   


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
$pdf->setPrintHeader(false);

 
 // add a page
$pdf->AddPage();
 
   
 
 
	
$pdf->SetFont('freesans','',10); 

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image

$pdf->Image('../PHP/TCPDF/IMG/AAAA.jpg', 0, 0, 215, 297, 'JPG', '', '', false, 300, '', false, false, 0);

// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();






 //$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, גובה, true);


$txt = "           $deliveryName";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 92, true); 
$txt = "$deliveryID                                                                              ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 92, true);
$txt = "                                                                                                                                                         $deliveryAddress";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 92, true);


$txt = "                                                                                            $UserName";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 106, true);

   


$txt = "                         $toAddress";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 120, true);
$txt = " $DayDelivered                                                                                                                       ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 120, true);

  



$txt = "               $VerificationSource";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 147.5, true);

$pdf->SetFont('freesans','',12);  
$txt = "X";
$pdf->MultiCell(191, 0,$txt, 0, 'R', 0, 1, 0, 147.5, true);
$pdf->SetFont('freesans','',10); 

  


$txt = "         $LawyerName ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 244, true); 
$txt = "$DepositionDay                                                                                          ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 244, true); 
$txt = "                                                                                                                                            $deliveryName";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 244, true);


  
$txt = "                 $LawyerAddress";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 249, true);
$txt = "$deliveryID                                                                                                            ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 249, true);

  
    
$txt = "$LawyerNumber                     ";
$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 259, true);

    
  

$pdf->SetFont('freesans','',12);  
if($TypeCase=="הוצל'פ-אזהרה") 
{
	$pdf->MultiCell(187.5, 0,"X", 0, 'R', 0, 1, 10, 157, true);
}
else
{
	$pdf->MultiCell(187.5, 0,"X", 0, 'R', 0, 1, 10, 161.5, true);
} 
$pdf->SetFont('freesans','',10);  


  
 

if($HowitWasDone=="נמסר לנמען")
{
	
	$pdf->SetFont('freesans','',12);  
	$pdf->MultiCell(0, 0,"X  ", 0, 'R', 0, 1, 0, 170, true);
	$pdf->SetFont('freesans','',10);  
	
}
else if($HowitWasDone=="בן/ת משפחה")
{
	$txt = "                                                                                                               $DeliveredToFamilyMember  
                                               $TypeOfCloseness"; 
	$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 193, true);
	$pdf->SetFont('freesans','',12);  
	$pdf->MultiCell(198.5, 0,"X", 0, 'R', 0, 1, 0, 193, true);
	$pdf->SetFont('freesans','',10);  


}  
else if($HowitWasDone=="נמסר לנמען אך סירב לחתום")
{
	$txt = "                                                                                                     $RefusedToSign";
	$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 219, true);
	$pdf->SetFont('freesans','',12);  
	$pdf->MultiCell(198.5, 0,"X", 0, 'R', 0, 1, 0, 219, true);
	$pdf->SetFont('freesans','',10);  

}  
else if($HowitWasDone=="סירב לחתום ולקבל -הושאר במקום")
{
	$txt = "                                                                                $RefusedToAccept";
	$pdf->MultiCell(190, 0, $txt, 0, 'R', 0, 1, 0, 214.5, true);
	$pdf->SetFont('freesans','',12);  
	$pdf->MultiCell(198.5, 0,"X", 0, 'R', 0, 1, 0, 214.5, true);
	$pdf->SetFont('freesans','',10);  
 
}   
else if($HowitWasDone=="ביקור שלישי הודבק במקום")
{
	$pdf->SetFont('freesans','',12);  
	$pdf->MultiCell(198.5, 0,"X", 0, 'R', 0, 1, 0, 204, true);
	$pdf->SetFont('freesans','',10);  
 
  
	$txt = "$timeDelivered                   $DayDelivered                      $time2                 $Day2                       $time1                $Day1                     ";
	$pdf->MultiCell(0, 0, $txt, 0, 'R', 0, 1, 0,208.5, true);
	 
 
}  




$pdf->SetFont('freesans','',7);
$pdf->MultiCell(9, 0,  $IDInvitation." id ", 0, 'R', 0, 1, 1, 2 , true);  



   
 //  $pdf->Output('name.pdf', 'I');

$pdf->Output(__DIR__ . '/../PHP/uploads/'.$IDInvitation.'/תצהיר הוצלפ לא חתום.pdf', 'F');
$pdf->Output();

return "תצהיר הוצלפ לא חתום.pdf";  

}

 
 

?> 


 