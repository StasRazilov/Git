<?php
   
 /*
	echo "<br>AAAA<pre>";
	print_r($_POST);
	echo "</pre>";
 	
	echo "<br>BBB<pre>";
	print_r($_FILES);
	echo "</pre>";
 	
  
	die("<br><br><br><br><br> ");
 */
  
  
  
  
if (empty($_POST ['Execution']))
{
    echo "<script type=\"text/javascript\">window.alert('לא נבחר אופן ביצוע');window.location.href = '../Pages/DeliveryTreatmentOrders.php';</script>"; 
    return;
}

  
  
require_once "../PHP/dbClass.php";
$db = new dbClass();
		
$PhotoName=$db->SavePhoto($_POST["submit"]);
 
    
if ($_POST ['OrderType']=="הגשה")
{
    
    $date3 = $_POST['date3'];
    $date3 = explode("-", $date3);
    $date3 = array_reverse($date3); // reverse the order.
    $date3 = implode("-", $date3);  // convert it back into a string.
 
    $db->DoSubmission($_POST["submit"],$PhotoName,$_POST["Execution"],$_POST["Remarks"],$date3);
    $db=null;
    echo "<script type=\"text/javascript\">window.alert('נשלח לסגירה');window.location.href = '../Pages/DeliveryTreatmentOrders.php';</script>"; 
    return;
} 


if ($_POST ['OrderType']=="מסירה משפטית")
{
    $TypeFamily="";
    $NAME="";
    $date1="";
    $date2="";
    $time1="";
    $time2="";

    
    if ($_POST ['Execution']=="ביקור שלישי הודבק במקום")
    {
        	
        $date1=$_POST['date1'];
        $time1=$_POST ['time1'];
        
        $date2=$_POST['date2'];
        $time2=$_POST ['time2'];
        

        $date1 = explode("-", $date1);
        $date1 = array_reverse($date1); // reverse the order.
        $date1 = implode("-", $date1);  // convert it back into a string.

        $date2 = explode("-", $date2);
        $date2 = array_reverse($date2); // reverse the order.
        $date2 = implode("-", $date2);  // convert it back into a string.
 
    }
    if ($_POST ['Execution']=="בן/ת משפחה")
    {
        $TypeFamily=$_POST ['TypeFamily'];
      
    }
    if (!empty($_POST ['NAME']))
    {
        $NAME=$_POST ['NAME'];

    }
  
    $date3 = $_POST['date3'];
    $date3 = explode("-", $date3);
    $date3 = array_reverse($date3); // reverse the order.
    $date3 = implode("-", $date3);  // convert it back into a string.
 
 
    $db->DoDelivery($_POST["submit"],$PhotoName,$_POST["Execution"],$_POST["Remarks"],$TypeFamily,$NAME,$date1,$date2,$date3,
                    $time1,$time2,$_POST ['time3'],$_POST["VerificationSource"]);
  
    $db=null;
    
     
    echo "<script type=\"text/javascript\">window.alert('נשלח לסגירה');window.location.href = '../Pages/DeliveryTreatmentOrders.php';</script>"; 
    return;
} 


  
 
 
 
 
?>	
	
	 
  
  
  
   
	
	 