<?php
require_once "dbClass.php";
require_once  '../CLASS/Invitation.php';

$db = new dbClass();
     
         
if($_GET["success"]=='true')
{
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

        $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles()); // function that transfers the file uploaded by the user in the order to the folder according to the ID number of the order



        $db=null;
        unset($_SESSION['Invitation']);
        echo "<script type=\"text/javascript\">window.alert('המסירה נוצרה');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 
        

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

        $db->renameFile($SizeArrFiles,$_SESSION['Invitation']->getFiles()); // function that transfers the file uploaded by the user in the order to the folder according to the ID number of the order



        $db=null;
        unset($_SESSION['Invitation']);
        echo "<script type=\"text/javascript\">window.alert('ההגשה נוצרה');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 
    }
    else if($_SESSION['Invitation']->getOrderType()=='איתור כתובת') 
    {
        $db->MustLocate($_SESSION['Invitation']->getTheNameOfTheCustomer(),$_SESSION['Invitation']->getOrderType(),$_SESSION['Invitation']->getPrice(),
                        $_SESSION['Invitation']->getPhoneOfTheRecipient(),$_SESSION['Invitation']->getRemarks(),$_SESSION['Invitation']->getThanTheSiteRules(),
                        $_SESSION['Invitation']->getToID(),"עבר לבדיקת המשרד");
 
     
        $db=null;
        unset($_SESSION['Invitation']);
        echo "<script type=\"text/javascript\">window.alert('הזמנת איתור נוצרה');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 
    }
 
    $db=null;

}
else// if the payment has not gone through
{
    $db=null;
    unset($_SESSION['Invitation']);
    

    array_map('unlink', glob("../PHP/uploads/0/*.*"));
    
    echo "<script type=\"text/javascript\">window.alert('התשלום לא עבר');window.location.href = '../Pages/UserInvitationOrder.php';</script>"; 
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
	





	  