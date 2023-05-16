<?php
require_once "dbClass.php"; 
$db = new dbClass();

 
  if (empty($_POST ['FullTextInvitation']))
{
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('לא הוקלט מסירה/הגשה');window.location.href = '../Pages/UserLeavingMessage.php';</script>"; 
    return;
}
else
{
    $db->AddManyInvitations($_POST ['FullTextInvitation'],$_POST ['Remarks'], $_SESSION['UserNow']->getFixedPrice(),"עבר לבדיקת המשרד");    

    $db=null;
    echo "<script type=\"text/javascript\">window.alert('נשמר');window.location.href = '../Pages/UserLeavingMessage.php';</script>"; 
    return;
    
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
	


 