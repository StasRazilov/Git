<?PHP 
   
include('dbClass.php');
$db = new dbClass();



if($_POST ['MOBILEPHONE']=="87948549536"||$_POST ['EMAIL']=="no-replyMa@gmail.com"||$_POST ['USERNAME']=="Mike Wilson")
{
    echo "<script type=\"text/javascript\">window.alert('go fuck yourself mike');window.location.href = '../Pages/contact.php';</script>"; 
}
else
{ 
        
    $DateMessages = date( 'd.m.y H:i:s', time());  //  now time and date
     
      
    
    if($_POST ['submit']=="Contact")
    {
        
        $TextgMessage="מאת <br>".$_POST ['USERNAME']."<br>טלפון<br>".$_POST ['MOBILEPHONE']."<br>מייל<br>".$_POST ['EMAIL']."<br><br><br>תוכן<br>".$_POST ['ReferralContent'];
         
        $db->ContactSaveMessage($TextgMessage,$DateMessages);
        
        echo "<script type=\"text/javascript\">window.alert('ההודעה התקבלה בהצלחה - נחזור אלייך בהקדם');window.location.href = '../Pages/contact.php';</script>"; 
    
    
     
    }
    else
    {
      

    if (empty($_POST ['RequestSubject']))
    { 
        echo "<script type=\"text/javascript\">window.alert('לא נבחר נושא פניה');window.location.href = '../Pages/UserLeavingMessage.php';</script>";
    } 	 
    else if (empty($_POST ['ReferralContent']))
    { 
        echo "<script type=\"text/javascript\">window.alert('לא הוקלט תוכן הפניה');window.location.href = '../Pages/UserLeavingMessage.php';</script>";
    } 
    
    

    if ($_POST ['RequestSubject']=="הקפאה/ביטול הזמנה")
    { 
        if (empty($_POST ['OrderNumber']))   //   id invitation
        { 
            echo "<script type=\"text/javascript\">window.alert('לא הוכנס מספר הזמנה');window.location.href = '../Pages/UserLeavingMessage.php';</script>";
        } 
        else
        { 
            $TextgMessage = "<b>".$_POST ['RequestSubject']." - מספר הזמנה: ".$_POST ['OrderNumber']."</b><br><br>".$_POST ['ReferralContent']."<br><br><b><u>מאת</u></b>". 
    "<br><b>שם:</b>".$_SESSION['UserNow']->getUserName(). 
    "<br><b>מייל: </b>".$_SESSION['UserNow']->getEmail().
    "<br><b>טלפון: </b>".$_SESSION['UserNow']->getMobile().
    "<br><b>כתובת: </b>".$_SESSION['UserNow']->getStreet()."<br><br><b>תאריך: </b>".$DateMessages; 
        } 
    }
    else
    { 
        $TextgMessage = "<b>".$_POST ['RequestSubject']."</b><br><br>".$_POST ['ReferralContent']."<br><br><b><u>מאת</u></b>". 
                        "<br><b>שם: </b>".$_SESSION['UserNow']->getUserName(). 
                        "<br><b>מייל: </b>".$_SESSION['UserNow']->getEmail().
                        "<br><b>טלפון: </b>".$_SESSION['UserNow']->getMobile().
                        "<br><b>כתובת: </b>".$_SESSION['UserNow']->getStreet()."<br><br><b>תאריך: </b>".$DateMessages;    
    }
        
    	
    $db->SaveMessage($_SESSION['UserNow']->getIdUser(),$TextgMessage,$DateMessages);
    
    $db=null;
     
    echo "<script type=\"text/javascript\">window.location.href = '../Pages/UserMessage.php';</script>"; 
    
    
        
    }
      
   
}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
/*
    echo "<br>AAA<pre>";
    print_r($_POST);
    echo "</pre>";
    
    
    
    echo "<br>BBB<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    
    die("<br><br><br><br><br> ");
	
*/



?>




 
