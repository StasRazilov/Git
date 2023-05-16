<?php
/* 
    
    echo "<br>AAAAA<br><br><pre>";
    print_r($_POST);
    echo "</pre>";
    
    echo "<br>BBBBB<br><br><pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    die("<br><br><br><br><br> ");
 
*/
require_once "dbClass.php";
$db = new dbClass();
 

if (!empty($_POST ['View']))
{
        $_SESSION['View']=$_POST ['View'];
        $db=null;
        echo "<script type=\"text/javascript\">window.location.href = '../Pages/MasterInvitationsView.php';</script>"; 
        return;
} 
if (!empty($_POST ['submit']))  
{        
    if($_POST['submit']=="אישוריםחתומים"||$_POST['submit']=="עריכתהזמנה")
    {
        $submit=$_POST['submit'];
    

        if (!empty($_POST ['formDoor'])) 
        {
            $formDoor=$_POST ['formDoor']; // arr invitations
            $SizeArr= count($formDoor);
        }
        else 
        {
            $db=null;
            echo "<script   type=\"text/javascript\">window.alert(' $submit - לא נבחרה הזמנה בכלל');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
            return;
        }
        if($SizeArr>1)
        {
            $db=null;
            echo "<script   type=\"text/javascript\">window.alert(' $submit - לא ניתן לבחור כמה הזמנות לפעולה זו ');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
            return;
        }
      
        if($_POST['submit']=="אישוריםחתומים")
        {
            $CheckDelivery=$db->CheckInvitationOrderType($formDoor[0]);
            
            if($CheckDelivery==0)
            {
                $db=null;
                $formDoor=$formDoor[0];
            	echo "<script   type=\"text/javascript\">window.alert('הזמנה מספר $formDoor - היא הגשה לכן לא ניתן להוסיף לה אישורים חתומים');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
                return; 
            }
        }
     

        $_SESSION['submit']=$submit;
        $_SESSION['formDoor']=$formDoor[0];
        
        $db=null;
        header("location:../Pages/MasterCancelEditAdd.php");
        return;
     
    }
    else if($_POST['submit']=="ביטולהזמנה")
    {  
        
        $formDoor=$_POST ['formDoor']; //   arr invitations
        $SizeArr= count($formDoor);
       
       
       $MasterChecklockingCanceledDone=$db->MasterChecklockingCanceledDone($_POST ['formDoor'],$SizeArr);
     
       if($MasterChecklockingCanceledDone!="")
        {
            $db=null; 
            echo "<script type=\"text/javascript\">window.alert(' לא ניתן לבטל את ההזמנות הבאות - $MasterChecklockingCanceledDone כי הם לא עומדות בבדיקות הבאות: ההזמנה בוצע כבר בשטח או שהיא כבר בוטלה או שנעולה ');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
    		return;
        }
         
        $db->InvitationCancelReservation($_POST ['formDoor'],$SizeArr);
         
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert('ההזמנות   בוטלו');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
    	return;
    
    
       
    }
    else if($_POST['submit']=="שייך")
    {
        if (empty($_POST ['formDoor']))
        {
                $db=null;
        		echo "<script   type=\"text/javascript\">window.alert('לא נבחרו הזמנות לשיוך');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
                return;
        }
        if (empty($_POST ['EMAIL']))
        {
                $db=null;
        		echo "<script type=\"text/javascript\">window.alert('לא לא הוקלט מייל');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
                return;
        }
     
    
        $IDCourier=$db->checkEmailCourier($_POST['EMAIL']);
     
        if($IDCourier==NULL)
        {
            $db=null; 
            echo "<script type=\"text/javascript\">window.alert('שליח לא קיים חבר');window.location.href = '../Pages/MasterInvitations.php';</script>";
            return;
        }
        settype($IDCourier, "integer");
     
        
        $db->Affiliation($IDCourier,$_POST ['formDoor']);
      
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert('שוייך');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
        return;
    
    }
    else if($_POST['submit']=="צורתצהירמוסר")
    {
       
        if (empty($_POST ['formDoor']))
        {
                $db=null;
        		echo "<script type=\"text/javascript\">window.alert('לא נבחרו הזמנות לשיוך');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
        		return;
        } 
        
         
        $formDoor=$_POST ['formDoor']; // arr invitations
        $SizeArr= count($formDoor);
     

        for($i=0;$i<$SizeArr;$i++)
        { 
            $CheckDelivery=$db->CheckInvitationOrderType($formDoor[$i]);
     
            if($CheckDelivery==0)
            {
                $db=null;
                $formDoor=$formDoor[$i];
            	echo "<script   type=\"text/javascript\">window.alert('הזמנה מספר $formDoor היא הגשה לכן לא ניתן ליצור לה תצהיר מוסר לא חתום');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
                return; 
            } 
        }
     
     
        $MasterChecksIfTheOrdersHaveAlreadyBeenPlaced=$db->MasterChecksIfTheOrdersHaveAlreadyBeenPlaced($_POST ['formDoor'],$SizeArr);
     
        if($MasterChecksIfTheOrdersHaveAlreadyBeenPlaced!="") 
        {
            $db=null; 
            echo "<script type=\"text/javascript\">window.alert(' לא ניתן ליצור תצהיר מוסר להזמנות הבאות $MasterChecksIfTheOrdersHaveAlreadyBeenPlaced - כי הם לא עומדות בבדיקות הבאות: לא בוצע עדיין בשטח או שהיה שגוי');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
    		return;
        }
        
    
    
    
        $MasterChecksIfCanceledLocking=$db->MasterChecksIfCanceledLocking($_POST ['formDoor'],$SizeArr);
     
        if($MasterChecksIfCanceledLocking!="") 
        {
            $db=null; 
            echo "<script type=\"text/javascript\">window.alert(' לא ניתן ליצור תצהיר מוסר לא חתום להזמנות $MasterChecksIfCanceledLocking -  כי הם לא עומדות בבדיקות הבאות: ההזמנה נעולה כבר או בוטלה בעבר');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
    		return;
        }
        
     
     
        $db->UnsignedMoralAffidavit($_POST ['formDoor'],$SizeArr);
      
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert('נוצר תצהיר מוסר להזמנות/ה ');window.location.href = '../Pages/MasterInvitations.php';</script>";
       	return;
     
    }
    else if($_POST['submit']=="נעלהזמנה")
    { 
        
        if (empty($_POST ['formDoor']))
        {
                $db=null;
        		echo "<script type=\"text/javascript\">window.alert('לא נבחרו הזמנות לנעילה');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
        		return;
        }
        
        $formDoor=$_POST ['formDoor']; // arr invitations
        $SizeArr= count($formDoor);
      
      
        $MasterChecklocIfDone=$db->MasterChecklocIfDone($_POST ['formDoor'],$SizeArr);
        
        if($MasterChecklocIfDone!="")
        {
            $db=null; 
            echo "<script type=\"text/javascript\">window.alert(' לא ניתן לבטל את ההזמנות הבאות - $MasterChecklocIfDone כי הם לא עומדות בבדיקות הבאות: ההזמנה בוצע כבר בשטח או שהיא כבר בוטלה או שנעולה ');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
        	return;
        }
         
         
        $db->ClosedInvitation($_POST ['formDoor'],$SizeArr);
        $formDoor  = implode(" , ", $_POST ['formDoor']);
 
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert('ההזמנ/ות -   $formDoor   - ננעלו');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
     
    }
    else
    {
        $db=null; 
        echo "<script type=\"text/javascript\">window.alert('כלום');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
    }
    
    
         
}
else
{
    echo "<script type=\"text/javascript\">window.alert('לא נבחרה פעולה יחביבי');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
}



 


 
 
 
?>	
	
	 
  
   
	
	 