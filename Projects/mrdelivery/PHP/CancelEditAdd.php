<?php
 /*
    echo "<br>AA<br><br><pre>";
    print_r($_POST);
    echo "</pre>";
 
    echo "<br>BB<br><br><pre>";
    print_r($_FILES);
    echo "</pre>";
   
    echo "<br>BB<br><br><pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    die("<br><br><br><br><br> ");
 */
 
require_once "dbClass.php";
$db  = new dbClass();

$IDInvitation=$_POST['submit']; //   id invitation
  
 
if($_POST['action']=="אישוריםחתומים")
{ 
    $uploadfile = "uploads/$IDInvitation/" . $_FILES['SignedDeliveryConfirmation']['name'];
    move_uploaded_file($_FILES['SignedDeliveryConfirmation']['tmp_name'], $uploadfile) ;


  
    $uploadfile ="uploads/$IDInvitation/" . $_FILES['SignedAffidavit']['name'];
    move_uploaded_file($_FILES['SignedAffidavit']['tmp_name'], $uploadfile) ;
    
    $nameFile1=$_FILES['SignedDeliveryConfirmation']['name'];
    
    $nameFile2=$_FILES['SignedAffidavit']['name'];
  

    $db->UpdateOfDeliveryConfirmationAndAffidavit($nameFile1,$nameFile2,$IDInvitation);
   
    $db=null; 
    echo "<script type=\"text/javascript\">window.alert(' אישור מסירה והתצהיר החתום הוספו ');window.location.href = '../Pages/MasterInvitations.php';</script>";
    return;
}
else if($_POST['action']=="עריכתהזמנה")
{
        $OrderType=$_POST['OrderType'];

    
        // update CaseNumber from invitation
        if (!empty($_POST ['CaseNumber']))
        {
            $db->InvitationUpdateCaseNumber($_POST['CaseNumber'],$IDInvitation);
        }	 
        
        // update name recipient from invitation
        if (!empty($_POST ['FullNameOfTheRecipient']))
        {
            $db->InvitationUpdateFullNameOfTheRecipient($_POST['FullNameOfTheRecipient'],$IDInvitation);
        }

        //  update ID The recipient from invitation
        if (!empty($_POST ['toID']))
        {
            $db->InvitationUpdatetoID($_POST ['toID'],$IDInvitation);
        }	
        
        //   update phone from invitation
        if (!empty($_POST ['PhoneOfTheRecipient']))
        {
            $db->InvitationUpdatePhoneOfTheRecipient($_POST['PhoneOfTheRecipient'],$IDInvitation);
        }	

    	
        //  update address for invitation
        if (!empty($_POST ['Address']))
        {
            $db->InvitationUpdateAddress($_POST['Address'],$IDInvitation);
        }	
 	   	

        if (!empty($_POST ['Remarks']))
        {
            $db->InvitationUpdateRemarks($_POST['Remarks'],$IDInvitation);
        }	
 	
 	if($OrderType=="מסירה משפטית")
 	{

        $db->InvitationUpdateDeliveryType($_POST['DeliveryType'],$IDInvitation);

 		$db->InvitationUpdateFilesDeliveryType($IDInvitation);


        $db=null; 
        echo "<script type=\"text/javascript\">window.alert(' עודכנו הפרטים בהזמנה מספר $IDInvitation כולל קובץ אישור מסירה');window.location.href = '../Pages/MasterInvitations.php';</script>";
        return; 
 	}
 	else
 	{
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert(' עודכנו הפרטים בהזמנה מספר $IDInvitation');window.location.href = '../Pages/MasterInvitations.php';</script>";
        return; 
 	}
	 
 
     
    
}



 
  
 
$db=null; 
echo "<script type=\"text/javascript\">window.alert('כלום');window.location.href = '../Pages/MasterInvitations.php';</script>"; 

 
 /*
 
require_once "dbClass.php";
$db = new dbClass();

   




$db=null; 
echo "<script type=\"text/javascript\">window.alert('כלום');window.location.href = '../Pages/MasterInvitations.php';</script>"; 

 */
   
 
?>	
	
	 
  
   
	
	 