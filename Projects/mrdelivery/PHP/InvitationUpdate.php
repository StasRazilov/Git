 <?php

  
	
include 'dbClass.php';
$db = new dbClass();
  
   /*
    echo "<br>AAA<pre>";
    print_r($_POST);
    echo "</pre>";
    
    
    die("<br><br><br><br><br> ");
  */
 
    

$IdInvitation=$_POST['IdInvitation'];

 
if(!empty($_POST ['OrderType']))  
{
    
     	//  update name recipient from invitation
    	if (!empty($_POST ['Submission']))  
    	{
    		$db->InvitationUpdateFullNameOfTheRecipient($_POST['Submission'],$IdInvitation);
    	}	
    	 
   
    	
        //  update remarks for invitation
    	if (!empty($_POST ['Remarks']))	 
    	{
    		$db->InvitationUpdateRemarks($_POST['Remarks'],$IdInvitation);
    	}
    
        	
        //   update CaseNumber from invitation
    	if (!empty($_POST ['CaseNumber']))	 
    	{
    		$db->InvitationUpdateCaseNumber($_POST['CaseNumber'],$IdInvitation);
    	}
   
    
        //   update ID The recipient from invitation
    	if (!empty($_POST ['toID']))	 
    	{
    		$db->InvitationUpdatetoID($_POST['toID'],$IdInvitation);
    	}
   
    
        //   update phone from invitation
    	if (!empty($_POST ['PhoneOfTheRecipient']))	 
    	{
    		$db->InvitationUpdatePhoneOfTheRecipient($_POST['PhoneOfTheRecipient'],$IdInvitation);
    	}
   
    
      
        //   update type invitation
    	if (!empty($_POST ['DeliveryType']))	 
    	{
    		$db->InvitationUpdateDeliveryType($_POST['DeliveryType'],$IdInvitation);
    	} 
    
      

        if($_POST ['OrderType']=="מסירה משפטית")
        {
     		$db->InvitationUpdateFilesDeliveryType($IdInvitation);
        }
        
  
      
      

    

 /*
		
	echo "<br>b22222222bb<pre>";
	print_r($AllDataInvitation);
	echo "</pre>";

	die("<br><br><br><br><br> ");
*/
 
   

}










   
$db=null;
echo "<script   type=\"text/javascript\">window.alert('הזמנה מספר $IdInvitation עודכנה');window.location.href = '../Pages/UserViewingOrders.php';</script>"; 
return; 






 
  
  
   
 


?>
 
 
  