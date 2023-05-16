<?PHP
 
	

if (!empty($_POST ['Submission']))
{
    $pos = strpos( $_POST ['Submission'], '"'); 
    if ($pos !== false) 
    {
        echo "<script type=\"text/javascript\">window.alert(' אנא הקלט מקום הגשה בלי סוגרים  ');window.location.href = '../Pages/UserInvitationOrder.php';</script>";
    }  
}	 



if (!empty($_POST ['FullNameOfTheRecipient']))
{
    $pos = strpos( $_POST ['FullNameOfTheRecipient'], '"'); 
    if ($pos !== false) 
    {
        echo "<script type=\"text/javascript\">window.alert(' אנא הקלט מסירה בלי סוגרים  ');window.location.href = '../Pages/UserInvitationOrder.php';</script>";
    }  
}	 


if (!empty($_POST ['Address']))
{
    $pos = strpos( $_POST ['Address'], '"'); 
    if ($pos !== false) 
    {
        echo "<script type=\"text/javascript\">window.alert(' אנא הקלט כתובת בלי סוגרים  ');window.location.href = '../Pages/UserInvitationOrder.php';</script>";
    }  
}	 
   

include('dbClass.php'); 
$db = new dbClass();





//  function that returns the number of the last order in order to record it in the invoice
$MaxIDInvitations = $db->MaxIDInvitations();

 
 
 
  





 
  
 
if($_POST ['OrderType']=='איתור כתובת')
{	
     	
 
 
    // order details for the invoice
    $description="בעבור ".$_POST ['OrderType']." של ".$_POST ['FullNameOfTheRecipient']." תז:".$_POST ['toID']."   - מספר הזמנה ".$MaxIDInvitations;  	 


    $NewPrice=$_POST ['Price'];
    

     
    $_SESSION['Invitation'] = new Invitation($_POST ['FullNameOfTheRecipient'],$_POST ['OrderType'],"",$NewPrice,"", $_POST ['Remarks'],""
                                             ,$_POST ['PhoneOfTheRecipient'],$_POST ['ThanTheSiteRules'],$_POST ['toID'],"","",""); 


 
} 
else
{
    $SizeArrFiles=count($_FILES['FILE']['name']); // amount of files attached to the order
    
    
    $NewPrice=$_POST ['Price'];

    
    $NumberPagesPDF=0; // count pages from files
    
    for($i=0;$i<$SizeArrFiles;$i++)
    {
        $source_file =$db->SaveFILE($i);
        
        // sum all pages from files
        $pdftext = file_get_contents($source_file);
        $NumberPagesPDF += preg_match_all("/\/Page\W/", $pdftext, $dummy);
      
    }
      

     
     
     
     
     
     
      
     
     
     
    if($_POST ['OrderType']=='מסירה משפטית')
    {

        $description="בעבור ".$_POST ['OrderType']." ( ".$_POST ['DeliveryType']." ) ל".$_POST ['FullNameOfTheRecipient']." בכתובת: ".$_POST ['Address']." ".$_POST ['CITY'].' -    מספר הזמנה: '.$MaxIDInvitations;
    
        if (empty($_POST ['submit']))
        {

        
          
            $AllAddress=$_POST ['Address']."  -  ".$_POST ['CITY'];   //   full address
     
            $_SESSION['Invitation'] = new Invitation($_POST ['FullNameOfTheRecipient'],$_POST ['OrderType'],$AllAddress,$NewPrice,
                                                     $_FILES['FILE']['name'],$_POST ['Remarks'],$_POST ['CaseNumber'],$_POST ['PhoneOfTheRecipient'],
                                                     $_POST ['ThanTheSiteRules'],$_POST ['toID'],$source_file,$_POST ['DeliveryType'],$SizeArrFiles);
     
     
        }
    }
    
    else if($_POST ['OrderType']=='הגשה')
    {	
        $description="בעבור ".$_POST ['OrderType']." ל".$_POST ['Submission']." בכתובת:  ".$_POST ['Address']." ".$_POST ['CITY'].' -    מספר הזמנה: '.$MaxIDInvitations;
    
        if (empty($_POST ['submit']))
        {

             
            $AllAddress=$_POST ['Address']."  -  ".$_POST ['CITY'];   //   full address
     
            $_SESSION['Invitation'] = new Invitation($_POST ['Submission'],$_POST ['OrderType'],$AllAddress,$NewPrice,$_FILES['FILE']['name'],
                                                     $_POST ['Remarks'],"","",$_POST ['ThanTheSiteRules'],"",$source_file,"",$SizeArrFiles);
            
      
        }	
     
    } 
 
}
 
  
 
  
  
 
 
 
 


