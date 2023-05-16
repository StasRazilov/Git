<?php
require_once "dbClass.php";
require_once  '../CLASS/Invitation.php';

$db = new dbClass();
     
 



if($_SESSION['Invitation']->getOrderType()=='מסירה משפטית')
{
    //echo "<br>".$_SESSION['Invitation']->getTheNameOfTheCustomer();
    //echo "<br>".$_SESSION['Invitation']->getOrderType();
    //echo "<br>".$_SESSION['Invitation']->getAddress();
    //echo "<br>".$_SESSION['Invitation']->getFiles();
    //echo "<br>".$_SESSION['Invitation']->getRemarks();
    //echo "<br>".$_SESSION['Invitation']->getCaseNumber();
    //echo "<br>".$_SESSION['Invitation']->getThanTheSiteRules();
    //echo "<br>".$_SESSION['Invitation']->getToID();
    //echo "<br>".$_SESSION['Invitation']->getFILEpath();
    //echo "<br>".$_SESSION['Invitation']->getPhoneOfTheRecipient();
    //echo "<br>".$_SESSION['Invitation']->getDeliveryType()."<br><br><br><br><br> ";
    
   
    
    $db->delivery($_SESSION['Invitation']->getAddress(),$_SESSION['Invitation']->getCaseNumber(),$_SESSION['Invitation']->getOrderType(),
                  $_SESSION['Invitation']->getTheNameOfTheCustomer(),$_SESSION['Invitation']->getPhoneOfTheRecipient(),
                  $_SESSION['Invitation']->getFiles(),$_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                  $_SESSION['Invitation']->getToID(),"עבר לבדיקת המשרד",$_SESSION['Invitation']->getDeliveryType(),$_SESSION['Invitation']->getPrice());
    
    
    $SizeArrFiles=$_SESSION['Invitation']->getSizeArrFiles(); // count files
 
    $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles());
    

    
    $db=null;
    unset($_SESSION['Invitation']);


}
else if($_SESSION['Invitation']->getOrderType()=='הגשה')  
{	

    //echo "<br>".$_SESSION['Invitation']->getTheNameOfTheCustomer();
    //echo "<br>".$_SESSION['Invitation']->getOrderType();
    //echo "<br>".$_SESSION['Invitation']->getAddress();
    //echo "<br>".$_SESSION['Invitation']->getRemarks();
    //echo "<br>".$_SESSION['Invitation']->getThanTheSiteRules();
    //echo "<br>".$_SESSION['Invitation']->getFiles();

    $db->submission($_SESSION['Invitation']->getAddress(),$_SESSION['Invitation']->getTheNameOfTheCustomer(),
                    $_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                    "עבר לבדיקת המשרד",$_SESSION['Invitation']->getOrderType(),$_SESSION['Invitation']->getFiles(),$_SESSION['Invitation']->getPrice());



    $SizeArrFiles=$_SESSION['Invitation']->getSizeArrFiles(); // count files
     
    $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles());
    


    $db=null;
    unset($_SESSION['Invitation']);
}
else if($_SESSION['Invitation']->getOrderType()=='איתור כתובת') 
{	

    //echo "<br>".$_SESSION['Invitation']->getTheNameOfTheCustomer();
    //echo "<br>".$_SESSION['Invitation']->getOrderType();
    //echo "<br>".$_SESSION['Invitation']->getPhoneOfTheRecipient();
    //echo "<br>".$_SESSION['Invitation']->getRemarks();
    //echo "<br>".$_SESSION['Invitation']->getThanTheSiteRules();
    //echo "<br>".$_SESSION['Invitation']->getToID:();

   


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
	





	  