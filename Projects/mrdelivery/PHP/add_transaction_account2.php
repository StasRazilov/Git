<?php
  
require_once "dbClass.php";
require_once  '../CLASS/Invitation.php';

$db = new dbClass();
     
 



if($_SESSION['Invitation']->getOrderType()=='מסירה משפטית')
{

    $db->delivery($_SESSION['Invitation']->getAddress(),$_SESSION['Invitation']->getCaseNumber(),$_SESSION['Invitation']->getOrderType(),
                  $_SESSION['Invitation']->getTheNameOfTheCustomer(),$_SESSION['Invitation']->getPhoneOfTheRecipient(),
                  $_SESSION['Invitation']->getFiles(),$_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                  $_SESSION['Invitation']->getToID(),"עבר לבדיקת המשרד",$_SESSION['Invitation']->getDeliveryType(),$_SESSION['Invitation']->getPrice());
    
    
    $SizeArrFiles=$_SESSION['Invitation']->getSizeArrFiles(); // count files
 
    $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles()); // function that transfers the file uploaded by the user in the order to the folder according to the ID number of the order
    

    
    $db=null;
    unset($_SESSION['Invitation']);


}
else if($_SESSION['Invitation']->getOrderType()=='הגשה')  
{	


    $db->submission($_SESSION['Invitation']->getAddress(),$_SESSION['Invitation']->getTheNameOfTheCustomer(),
                    $_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                    "עבר לבדיקת המשרד",$_SESSION['Invitation']->getOrderType(),$_SESSION['Invitation']->getFiles(),$_SESSION['Invitation']->getPrice());



    $SizeArrFiles=$_SESSION['Invitation']->getSizeArrFiles(); // count files

    $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles()); // function that transfers the file uploaded by the user in the order to the folder according to the ID number of the order



    $db=null;
    unset($_SESSION['Invitation']);
}
else if($_SESSION['Invitation']->getOrderType()=='איתור כתובת') 
{	


    $db->MustLocate($_SESSION['Invitation']->getTheNameOfTheCustomer(),$_SESSION['Invitation']->getOrderType(),$_SESSION['Invitation']->getPrice(),
                    $_SESSION['Invitation']->getPhoneOfTheRecipient(),$_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                    $_SESSION['Invitation']->getToID(),"עבר לבדיקת המשרד");

 
    $db=null;
    unset($_SESSION['Invitation']);
}

$db=null;





echo "<script type=\"text/javascript\">window.alert('ההזמנה נפתחה והועברה לטיפול');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 



 



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
	





	  