$db=null;




//    API greeninvoice

function CreditClearing(int $Price,string $NameUser,string $Email,string $Mobile,string $Street,string $description,string $EmailURL) 
{
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.greeninvoice.co.il/api/v1/account/token');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"id\": \"?????????????????????????????\",
  \"secret\": \"?????????????????????????\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
 
 
$TOKEN = curl_exec($ch);
curl_close($ch);
   


 

$NameUser=addslashes($NameUser);
$Street=addslashes($Street);


	
	
// add user
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.greeninvoice.co.il/api/v1/clients');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
 \"name\": \"$NameUser\",
  \"active\": true,
  \"department\": \"Sales\",
  \"taxId\": \"\",
  \"accountingKey\": \"??????????\",
  \"paymentTerms\": 0,
  \"bankName\": \"\",
  \"bankBranch\": \"\",
  \"bankAccount\": \"\",
  \"address\": \"$Street\",
  \"city\": \"\",
  \"zip\": \"?????????\",
  \"country\": \"IL\",
  \"category\": 16,
  \"subCategory\": 1602,
  \"phone\": \"$Mobile\",
  \"fax\": \"\",
  \"mobile\": \"$Mobile\",
  \"remarks\": \"\",
  \"contactPerson\": \"Ido\",
  \"emails\": [\"$Email\"],
  \"labels\": []
}");

 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type:application/json",
    "Authorization: Bearer $TOKEN"
));
 
$response = curl_exec($ch);
curl_close($ch);
 
 
   
  
  
 // checking if a user already exists
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.greeninvoice.co.il/api/v1/clients/search");
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"$NameUser\",
  \"active\": true,
  \"email\": \"\",
  \"contactPerson\": \"\",
  \"labels\": [],
  \"taxId\": \"\",
  \"page\": 1,
  \"pageSize\": 20
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer $TOKEN"
)); 
$response = curl_exec($ch);

$response = json_decode($response, true); // token will be with in this json
   
curl_close($ch);

 



	/*          18.10.2021 test
if($response[2]!="e")
{
	$response = json_decode($response, true);
	$idUserResponse = $response["id"];
}
else
{
	$response = json_decode($response, true);
	$idUserResponse = $response["errorMessage"];
}




echo "<br>1111111<pre>";
print_r($response["items"]["0"]["id"]);
echo "</pre>";


	die("<br><br><br><br><br> ");





  */

$idUserResponse =$response["items"]["0"]["id"];    //   id user
	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /**
// credit card
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.greeninvoice.co.il/api/v1/payments/form');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"description\": \"$description\",
  \"type\": 400,   
  \"lang\": \"he\",
  \"currency\": \"ILS\",
  \"vatType\": 0,
  \"amount\": $Price,
  \"maxPayments\": 1,
  \"pluginId\": \"?????????????\",
  \"client\": {
    \"id\": \"$idUserResponse\",
    \"name\": \"$NameUser\",
    \"emails\": [
      \"$Email\",
      \"$EmailURL\"
    ], 
    \"taxId\": \"\",
    \"address\": \"\",
    \"city\": \"\",
    \"zip\": \"\",
    \"country\": \"IL\",
    \"phone\": \"\",
    \"fax\": \"\",
    \"mobile\": \"\",
    \"add\": true
  },
  \"income\": [
    {
      \"catalogNum\": \".. \",
      \"description\": \".. \",
      \"quantity\": 1,
      \"price\": $Price,
      \"currency\": \"ILS\",
      \"vatType\": 1
    }
  ],
 
  \"successUrl\": \"https://mrdelivery.co.il/PHP/AddInvitation2.php\" 
}"); 
 

 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type:application/json",
    "Authorization: Bearer $TOKEN"
));
 
$response = curl_exec($ch);
 
curl_close($ch);
 
$response = json_decode($response, true); // token will be with in this json
 
  
return  $home= $response['url'];
// $home= $response['url'];
// readfile("$home"); // outputs contents of URL;

*/



 
 

 
$now_date=date("Y-m-d");
$next_date = date('Y-m-d', strtotime($now_date . ' +14 day'));

 

 


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.greeninvoice.co.il/api/v1/documents");
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);



curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"description\": \"$description\",
  \"footer\": \"$description\",
  \"emailContent\": \"$EmailURL\",
  \"type\": 300,
  \"date\": \"$now_date\",
  \"dueDate\": \"$next_date\",
  \"lang\": \"he\",
  \"currency\": \"ILS\",
  \"vatType\": 0,
  \"discount\": {
    \"amount\": 0,
    \"type\": \"sum\"
  },
  \"rounding\": true,
  \"signed\": true,
  \"attachment\": true,
  \"maxPayments\": 1,
  \"paymentRequestData\": {
    \"plugins\": [
      {
        \"id\": \"?????????????????????????????\",
        \"group\": 100,
        \"type\": 12010
      }
    ],
    \"maxPayments\": 1
  },
  \"client\": {
    \"id\": \"$idUserResponse\",
    \"name\": \"$NameUser\",
    \"emails\": [
      \"$Email\",
      \"$EmailURL\"
    ],  
    \"add\": true,
    \"self\": false
  },
  \"income\": [
    {
      \"description\": \"$description\",
      \"quantity\": 1,
      \"price\": $Price,
      \"currency\": \"ILS\",
      \"vatType\": 1
    }
  ],
  \"payment\": [
    {
      \"date\": \"$now_date\",
      \"type\": 2,
      \"price\": $Price,
      \"currency\": \"ILS\",
      \"currencyRate\": 1,
      \"bankName\": \"My Bank\",
      \"bankBranch\": \"???????\",
      \"bankAccount\": \".?????????\",
      \"chequeNum\": \".????????\",
      \"accountId\": \"??????\",
      \"transactionId\": \"??????????..\",
      \"appType\": 1,
      \"subType\": 1,
      \"cardType\": 2,
      \"cardNum\": \"??????\",
      \"dealType\": 2,
      \"numPayments\": 1,
      \"firstPayment\": 10
    }
  ], 
  \"linkType\": \"link\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type:application/json",
    "Authorization: Bearer $TOKEN"
));
 

$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true); // token will be with in this json
 
 


} 









$EmailURL="mrdelivery.ch@gmail.com";
 

$home=CreditClearing($NewPrice,$_SESSION['UserNow']->getUserName(),$_SESSION['UserNow']->getEmail(),$_SESSION['UserNow']->getMobile(),$_SESSION['UserNow']->getStreet(),$description,$EmailURL);

    
  
	
 
header("location:add_transaction_account2.php");
  
  
  

 
/*




    echo "<br>AAA<pre>";
    print_r($_POST);
    echo "</pre>";
    
    
    
    echo "<br>BBB<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    
    die("<br><br><br><br><br> ");
	
	
	
	
	
*/

 



/*


    
    echo "<br> $Price";
    echo "<br>$NameUser ";
    echo "<br>$Email ";
    echo "<br>$Mobile ";
    echo "<br>$Street ";
    echo "<br>$description ";
    
    
    
    echo "<br> $idUserResponse";
    echo "<br> $TOKEN";
    
    echo "<br>BBB<pre>";
    print_r($idUserResponse);
    echo "</pre>";
    
    
    die("<br><br><br><br><br> ");
    



*/	
  


















?>



 