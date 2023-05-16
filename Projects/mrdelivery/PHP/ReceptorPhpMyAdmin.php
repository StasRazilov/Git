<?php
require_once "dbClass.php";
 
$db = new dbClass();



 
	

if (empty($_POST ['USERNAME']))
{
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('לא הוקלט שם משתמש');window.location.href = '../Pages/registration.php';</script>"; 
    return;
}
else if(empty($_POST ['EMAIL']))
{
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('לא הוקלט מייל');window.location.href = '../Pages/registration.php';</script>"; 
    return;
}
else if(empty($_POST ['MOBILEPHONE']))
{
    $db=null;
    echo "<script type=\"text/javascript\">window.alert(' לא הוקלט טלפון נייד');window.location.href = '../Pages/registration.php';</script>"; 
    return;
}
else if(empty($_POST ['PASS1']))
{  
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('לא הוקלט סיסמא');window.location.href = '../Pages/registration.php';</script>"; 
    return;
} 
else if(!empty($_POST ['EMAIL']))
{
    $Email = $_POST["EMAIL"];

    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
    { 
        echo "<script type=\"text/javascript\">window.alert('המייל אינו תקין');</script>"; 
        $db=null;
        return; 
    }
} 

//  pass - size  5-20
$PASS1=strlen($_POST ['PASS1']);
if($PASS1<=4||$PASS1>20)
{
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('אורך הסיסמה שלך הוא  $PASS1  -  יש להגדיר את הסיסמה באורך של בין 5-20 תווים');window.location.href = '../Pages/registration.php';</script>"; 
    return;

}
 
if( $_POST ['PASS1'] != $_POST ['PASS2'] )
{ 
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('אימות סיסמא שגוי');window.location.href = '../Pages/registration.php';</script>"; 
    return;
}  


 
 
  
// add only delivery person
if(!(empty($_POST ['IDENTITYCARD'])))
{
    
	if (empty($_POST ['IDENTITYCARD']))
    { 
		$db=null;	
        echo "<script type=\"text/javascript\">window.alert('לא הוקלט תז של שליח');window.location.href = '../Pages/MasterAddCourier.php';</script>"; 
        return;
        
    }	 
    else if($db->checkIdentityCard($_POST ['IDENTITYCARD'],$_POST ['EMAIL']))
    {     
        $db->AddDeliverys($_POST ['USERNAME'],$_POST ['EMAIL'],$_POST ['MOBILEPHONE'],$_POST ['PASS1'],$_POST ['IDENTITYCARD'],$_POST ['ADDRESS'],$_POST ['ThanTheSiteRules']);   //   if registration is successful
        $db=null;
		echo "<script type=\"text/javascript\">window.alert('פרטים של השליח הוקלטו בהצלחה ');window.location.href = '../Pages/MasterAddCourier.php';</script>"; 
        return;
        
    }	 
    else
	{ 
        $db=null;
        echo "<script type=\"text/javascript\">window.alert('המייל או התז של השליח כבר קיימים במערכת');window.location.href = '../Pages/MasterAddCourier.php';</script>"; 
        return;	
	}
}




// add only user
if(!(empty($_POST ['USERNAME']))&&!(empty($_POST ['EMAIL']))&&!(empty($_POST ['MOBILEPHONE']))&&!(empty($_POST ['PASS1'])))
{ 
    
    if($_POST ['MOBILEPHONE']=="87948549536"||$_POST ['EMAIL']=="no-replyMa@gmail.com"||$_POST ['USERNAME']=="Mike Wilson")
    {
        echo "<script type=\"text/javascript\">window.alert('I told you already? go fuck yourself  mike');window.location.href = '../Pages/registration.php';</script>"; 
    }
    else
    {   
        if($db->AddUser($_POST ['USERNAME'],$_POST ['EMAIL'],$_POST ['MOBILEPHONE'],$_POST ['PASS1'],$_POST ['NAMEOfOFFICE'],$_POST ['ADDRESS'],$_POST ['ThanTheSiteRules']) )
        {   
            $db=null;   
            echo "<script type=\"text/javascript\">window.alert('מתחבר לחשבון');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 
            return; 
        }
        else
    	{
    		$db=null;
    		echo "<script type=\"text/javascript\">window.alert('המייל כבר קיים במערכת אז תתחבר ואל תאכל את הראש');window.location.href = '../Pages/Login.php';</script>"; 
    	    return; 
    	}
    }

} 



$db=null;



/*



	echo "-----------------------<br><br>POST<pre>";
	print_r($_POST);
	echo "</pre>";
		 
    echo "-----------------------<br><br>SESSION<pre>";
    print_r($_SESSION);
    echo "</pre>";
		
	echo "-----------------------<br><br>FILES<pre>";
	print_r($_FILES);
	echo "</pre>-----------------------";

	die("<br><br><br><br><br> ");
	
	
	
	
	
    

*/
?>
 