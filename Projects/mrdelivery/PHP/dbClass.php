<?php 
require_once  'CreatePages.php';
require_once  '../CLASS/User.php';
require_once  '../CLASS/Invitation.php';
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
    
} 
  
 

class dbClass
{
 
 	private $host;
	private $db;
	private $charset;
 	private $user;
	private $pass;
	
	private  $opt=array(
	           PDO::ATTR_ERRMODE   =>PDO::ERRMODE_EXCEPTION,
		       PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
 
  
    private $connection;

	public function __construct(string $host="localhost",string $db="?????",string $charset="utf8",string $user="?????????",string $pass="???????")
	{
		$this->host=$host;
		$this->db=$db;
		$this->charset=$charset;
		$this->user=$user;
		$this->pass=$pass;
	}
	
	
	
	
	

	/*** connect for DB
	 * @return void
	 */
	private function connect()
	{
		$dns="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$this->connection=new PDO($dns,$this->user,$this->pass,$this->opt);
    }


	/*** disconnect from DB
	 * return void
	 */
	public function disconnect() 
	{
		$this->connection=null;
		 
	}
   
   
 

	/***  function add user
	 *  param $Username
	 *  param $Email
	 *  param $Mobilephone
	 *  param $Pass
	 *  param $NameOfOffice
	 *  param $Add
	 *  param $ThanTheSiteRules
	 *  return int
	 */
	public function AddUser($Username,$Email,$Mobilephone,$Pass,$NameOfOffice,$Add,$ThanTheSiteRules)   //  Introducing a new user to a database
	{
		$flag=1; // check flag if the user already exists - if so it will remain 1
		$this->connect();
 		$result = $this->connection->query("SELECT Email FROM `users`");
		
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if($Email==$row['Email'])
			{	
 				$flag=0;//  user does exist
			}
		}
		 
 
        
        if($flag)
		{ 
		    date_default_timezone_set("israel"); 
            $OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date

    		$Password=password_hash($Pass,PASSWORD_DEFAULT); // Password encoding
 
    		$into=$this->connection->exec("INSERT INTO users  VALUES (null,'$Email','$Username','$Password','0','2','$Mobilephone','$NameOfOffice','$Add','$OrderOpeningDate','$ThanTheSiteRules', '$Pass','0')");
     
    		$statement=$this->connection->prepare("SELECT * FROM users WHERE Email=:Email");
    		$statement->execute([':Email'=>$Email]);
    		$result=$statement->fetchObject('User');
      
     	 
    		$this->disconnect();
     	    $_SESSION['UserNow']=$result;
   
    		return 1; // user does not exist
		} 
		$this->disconnect();
		return 0;//  user does exist
 
		
 	}


 	/*** function add delivery person
	 *
	 *  param $Username
	 *  param $Email
	 *  param $Mobilephone
	 *  param $Pass
	 *  param $id
	 *  param $Add
	 *  param $ThanTheSiteRules
	 *  return void
	 */
	public function AddDeliverys($Username,$Email,$Mobilephone,$Pass,$id,$Add,$ThanTheSiteRules)   //  Introducing a new user to a database
	{ 
	    date_default_timezone_set("israel"); 
        $OrderOpeningDate=date( 'd.m.y H:i:s', time());  // now time and date

		$this->connect();
		$Password=password_hash($Pass,PASSWORD_DEFAULT); // password encryption
		$into=$this->connection->exec("INSERT INTO users  VALUES (null,'$Email','$Username','$Password','$id','3','$Mobilephone','','$Add','$OrderOpeningDate','$ThanTheSiteRules', '$Pass','0')");
     
		$this->disconnect();
 
 	}



	 

	/***   function that checks if the delivery person exists
	 * @param $id
	 * @param $Email
	 * @return int
	 */
	public function checkIdentityCard($id,$Email)
	{
		$this->connect();
		$result = $this->connection->query("SELECT * FROM `users`");
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if($id==$row['IdentityCard']||$Email==$row['Email'])
			{	
				$this->disconnect();
				return 0;//  delivery person does   exist
			}
		}
	return 1;//  delivery person does not exist
	}




 
	
	


/*** login user
 *  param string $Email
 *  param string $Pass
 *  return int
 */
public function checkEmailAndPass(string $Email,string $Pass) :int  
    {
		$this->connect();	 
		$result = $this->connection->query("SELECT * FROM `users`");
		 
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if(password_verify($Pass,$row['Password'])&&$Email==$row['Email'])
			{	
				$statement=$this->connection->prepare("SELECT * FROM users WHERE Email=:Email");
				$statement->execute([':Email'=>$Email]);
				$result=$statement->fetchObject('User');
	 	 
 			    $_SESSION['UserNow']=$result;
				$this->disconnect();

 
		        return $_SESSION['UserNow']->getPermissionsField();
		 
			}
		}
	return 0; // user does not exist
    }


 
  

/***  function add invitations for users VIP - not done!!!!
 *
 *  param $FullTextInvitation - string -  full data for invitation
 *  param $Remarks
 *  param $FixedPrice - price for user VIP
 *  param $StatusInvitation
 *  return void
 */
public function AddManyInvitations($FullTextInvitation,$Remarks,$FixedPrice,$StatusInvitation) 
{    
    $IdUser=$_SESSION['UserNow']->getIdUser(); // save id user
    date_default_timezone_set("israel"); 
    $OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date
    $HowitWasDone="טרם בוצע";
    $PriceStatus="טרם שולם";  

    $this->connect();   
    $into=$this->connection->exec("INSERT INTO invitation (`IDInvitation`, `TheNameOfTheCustomer`, `IDOfTheCustomer`, `OrderType`, `Address`, `Price`, `Files`, `ClosingFileSigned`, `ClosingFileUnsigned`, `Remarks`, `OrderOpeningDate`, `OrderClosingDate`, `IdUserInvitation`, `deliveryApproval`, `CaseNumber`, `ThanTheSiteRules`, `PhoneOfTheRecipient`, `StatusInvitation`, `IdDeliveryInvitation`, `nameCourier`, `HowitWasDone`, `DeliveryType`, `LawyerName`, `LawyerAddress`, `LawyerNumber`, `deliveryID`, `VerificationSource`, `TypeOfCloseness`, `DepositionDay`, `Day1`, `Day2`, `DayDelivered`, `time1`, `time2`, `timeDelivered`, `Photography`, `RemarksField`, `NameReceiver` , `OrderUpdateDate`, `OriginalAddress`, `FullTextInvitation`, `PriceStatus`)                                       
    VALUES (null,'','','','','$FixedPrice','','','','$Remarks','$OrderOpeningDate',0,'$IdUser','','','','','$StatusInvitation','0','','$HowitWasDone','','','','','','','','','','','','','','','','','',0,'','$FullTextInvitation','$PriceStatus')");
    
    $this->disconnect();
    
 }


	/*** function add invitation the statement of claim
	 *
	 *  param $AllAddress
	 *  param $CaseNumber
	 *  param $OrderType - type invitation
	 *  param $FullNameOfTheRecipient
	 *  param $PhoneOfTheRecipient
	 *  param $FILE
	 *  param $Remarks
	 *  param $ThanTheSiteRules
	 *  param $toID
	 *  param $StatusInvitation
	 *  param $DeliveryType - type of delivery (writ of execution - ochaa lapoal or legal)
	 *  param $Price
	 *  return void
	 */
public function delivery($AllAddress,$CaseNumber,$OrderType,$FullNameOfTheRecipient,
                         $PhoneOfTheRecipient,$FILE,$Remarks,$ThanTheSiteRules,$toID,$StatusInvitation,$DeliveryType,$Price) // introducing new user to database
	{
	   
    $FILES = implode("§", $FILE);
    date_default_timezone_set("israel"); 
  	$OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date
    $HowitWasDone="טרם בוצע";


    //  data of our attorney - example
    $LawyerName="עוד שמוליק שמוליק";
    $LawyerAddress="הרצל 123344 חיפה";
    $LawyerNumber="123456";
    
 
	$IdUser=$_SESSION['UserNow']->getIdUser(); // save id user for invitation
	$this->connect();   
	$into=$this->connection->exec("INSERT INTO invitation (`IDInvitation`, `TheNameOfTheCustomer`, `IDOfTheCustomer`, `OrderType`, `Address`, `Price`, `Files`, `ClosingFileSigned`, `ClosingFileUnsigned`, `Remarks`, `OrderOpeningDate`, `OrderClosingDate`, `IdUserInvitation`, `deliveryApproval`, `CaseNumber`, `ThanTheSiteRules`, `PhoneOfTheRecipient`, `StatusInvitation`, `IdDeliveryInvitation`, `nameCourier`, `HowitWasDone`, `DeliveryType`, `LawyerName`, `LawyerAddress`, `LawyerNumber`, `deliveryID`, `VerificationSource`, `TypeOfCloseness`, `DepositionDay`, `Day1`, `Day2`, `DayDelivered`, `time1`, `time2`, `timeDelivered`, `Photography`, `RemarksField`, `NameReceiver` , `OrderUpdateDate` , `OriginalAddress`, `FullTextInvitation`, `PriceStatus`)                      
    VALUES (null,'$FullNameOfTheRecipient','$toID','$OrderType','$AllAddress','$Price','$FILES','','','$Remarks','$OrderOpeningDate',0,'$IdUser','','$CaseNumber','$ThanTheSiteRules','$PhoneOfTheRecipient','$StatusInvitation','0','','$HowitWasDone','$DeliveryType','$LawyerName','$LawyerAddress','$LawyerNumber','','','','','','','','','','','','','',0,'$AllAddress','','')");
	  
   
	// last id invitation
	$result = $this->connection->query("SELECT MAX(IDInvitation) as max FROM invitation");
	$row = $result->fetch(PDO::FETCH_ASSOC);
    
    $structure = 'uploads/'.$row['max'];
    mkdir($structure, 0777, true);

	 
 // according to the type of order, we will create the appropriate form
 if($DeliveryType=="הוצל''פ-התראה"||$DeliveryType=="הוצל''פ-אזהרה")
 {
	 $deliveryApproval=ConfirmationOfDeliveryExecution($FullNameOfTheRecipient,$AllAddress,$CaseNumber,$_SESSION['UserNow']->getUserName(),
	                                 $toID,$_SESSION['UserNow']->getStreet(),$_SESSION['UserNow']->getMobile(),
									 $row['max']);  
 }
 else
 {
	$deliveryApproval=LegalProofOfDelivery($_SESSION['UserNow']->getUserName(),$_SESSION['UserNow']->getStreet(),
                     $_SESSION['UserNow']->getMobile(),$CaseNumber,$DeliveryType,$FullNameOfTheRecipient." ת.ז.   ".$toID,
					 $AllAddress,$row['max']);  
 }


	$id=$row['max']; // last id invitation for now save
	

	$into=$this->connection->exec("UPDATE `invitation` SET `deliveryApproval`='$deliveryApproval'   WHERE `IDInvitation`='$id'");
	$this->disconnect();
 		
 		
}


	/*** function add invitation the submission
	 *  param $AllAddress - full address
	 *  param $FullNameOfTheRecipient - to whom to submit
	 *  param $Remarks
	 *  param $ThanTheSiteRules
	 *  param $StatusInvitation
	 *  param $OrderType - type invitation
	 *  param $FILES
	 *  param $Price
	 *  return void
	 */
public function submission($AllAddress,$FullNameOfTheRecipient,$Remarks,$ThanTheSiteRules,$StatusInvitation,$OrderType,$FILES,$Price)   //  Introducing a new user to a database
{ 
    $FILES = implode("§", $FILES);
    
    date_default_timezone_set("israel"); 
  	$OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date
  	
  	 
    $HowitWasDone="טרם בוצע";

    $IdUser=$_SESSION['UserNow']->getIdUser();  // save id user
    $this->connect();   
    $into=$this->connection->exec("INSERT INTO invitation (`IDInvitation`, `TheNameOfTheCustomer`, `IDOfTheCustomer`, `OrderType`, `Address`, `Price`, `Files`, `ClosingFileSigned`, `ClosingFileUnsigned`, `Remarks`, `OrderOpeningDate`, `OrderClosingDate`, `IdUserInvitation`, `deliveryApproval`, `CaseNumber`, `ThanTheSiteRules`, `PhoneOfTheRecipient`, `StatusInvitation`, `IdDeliveryInvitation`, `nameCourier`, `HowitWasDone`, `DeliveryType`, `LawyerName`, `LawyerAddress`, `LawyerNumber`, `deliveryID`, `VerificationSource`, `TypeOfCloseness`, `DepositionDay`, `Day1`, `Day2`, `DayDelivered`, `time1`, `time2`, `timeDelivered`, `Photography`, `RemarksField`, `NameReceiver`, `OrderUpdateDate`, `OriginalAddress`, `FullTextInvitation`, `PriceStatus`)   
    VALUES (null,'$FullNameOfTheRecipient','','$OrderType','$AllAddress','$Price','$FILES','','','$Remarks','$OrderOpeningDate',0,'$IdUser','','','$ThanTheSiteRules','','$StatusInvitation','0','','$HowitWasDone','','','','','','','','','','','','','','','','','',0,'$AllAddress','','')");
    

	$result = $this->connection->query("SELECT MAX(IDInvitation) as max FROM invitation");
	$row = $result->fetch(PDO::FETCH_ASSOC);
    
    $structure = 'uploads/'.$row['max'];
    mkdir($structure, 0777, true);

    
    $this->disconnect();
    
  
 
}

  
  

/*** function creates an invitation locate debtor
 *
 *  param $TheNameOfTheCustomer
 *  param $OrderType
 *  param $Price - priceinvitation
 *  param $Remarks
 *  param $ThanTheSiteRules
 *  param $PhoneOfTheRecipient
 *  param $toID
 *  param $StatusInvitation
 *  return void
 */
public function MustLocate($TheNameOfTheCustomer,$OrderType,$Price,$Remarks,$ThanTheSiteRules,$PhoneOfTheRecipient,$toID,$StatusInvitation) 
{  
    date_default_timezone_set("israel"); 
  	$OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date
    $HowitWasDone="טרם בוצע";

    $IdUser=$_SESSION['UserNow']->getIdUser();  // save id user
 
  
    $this->connect();   
    $into=$this->connection->exec("INSERT INTO invitation (`IDInvitation`, `TheNameOfTheCustomer`, `IDOfTheCustomer`, `OrderType`, `Address`, `Price`, `Files`, `ClosingFileSigned`, `ClosingFileUnsigned`, `Remarks`, `OrderOpeningDate`, `OrderClosingDate`, `IdUserInvitation`, `deliveryApproval`, `CaseNumber`, `ThanTheSiteRules`, `PhoneOfTheRecipient`, `StatusInvitation`, `IdDeliveryInvitation`, `nameCourier`, `HowitWasDone`, `DeliveryType`, `LawyerName`, `LawyerAddress`, `LawyerNumber`, `deliveryID`, `VerificationSource`, `TypeOfCloseness`, `DepositionDay`, `Day1`, `Day2`, `DayDelivered`, `time1`, `time2`, `timeDelivered`, `Photography`, `RemarksField`, `NameReceiver`, `OrderUpdateDate`, `OriginalAddress`, `FullTextInvitation`, `PriceStatus`)   
    VALUES (null,'$TheNameOfTheCustomer','$toID','$OrderType','','$Price','','','','$Remarks','$OrderOpeningDate',0,'$IdUser','','','$ThanTheSiteRules','$PhoneOfTheRecipient','$StatusInvitation','0','','$HowitWasDone','','','','','','','','','','','','','','','','','',0,'','','')");
    
    $this->disconnect();
  
}

  
 
 

 

	/*** function  save message
	 *  param $IdUser
	 *  param $TextgMessage - textarea
	 *  param $DateMessages - date creat message
	 *  return void
	 */
public function SaveMessage($IdUser,$TextgMessage,$DateMessages)   //  Introducing a new user to a database
{ 
   
    $this->connect();   
    $into=$this->connection->exec("INSERT INTO Messages (`idMessage`, `idUser`, `textMessage`, `StatusMessage`, `DateMessages`)
                                   VALUES (null,'$IdUser','$TextgMessage','בטיפול','$DateMessages')"); 
    $this->disconnect();
   
}



/*** function add contact save message
 *
 *  param $TextgMessage - textarea
 *  param $DateMessages - date creat message
 *  return void
 */
public function ContactSaveMessage($TextgMessage,$DateMessages)   //  Introducing a new user to a database
{ 
   
    $this->connect();   
    $into=$this->connection->exec("INSERT INTO Messages (`idMessage`, `idUser`, `textMessage`, `StatusMessage`, `DateMessages`)
                                   VALUES (null,'234','$TextgMessage','בטיפול','$DateMessages')"); 
    $this->disconnect();
   
}

  
  
   
 

/***  function return last message user
 *
 *  param $IdUser
 *  return mixed - id last message user
 */
public function MaxMessage($IdUser)    
{ 
    
    $this->connect();   
    $result = $this->connection->query("SELECT MAX(idMessage) as max FROM Messages WHERE `idUser`='$IdUser'");
    $MaxMessage = $result->fetch(PDO::FETCH_ASSOC);
    
    $this->disconnect();
   
    return  $MaxMessage['max'] ;

}

 

/***   function that returns the number of the last order in order to record it in the invoice
 *
 * return int|mixed
 */
public function MaxIDInvitations()    
{ 
    
    $this->connect();   
    $result = $this->connection->query("SELECT MAX(IDInvitation) as max FROM invitation");
    $IDInvitations = $result->fetch(PDO::FETCH_ASSOC);
    $this->disconnect();
   
    return  $IDInvitations['max']+1 ;  
}
 
  
    
  
  
  

/***  function that prints all delivery persons - select
 * return void
 */
public function ArrCourier() 
{ 
    
    $this->connect();   
    $result = $this->connection->query("SELECT * FROM users WHERE `PermissionsField`='3' or `PermissionsField`='1'");
    
	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {  
              echo   "<option>".$row["Email"]."</option> ";
  
    } 
return; 
}

 	



	/***  function update names files from invitation - after signing
	 *  param $nameFile1
	 *  param $nameFile2
	 *  param $IDInvitation
	 *  return void
	 */
	public function UpdateOfDeliveryConfirmationAndAffidavit($nameFile1,$nameFile2,$IDInvitation) 
	{  
		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET     `ClosingFileSigned`='$nameFile2' , `deliveryApproval`='$nameFile1'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	 
 	}
 	
 	

	/*** function get all data from invitation
	 *
	 *  param $IdInvitation
	 *  return mixed
	 */
	public function AllDataInvitation($IdInvitation) 
	{ 
        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$IdInvitation'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC);
        return $AllDataInvitation;
 	}
 	
   
   
   
   
   
   

	/***  function that cancels the order/s - only manager
	 *
	 *  param $ArrIDInvitation - Arr id invitation/s
	 *  param $SizeArr
	 *  return void
	 */
 	public function InvitationCancelReservation($ArrIDInvitation,$SizeArr) 
	{
	    for($i=0;$i<$SizeArr;$i++)
	    {
            date_default_timezone_set("israel"); 
          	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date
             
            $this->connect();
            $into=$this->connection->exec("UPDATE `invitation` SET  `OrderUpdateDate`='$OrderUpdateDate'   , `StatusInvitation`='בוטל'    WHERE `IDInvitation`='$ArrIDInvitation[$i]'");
            $this->disconnect();
	    }
    return; 
 	}
   
    

	/***    update CaseNumber from invitation
	 *
	 *  param $CaseNumber
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdateCaseNumber($CaseNumber,$IDInvitation) 
	{
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `CaseNumber`='$CaseNumber'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}
 	

	/***   update name recipient from invitation
	 *
	 *  param $FullNameOfTheRecipient
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdateFullNameOfTheRecipient($FullNameOfTheRecipient,$IDInvitation) 
	{
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `TheNameOfTheCustomer`='$FullNameOfTheRecipient'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect(); 
 	}
 	
 	
 

	/*** function update ID The recipient from invitation
	 *
	 *  param $toID
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdatetoID($toID,$IDInvitation) 
	{
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `IDOfTheCustomer`='$toID'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}

	/***   update phone from invitation
	 *
	 * param $PhoneOfTheRecipient
	 * param $IDInvitation
	 * return void
	 */
 	public function InvitationUpdatePhoneOfTheRecipient($PhoneOfTheRecipient,$IDInvitation) 
	{ 
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `PhoneOfTheRecipient`='$PhoneOfTheRecipient'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}


	/*** update address for invitation
	 *
	 *  param $Address
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdateAddress($Address,$IDInvitation) 
	{ 
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `Address`='$Address'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}


	/*** update remarks for invitation
	 *
	 *  param $Remarks
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdateRemarks($Remarks,$IDInvitation) 
	{ 
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `Remarks`='$Remarks'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}
 	
 	

	/*** update files(submission) for invitation
	 *
	 *  param $NewFiles
	 *  param $IDInvitation
	 *  return void
	 */
 	public function InvitationUpdateFiles($NewFiles,$IDInvitation) 
	{     
	    date_default_timezone_set("israel");  
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `Files`='$NewFiles'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}



	/*** update type invitation
	 *
	 *  param $DeliveryType
	 *  param $IDInvitation
	 *  return void
	 */
  	public function InvitationUpdateDeliveryType($DeliveryType,$IDInvitation) 
	{ 
	    date_default_timezone_set("israel"); 
      	$OrderUpdateDate=date( 'd.m.y H:i:s', time());  //  now time and date

		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET `OrderUpdateDate`='$OrderUpdateDate'   , `DeliveryType`='$DeliveryType'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();	
		 
 	}
   	
 	
 	
       
    //  creating  updated form
 	public function InvitationUpdateFilesDeliveryType($IDInvitation) 
	{  
	    
	     
        //  get data from invitation
		$this->connect();  
 		$result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$IDInvitation'");
        $invitation = $result->fetch(PDO::FETCH_ASSOC);
 		$this->disconnect();
 		 
	
	
	 
 	 
        // according to the type of invitation,  create the appropriate form
        if($invitation['DeliveryType']=="הוצל'פ-התראה"||$invitation['DeliveryType']=="הוצל'פ-אזהרה")
        { 
            $deliveryApproval=ConfirmationOfDeliveryExecution($invitation['TheNameOfTheCustomer'],$invitation['Address'],
                            $invitation['CaseNumber'],$invitation['UserName'],$invitation['IDOfTheCustomer'],$invitation['UserStreet'],
							$invitation['UserMobile'],$IDInvitation);

        }
        else
        {            
            $deliveryApproval=LegalProofOfDelivery($invitation['UserName'],$invitation['UserStreet'],$invitation['UserMobile'],
                            $invitation['CaseNumber'],$invitation['DeliveryType'],$invitation['TheNameOfTheCustomer']." ת.ז.   ".$invitation['IDOfTheCustomer'],
        			        $invitation['Address'],$IDInvitation);  
    
        }

        //   update deliveryApproval
        $this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET  `deliveryApproval`='$deliveryApproval'  WHERE `IDInvitation`='$IDInvitation'");
		$this->disconnect();
	 
	 
 
		 
 	}


	/***   update name user
	 *
	 *  param string $Username
	 *  return void
	 */
	public function UserUpdateUsername(string $Username)
	{
		$this->connect();
		$id=$_SESSION['UserNow']->getIdUser();
		$into=$this->connection->exec("UPDATE `users` SET `UserName`='$Username'   WHERE `IdUser`='$id'");
		$this->disconnect();	
		 
 	}


	/***  update phone user
	 *
	 *  param string $Mobilephone
	 *  return void
	 */
	public function UserUpdateMobilephone(string $Mobilephone) 
	{
		$this->connect();
		$id=$_SESSION['UserNow']->getIdUser();
		$into=$this->connection->exec("UPDATE `users` SET `Mobile`='$Mobilephone' WHERE `IdUser`='$id'");
		$this->disconnect();	
 	}

	/*** update  name of office user
	 *
	 *  param string $NameOfOffice
	 *  return void
	 */
	public function UserUpdateNameOfOffice(string $NameOfOffice) 
	{
		$this->connect();
		$id=$_SESSION['UserNow']->getIdUser();
		$into=$this->connection->exec("UPDATE `users` SET `NameOfOffice`='$NameOfOffice' WHERE `IdUser`='$id'");
		$this->disconnect();	
 	}

	/*** update  street(address) user
	 *
	 *  param string $Street
	 *  return void
	 */
	public function UserUpdateStreet(string $Street) 
	{
		$this->connect();
		$id=$_SESSION['UserNow']->getIdUser();
		$into=$this->connection->exec("UPDATE `users` SET `Street`='$Street' WHERE `IdUser`='$id'");
		$this->disconnect();	
 	}

	/*** update pass user
	 *
	 *  param string $Pass
	 *  return void
	 */
	public function UserUpdatePass(string $Pass) 
	{
		$this->connect();
		$id=$_SESSION['UserNow']->getIdUser();
		$Password=password_hash($Pass,PASSWORD_DEFAULT);
		$into=$this->connection->exec("UPDATE `users` SET `Password`='$Password'  , `Pass`='$Pass' WHERE `IdUser`='$id'");
		$this->disconnect();	
 	}


	/*** function close message - only manager
	 *
	 *  param $IDMessage
	 *  return void
	 */
	public function CloseMessage($IDMessage) 
	{
		$this->connect(); 
		$into=$this->connection->exec("UPDATE `Messages` SET `StatusMessage`='סגור'    WHERE `idMessage`='$IDMessage'");
		$this->disconnect();	
 	}


	/*** update email user
	 *
	 *  param string $Email
	 *  return void
	 */
	public function newSESSION(string $Email) 
	{
		$this->connect();
		$statement=$this->connection->prepare("SELECT * FROM users WHERE Email=:Email");
		$statement->execute([':Email'=>$Email]);
		$result=$statement->fetchObject('User');
		$_SESSION['UserNow']=$result;
		$this->disconnect();
		return;		
 	}
	
 


	/*** save file and return location file
	 *
	 *  param int $FileIntex
	 *  return string - location file
	 */
    public function SaveFILE(int $FileIntex):string  
    {  
        $uploadfile = 'uploads/0/' . $_FILES['FILE']['name'][$FileIntex];
        move_uploaded_file($_FILES['FILE']['tmp_name'][$FileIntex], $uploadfile) ;
        return   $uploadfile; 
    }
    
   
   	

	/*** function that transfers the file uploaded by the user
	 *   in the order to the folder according to the ID number of the order
	 *
	 *  param int $SizeArrFiles
	 *  param array $FilesArr
	 *  return void
	 */
	public function renameFile(int $SizeArrFiles,array $FilesArr)
	{ 
		$this->connect();
	
        $result = $this->connection->query("SELECT MAX(IDInvitation) as max FROM invitation");
        $row = $result->fetch(PDO::FETCH_ASSOC);
     
        $destination_path = 'uploads/'.$row['max'].'/';
         
        for($i=0;$i<$SizeArrFiles;$i++)
        {
            
            
    
            rename('uploads/0/'.$FilesArr[$i], $destination_path . $FilesArr[$i]);
 
        }
 
      
		$this->disconnect();
		return;		
 	}
	



	/*** function checks if the email of delivery person
	 *
	 *  param $EmailCourier
	 *  return mixed|null
	 */
	public function checkEmailCourier($EmailCourier) 
	{
 
        $this->connect();
        $result = $this->connection->query("SELECT `IdUser`, `PermissionsField` FROM users WHERE `Email`='$EmailCourier'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
		$this->disconnect();
		
		if($row['PermissionsField']=="3"||$row['PermissionsField']=="1")// if yes return id delivery person
		{
    		$this->disconnect();
        	return $row['IdUser'];
		}
		else
		{
		    $this->disconnect();
        	return NULL;
		}
 	}
	

	




/***  function that assigns an invitation to an for delivery person
 *
 *  param $IDCourier
 *  param $formDoor
 *  return void
 */
public function Affiliation($IDCourier,$formDoor) 
{
    $this->connect();
    $result = $this->connection->query("SELECT `UserName` ,`IdentityCard` FROM users WHERE `IdUser`='$IDCourier'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $CourierName=$row['UserName']; // name delivery person
    $deliveryID=$row['IdentityCard']; // ID delivery person
    
    $this->disconnect();
    
    $SizeArrFormDoor = count($formDoor);
    
    for($i=0; $i < $SizeArrFormDoor; $i++)
    {
    
    	$this->connect();
    	$into=$this->connection->exec("UPDATE `invitation` SET  `IdDeliveryInvitation`='$IDCourier',`deliveryID`='$deliveryID' ,`nameCourier`='$CourierName' ,`StatusInvitation`='עבר לטיפול בשטח'  WHERE `IDInvitation`='$formDoor[$i]'");
    	$this->disconnect();
    
    }
    
    return;
}





/***  function that checks if the invitation has already been placed
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return string
 */
public function MasterChecksIfTheOrdersHaveAlreadyBeenPlaced($ArrIDInvitation,$SizeArr): string
{
    $stringInvitation=""; // all invitations done

    for($i=0; $i < $SizeArr; $i++)
    {

        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data for invitation

        if($AllDataInvitation['HowitWasDone']=="טרם בוצע"||$AllDataInvitation['HowitWasDone']=="כתובת שגויה")
        {
            $stringInvitation=$stringInvitation.$ArrIDInvitation[$i]." , ";
        }

        $this->disconnect();
    }

    return $stringInvitation;
}






/***  function that checks if statement of claim has been executed correctly
 *    correct address
 *    there is a signature
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return string
 */
public function MasterChecksIfClosingFileSigned($ArrIDInvitation,$SizeArr): string
{
  
    $MasterChecksIfClosingFileSigned=""; // all invitations done
   
    
   for($i=0; $i < $SizeArr; $i++)
    {
        
        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data for invitation
        
        if($AllDataInvitation['OrderType']=="מסירה משפטית"&&$AllDataInvitation['ClosingFileSigned']!="טרם הועלה תצהיר חתום") 
        {
            $MasterChecksIfClosingFileSigned=$MasterChecksIfClosingFileSigned.$ArrIDInvitation[$i]." , ";
        }
  
        $this->disconnect();
    }
 
 
    return $MasterChecksIfClosingFileSigned;
}	



	/****  function that creates an affidavit by type statement of claim (writ of execution - ochaa lapoal or legal)
	 * @param $ArrIDInvitation
	 * @param $SizeArr
	 * @return void
	 */
public function UnsignedMoralAffidavit($ArrIDInvitation,$SizeArr) 
{
      
    	date_default_timezone_set("israel"); 
      	$OrderDate=date('d-m-y');
        
  for($i=0; $i < $SizeArr; $i++)
    {
       
    	$this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation
        
       
        $result = $this->connection->query("SELECT * FROM `users` WHERE `IdUser`='".$AllDataInvitation['IdDeliveryInvitation']."'");  
        $AllDataDelivery = $result->fetch(PDO::FETCH_ASSOC); //   get all data delivery persons
        
        
        $result = $this->connection->query("SELECT * FROM `users` WHERE `IdUser`='".$AllDataInvitation['IdUserInvitation']."'");  
        $AllDataUser = $result->fetch(PDO::FETCH_ASSOC); //   get all data user
        
       /* 
        echo "<br>AA<pre>";
        print_r($AllDataInvitation);
        echo "</pre>";
        
        echo "<br>BB<pre>";
        print_r($AllDataDelivery);
        echo "</pre>";
        
        echo "<br>CC<pre>";
        print_r($AllDataUser);
        echo "</pre>";
  
        
     //     die("<br><br><br><br><br> ");
   */


 

    if($AllDataInvitation['DeliveryType']=="הוצל'פ-אזהרה"||$AllDataInvitation['DeliveryType']=="הוצל'פ-התראה")
    {   
        $NemaFile=IssuedAffidavit($AllDataDelivery['UserName'],$AllDataDelivery['IdentityCard'],$AllDataDelivery['Street'],$AllDataUser['UserName'],
                                  $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],$AllDataInvitation['LawyerName'],$OrderDate,
                                  $AllDataInvitation['LawyerAddress'],$AllDataInvitation['LawyerNumber'],$AllDataInvitation['DeliveryType'],
                                  $AllDataInvitation['NameReceiver'],$AllDataInvitation['TypeOfCloseness'],$AllDataInvitation['RemarksField'],
                                  $AllDataInvitation['RemarksField'],$AllDataInvitation['HowitWasDone'],$AllDataInvitation['timeDelivered'],
                                  $AllDataInvitation['DayDelivered'],$AllDataInvitation['time2'],$AllDataInvitation['Day2'],$AllDataInvitation['time1'],
                                  $AllDataInvitation['Day1'],$AllDataInvitation['IDInvitation']);

        
        
        
        
        /*
        if($AllDataInvitation['HowitWasDone']=="נמסר לנמען") 
        {
            $NemaFile=IssuedAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataDelivery['Mobile'],
                            $AllDataUser['UserName'],$AllDataInvitation['TheNameOfTheCustomer'],$AllDataInvitation['CaseNumber'],
                            $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],"","","","",$AllDataInvitation['DayDelivered'],
                            "","",$AllDataInvitation['timeDelivered'],"","","עו''ד אהוד כסםי","נתנזון 1 חיפה","","36529",$AllDataInvitation['DeliveryType'],
                            $AllDataInvitation['HowitWasDone'],$AllDataInvitation['IDInvitation']);
             
        }
  
        else if($AllDataInvitation['HowitWasDone']=="בן/ת משפחה")
        {
            $NemaFile=IssuedAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataDelivery['Mobile'],
                            $AllDataUser['UserName'],$AllDataInvitation['TheNameOfTheCustomer'],$AllDataInvitation['CaseNumber'],
                            $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],$AllDataInvitation['NameReceiver'],
                            $AllDataInvitation['TypeOfCloseness'],"","",$AllDataInvitation['DayDelivered'],"","",
                            $AllDataInvitation['timeDelivered'],"","","עו''ד אהוד כפסי","נתזנון 1 חיפה","","36529",$AllDataInvitation['DeliveryType'],
                            $AllDataInvitation['HowitWasDone'],$AllDataInvitation['IDInvitation']);
   
        }
        else if($AllDataInvitation['HowitWasDone']=="נמסר לנמען אך סירב לחתום")
        {
            $NemaFile=IssuedAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataDelivery['Mobile'],
                            $AllDataUser['UserName'],$AllDataInvitation['TheNameOfTheCustomer'],$AllDataInvitation['CaseNumber'],
                            $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],"","","","",
                            $AllDataInvitation['DayDelivered'],"","",$AllDataInvitation['timeDelivered'],"",$AllDataInvitation['RemarksField'],
                            "עו''ד אהוד כספי","נתנזון 1 חיפה","","36529",$AllDataInvitation['DeliveryType'],$AllDataInvitation['HowitWasDone'],$AllDataInvitation['IDInvitation']);
   
        }
        else if($AllDataInvitation['HowitWasDone']=="סירב לחתום ולקבל -הושאר במקום")
        {
            $NemaFile=IssuedAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataDelivery['Mobile'],
                            $AllDataUser['UserName'],$AllDataInvitation['TheNameOfTheCustomer'],$AllDataInvitation['CaseNumber'],
                            $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],"","","","",
                            $AllDataInvitation['DayDelivered'],"","",$AllDataInvitation['timeDelivered'],$AllDataInvitation['RemarksField'],"",
                            "עו''ד אהוד כפסי","נתנזון 1 חיפה","","36529",$AllDataInvitation['DeliveryType'],$AllDataInvitation['HowitWasDone'],$AllDataInvitation['IDInvitation']);
        
        }
        else if($AllDataInvitation['HowitWasDone']=="ביקור שלישי הודבק במקום")
        {
           
            $NemaFile=IssuedAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataDelivery['Mobile'],
                            $AllDataUser['UserName'],$AllDataInvitation['TheNameOfTheCustomer'],$AllDataInvitation['CaseNumber'],
                            $AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],"","",$AllDataInvitation['Day1'],
                            $AllDataInvitation['Day2'],$AllDataInvitation['DayDelivered'],$AllDataInvitation['time1'],$AllDataInvitation['time2'],
                            $AllDataInvitation['timeDelivered'],"","","עו''ד אהוד כספי","נתנזון 1 חיפה","","36529",$AllDataInvitation['DeliveryType'],
                            $AllDataInvitation['HowitWasDone'],$AllDataInvitation['IDInvitation']);
                            
                             
        }
        */
    }
    else if($AllDataInvitation['DeliveryType']=="משפטית-התראה"||$AllDataInvitation['DeliveryType']=="משפטית-תביעה")
    {         

        if($AllDataInvitation['HowitWasDone']=="נמסר לנמען") 
        {
        
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","","","",$AllDataInvitation['HowitWasDone'],"","",$AllDataInvitation['DayDelivered'],
                           "","",$AllDataInvitation['timeDelivered'],$AllDataInvitation['IDInvitation'],"");  
    
        }
  
        else if($AllDataInvitation['HowitWasDone']=="בן/ת משפחה")
        {  
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","",$AllDataInvitation['NameReceiver'],$AllDataInvitation['TypeOfCloseness'], 
                           $AllDataInvitation['HowitWasDone'],"","",$AllDataInvitation['DayDelivered'],"","",$AllDataInvitation['timeDelivered'],
                           $AllDataInvitation['IDInvitation'],"");  

   
        }
        else if($AllDataInvitation['HowitWasDone']=="נמסר לנמען אך סירב לחתום")
        {
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","","","",$AllDataInvitation['HowitWasDone'],"","",$AllDataInvitation['DayDelivered'],
                           "","","",$AllDataInvitation['IDInvitation'],$AllDataInvitation['RemarksField']);
    
        }
        else if($AllDataInvitation['HowitWasDone']=="סירב לחתום ולקבל -הושאר במקום")
        {
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","","","",$AllDataInvitation['HowitWasDone'],"","",$AllDataInvitation['DayDelivered'],
                           "","","",$AllDataInvitation['IDInvitation'],$AllDataInvitation['RemarksField']);
    
        }
        else if($AllDataInvitation['HowitWasDone']=="מסרתי את הכתב למורשה של הנעמן")
        {
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","","","",$AllDataInvitation['HowitWasDone'],"","",$AllDataInvitation['DayDelivered'],
                           "","","",$AllDataInvitation['IDInvitation'],$AllDataInvitation['NameReceiver']); 

        }
        else if($AllDataInvitation['HowitWasDone']=="ביקור שלישי הודבק במקום")
        {
            $NemaFile=LegalAffidavit($AllDataInvitation['nameCourier'],$AllDataInvitation['deliveryID'],$AllDataUser['UserName'],
                           $AllDataInvitation['CaseNumber'],$AllDataInvitation['Address'],$AllDataInvitation['VerificationSource'],
                           "עו''ד אהוד כספי","נתנזון 1 חיפה","","","",$AllDataInvitation['HowitWasDone'],$AllDataInvitation['Day1'],
                           $AllDataInvitation['Day2'],$AllDataInvitation['DayDelivered'],$AllDataInvitation['time1'],
                           $AllDataInvitation['time2'],$AllDataInvitation['timeDelivered'],$AllDataInvitation['IDInvitation'],"");
  
  
 
        }

 
 
    }
 
        $into=$this->connection->exec("UPDATE `invitation` SET ClosingFileSigned='טרם הועלה תצהיר חתום'  ,   `ClosingFileUnsigned`='$NemaFile'   WHERE `IDInvitation`='$ArrIDInvitation[$i]'");
        
        $this->disconnect();

    }
  
  
     return;
   // 	die("<br><br><br><br><br> ");

 }

 
 
 
 
 
 
 

/*** function print invitation for user(frontend)
 *
 *  param $IdInvitation
 *  param $TypeAction
 *  return void
 */
public function UserOrderDetailsView($IdInvitation,$TypeAction) 
{ 
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$IdInvitation'");  
    $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation
    
    
    /*
	echo "<br>AA<pre>";
	print_r($AllDataInvitation);
	echo "</pre>";
	*/ 
	
	
    if($TypeAction=="מספרהזמנה")
    { 
        if($AllDataInvitation['OrderType']=="הגשה")
        {
            echo "  <div class='UserOrderDetailsView1'>  
                    <h2   style='float: right;  	font-size: 25px;' >הזמנה מספר ".$AllDataInvitation['IDInvitation']." - ".$AllDataInvitation['OrderType']."  </h2>
                    <br><br><br><br>";
                    
                  
            echo " <u> סטטוס</u>: ".$AllDataInvitation['StatusInvitation'] ." <br><br> ";
                   
                 
            echo " <u>תאריך פתיחת הזמנה</u>: ".$AllDataInvitation['OrderOpeningDate'] ."  <br><br>  ";
    
     
            if($AllDataInvitation['OrderUpdateDate']!="0")
            {
                echo " <u>תאריך עדכון הזמנה</u>: ".$AllDataInvitation['OrderUpdateDate'] ."  <br><br>  ";
            }
           
             
            echo " <u>תאריך סגירת הזמנה</u>: ";
            if($AllDataInvitation['OrderClosingDate']=="0")
            {
                echo "טרם נסגר <br><br>"; 
            }
            else
            {
                echo $AllDataInvitation['OrderClosingDate'] ."  <br><br>  "; 
            }
             
     
                    
            if($AllDataInvitation['StatusInvitation']=="בוטל")
            { 
                echo "<u>תאריך ביטול הזמנה</u>: ".$AllDataInvitation['OrderClosingDate'] ." <br><br>  "; 
            }
                    
                    
            echo " <u>הגשה ב</u>: ".$AllDataInvitation['TheNameOfTheCustomer'] ." <br><br> ";
                    
                    
            echo " <u>כתובת</u>: ".$AllDataInvitation['Address'] ." <br><br> ";
                    
                    
            echo " <u> הערות</u>: ".$AllDataInvitation['Remarks'] ." <br><br> ";
                    
                   
            $StrFiles = explode("§", $AllDataInvitation["Files"]);
            $sizeStrFiles = sizeof($StrFiles);
 
            echo " <u>קבצים</u>: ";
             for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo  "<br>".$StrFiles[$i]; 
            } 
            echo "<br><br> ";
            
 	
            
            echo "<td>";
            for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo " <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$StrFiles[$i]."' width='1200px' height='600px' />   <br><br>";

            } 
            echo  "</td>  ";

 
                    
            if($AllDataInvitation['StatusInvitation']=="עבר לטיפול בשטח"||$AllDataInvitation['StatusInvitation']=="עבר לבדיקת המשרד")
            { 
                echo "<u>אופן ביצוע: טרם בוצע </u><br><br> "; 
            }
            else   if($AllDataInvitation['StatusInvitation']=="בוצע בשטח"||$AllDataInvitation['StatusInvitation']=="הזמנה נעולה")
            {
                
                echo " <u>אופן ביצוע</u>: ".$AllDataInvitation['HowitWasDone'] ."   <br><br>  ";  
                
                echo " <u>תאריך הגשה</u>: ".$AllDataInvitation['DayDelivered'] ."   <br><br> "; 
                 
                echo "<u>תמונה מהשטח</u> ".$AllDataInvitation['Photography'] ."<br><br> (לחץ על התמונה על מנת להוריד)
                <a   href='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["Photography"]."'  download>
                <img   class='img_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["Photography"]."'    width='1200' height='700'  >  </a> <br><br>";
                
                 
                echo "<u>שליח</u>: ".$AllDataInvitation['nameCourier'] ."   <br><br>  ";
                
                
                echo "  <u>הערות השליח</u>: ".$AllDataInvitation['RemarksField'] ."    <br><br>  
                "; 
            } 
        } 
        else if($AllDataInvitation['OrderType']=="מסירה משפטית") 
        {  
              echo "  <div class='UserOrderDetailsView1'>  
                    <h2   style='float: right;  	font-size: 25px;' >הזמנה מספר ".$AllDataInvitation['IDInvitation']." - ".$AllDataInvitation['OrderType']."  </h2>
                    <br><br><br><br>";
                    
                       
            echo " <u> סטטוס</u>: ".$AllDataInvitation['StatusInvitation'] ." <br><br> ";
                   
                 
            echo " <u>תאריך פתיחת הזמנה</u>: ".$AllDataInvitation['OrderOpeningDate'] ."  <br><br>  ";
            
            
            if($AllDataInvitation['OrderUpdateDate']!="0")
            {
                echo " <u>תאריך עדכון הזמנה</u>: ".$AllDataInvitation['OrderUpdateDate'] ."  <br><br>  ";
            }
           
            
            echo " <u>תאריך סגירת הזמנה</u>: ";
            if($AllDataInvitation['OrderClosingDate']=="0")
            {
                echo "טרם נסגר <br><br>"; 
            }
            else
            {
                echo $AllDataInvitation['OrderClosingDate'] ."  <br><br>  "; 
            }
             
                
                    
            if($AllDataInvitation['StatusInvitation']=="בוטל")
            { 
                echo "<u>תאריך ביטול הזמנה</u>: ".$AllDataInvitation['OrderClosingDate'] ." <br><br>  "; 
            }
                    
                    
            echo " <u>מסירה ל</u>: ".$AllDataInvitation['TheNameOfTheCustomer'] ." <br><br> ";
                    
                    
            echo " <u>כתובת</u>: ".$AllDataInvitation['Address'] ." <br><br> ";
                    
                    
            echo " <u> הערות</u>: ".$AllDataInvitation['Remarks'] ." <br><br> ";
                    
                
                                   
            $StrFiles = explode("§", $AllDataInvitation["Files"]);
            $sizeStrFiles = sizeof($StrFiles);
 
            echo " <u>קבצים</u>: ";
            for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo  "<br>".$StrFiles[$i]; 
            } 
            echo "<br><br> ";

 	  
            echo "<td>";
            for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo " <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$StrFiles[$i]."' width='1200px' height='600px' />   <br><br>";

            } 
            echo  "</td><br><br>";


                    
            echo " <u>אישור מסירה</u>: ".$AllDataInvitation['deliveryApproval'] ."<br><br>
                     <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["deliveryApproval"]."' width='1200px' height='600px' />   <br><br><br>";

            
            
                      	
                    
            if($AllDataInvitation['StatusInvitation']=="עבר לטיפול בשטח"||$AllDataInvitation['StatusInvitation']=="עבר לבדיקת המשרד")
            { 
                echo "<u>אופן ביצוע: טרם בוצע </u><br><br> "; 
            }
            else   if($AllDataInvitation['StatusInvitation']=="בוצע בשטח"||$AllDataInvitation['StatusInvitation']=="הזמנה נעולה")
            {
                
                echo " <u>אופן ביצוע</u>: ".$AllDataInvitation['HowitWasDone'] ."   <br><br>  ";  
                
                 
                echo "<u>אימות</u>: ".$AllDataInvitation['VerificationSource'] ."  <br><br>    ";  
               
                
                echo "    <u>תאריך מסירה</u>: ".$AllDataInvitation['DayDelivered'] ."<br><u>שעה</u>: ".$AllDataInvitation['timeDelivered']."   <br><br> "; 
                 
                
                if($AllDataInvitation['ClosingFileSigned']==""||$AllDataInvitation['ClosingFileSigned']=="טרם הועלה תצהיר חתום")
                { 
                    echo "<u>תצהיר</u>: טרם נחתם<br><br> "; 
                }
                else
                {
                    echo " <u>תצהיר</u>: ".$AllDataInvitation['ClosingFileSigned'] ."<br><br>
                    <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["ClosingFileSigned"]."' width='1200px' height='600px' />   <br><br><br>";
                }
               
              
                echo "<u>תמונה מהשטח</u> ".$AllDataInvitation['Photography'] ."<br><br> (לחץ על התמונה על מנת להוריד)
                <a   href='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["Photography"]."'  download>
                <img   class='img_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["Photography"]."'    width='1200' height='700'  >  </a> <br><br>";
                
                 
                echo "<u>שליח</u>: ".$AllDataInvitation['nameCourier'] ."   <br><br>  ";
                
                
                echo "  <u>הערות השליח</u>: ".$AllDataInvitation['RemarksField'] ."    <br><br>  
                </div>"; 
            }
        } 
    }
    else if($TypeAction=="ביטול")
    { 
	
 		$this->disconnect();	 
    	$this->connect();
    	date_default_timezone_set("israel"); 
      	$OrderClosingDate=date( 'd.m.y H:i:s', time());  //  now time and date

 
	
		$into=$this->connection->exec("UPDATE `invitation` SET     `OrderClosingDate`='$OrderClosingDate'    ,  `StatusInvitation`='בוטל'  WHERE `IDInvitation`='$IdInvitation'");
		$this->disconnect();	 
        echo "<script type=\"text/javascript\">window.alert(' הזמנה מספר $IdInvitation בוטלה');window.location.href = '../Pages/UserViewingOrders.php';</script>";
        return;
 	 
    } 
    else
    {
        echo ".!.";
    }
 
    $this->disconnect();
    return;
}


  

 


/*** function print(update) invitation
 *
 *  param $IdInvitation
 *  return void
 */
public function InvitationUpdateUserOrMaster($IdInvitation) 
{  
    
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$IdInvitation'");  
    $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation


    /*
    echo "<br>AA<pre>";
    print_r($AllDataInvitation);
    echo "</pre>";
  */
	
	 
        if($AllDataInvitation['OrderType']=="הגשה")
        {
            echo "  <div class='UserOrderDetailsView1'>  
                    <h2   style='float: right;   font-size: 25px;' >הזמנה מספר ".$IdInvitation." - ".$AllDataInvitation['OrderType']."  </h2>
                    <br><br><br><br><br>";
                    
            echo " <u> סטטוס</u>: ".$AllDataInvitation['StatusInvitation'] ." <br><br><br> ";
                  
            echo " <u>תאריך פתיחת הזמנה</u>: ".$AllDataInvitation['OrderOpeningDate'] ."  <br><br> <br> ";
     
            echo    "<u>הגשה ב</u>: ".$AllDataInvitation['TheNameOfTheCustomer'] ."
                    <input class='InvitationUpdateInput'  type='text' name='Submission' placeholder='הגשה ב....' ><br><br> <br>";
            
          
            echo " <u>כתובת</u>: ".$AllDataInvitation['Address'] ."    <u>לשינוי כתובת פנה למוקד</u> <br><br> <br> ";
                    
                    
            echo " <u> הערות</u>: ".$AllDataInvitation['Remarks'] ."   
          <input  class='InvitationUpdateInput'  type='text' name='Remarks' placeholder='עריכת הערות'   ><br><br> <br>";
        
                    
            $StrFiles = explode("§", $AllDataInvitation["Files"]);
            $sizeStrFiles = sizeof($StrFiles);
 
            echo " <u>קבצים</u>: <br>  <u>לשינוי קבצי הגשה פנה למוקד</u>";
            
            //  print names files
            for($i=0;$i<$sizeStrFiles;$i++)  
            {
                echo  "<br>".$StrFiles[$i]; 
            } 
            echo "<br><br> <br>";
            
 	
            
            echo "<td>";
            for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo " <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$StrFiles[$i]."' width='1200px' height='600px' />   <br><br><br>";

            } 
            
            
            echo  "</td> </div> 
                <br><br><br><br><br><br> 
                <div class='inputfield'>
                <button  type='text' class='btn'  value='".$AllDataInvitation['OrderType']."'     name='OrderType'  >עדכן</button> 
                </div> 
                 
                <input   style=' border: none;  width: 1%;  color:  #ffffff;'  type='text'   name='IdInvitation' value='$IdInvitation' readonly>   ";
  
  
  
  
  
  
        } 
        else if($AllDataInvitation['OrderType']=="מסירה משפטית") 
        {  
             
            echo "  <div class='UserOrderDetailsView1'>  
                <h2   style='float: right;  	font-size: 25px;' >הזמנה מספר ".$AllDataInvitation['IDInvitation']." - ".$AllDataInvitation['OrderType']."  </h2>
                <br><br><br> <br><br>";
                    
                    
            echo " <u> סטטוס</u>: ".$AllDataInvitation['StatusInvitation'] ." <br><br> <br>";
                   
                 
            echo " <u>תאריך פתיחת הזמנה</u>: ".$AllDataInvitation['OrderOpeningDate'] ."  <br><br> <br> ";
                    
                    
            echo    "<u>מספר תיק</u>: ".$AllDataInvitation['CaseNumber'] ." 
                    <input  class='InvitationUpdateInput'  type='text' name='CaseNumber' placeholder='עדכון מספר תיק' > <br><br><br> ";
                    
                    
            echo    "<u>סוג מסירה</u>: ".$AllDataInvitation['DeliveryType'] ."  
            <br><div class='inputfield'>               
            <br><select  style=' float: right;  '  class='InvitationUpdateInput' name='DeliveryType'   size='5'   required>
            <option>משפטית-התראה</option><option>משפטית-תביעה</option><option>הוצל''פ-התראה</option><option>הוצל''פ-אזהרה</option> </select ></div><br><br><br><br><br><br>";
            
 
            echo    "<u>נעמן</u>: ".$AllDataInvitation['TheNameOfTheCustomer'] ."
                    <input class='InvitationUpdateInput'  type='text' name='Submission' placeholder='עדכון נמען' ><br><br><br>";
                    
                     
            echo    "<u>תז</u>: ".$AllDataInvitation['IDOfTheCustomer'] ."
                    <input class='InvitationUpdateInput'  type='number' name='toID'   min='999999' max='9999999999'  placeholder='עדכון תז של הנמען'   ><br><br><br> ";
                    
                  
            echo    "<u>טלפון הנמען</u>: ".$AllDataInvitation['PhoneOfTheRecipient'] ."
                    <input class='InvitationUpdateInput'  type='text' name='PhoneOfTheRecipient'    maxlength='45' placeholder='עדכון טלפון הנמען'   ><br><br>  <br>";

                          
            echo    "<u> הערות</u>: ".$AllDataInvitation['Remarks'] ."   
                    <input  class='InvitationUpdateInput'  type='text' name='Remarks' placeholder='עריכת הערות'   ><br><br><br>";
                        
                   
            echo " <u>כתובת</u>: ".$AllDataInvitation['Address'] ."    <u>לשינוי כתובת פנה למוקד</u> <br><br><br> ";
                    
        
            $StrFiles = explode("§", $AllDataInvitation["Files"]);
            $sizeStrFiles = sizeof($StrFiles);
                    
            echo " <u>קבצים</u>: <br>  <u>לשינוי קבצי הגשה פנה למוקד</u>";
                    
            //  print names files
            for($i=0;$i<$sizeStrFiles;$i++)  
            {
                echo  "<br>".$StrFiles[$i]; 
            } 
            echo "<br><br> <br>";
                    
 	                
            echo "<td>";
            for($i=0;$i<$sizeStrFiles;$i++)
            {
                echo " <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$StrFiles[$i]."' width='1200px' height='600px' />   <br><br><br>";
            }    
            echo  "</td><br><br> <br>";
                    
                    
            echo " <u>אישור מסירה</u>: ".$AllDataInvitation['deliveryApproval'] ."<br><br><br>
                     <embed  class='embed_UserOrderDetailsView'  src='../PHP/uploads/".$IdInvitation."/".$AllDataInvitation["deliveryApproval"]."' width='1200px' height='600px' />   <br><br><br>";
           
            
             
            echo   "</div> <br><br><br><br><br><br> 
                    <div class='inputfield'>
                    <button  type='text' class='btn'  value='".$AllDataInvitation['OrderType']."'     name='OrderType'  >עדכן</button> 
                    </div> 
                    
                    
                    
                    <input   style=' border: none;  width: 1%;  color:  #ffffff;'  type='text'   name='IdInvitation' value='$IdInvitation' readonly>   ";
          
        } 
    
 
    $this->disconnect();
    return;
    
    
}







   

/*** print all invitations by id user - only manager
 *
 *  param $IdUser
 *  return void
 */
public function UserViewOrders($IdUser) 
{
    $flag=1;
    
    
    $this->connect(); 
    $UserPermissionsField = $this->connection->query("SELECT `PermissionsField` FROM `users` WHERE `IdUser`='$IdUser'");  
    $UserPermissionsField = $UserPermissionsField->fetch(PDO::FETCH_ASSOC);
    //    $UserPermissionsField['PermissionsField']
    $this->disconnect();

 
 
    $this->connect(); 
    $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IdUserInvitation`=$IdUser");
  
  
 
 
   
    if($UserPermissionsField['PermissionsField'] == 2)
    {
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {    
            if($IdUser==$row["IdUserInvitation"])
            {	
                if($flag)
                {
                    $flag=0;
                    echo "<tr>
                    <th>מס' <br>הזמנה</th>
                    <th>סטטוס</th>
                    <th>סוג הזמנה</th>
                    <th>פרטי הזמנה</th>
                    <th>קבצים</th>
                    <th>עריכת</th> 
                    <th>ביטול</th> 
                    <th>תאריך<br>פתיחת הזמנה</th>  
                    </tr>";
                    
                    
                    
                    
                    
                    
                    
                                        echo " <tr>   
                    <td> <button class='TreatmentOrdersSubmit'  name='מספרהזמנה'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
                    <td> ".$row["StatusInvitation"]." </td>
                    <td> ".$row["OrderType"]." </td>
                    
                    <td><b><u>נמען:</u></b><br>".$row["TheNameOfTheCustomer"]."<br><br>
                    <b><u>כתובת:</u></b><br>".$row["Address"]."<br><br>
                    <b><u>טלפון:</u></b><br>".$row["PhoneOfTheRecipient"]."<br><br>
                    <b><u>הערות:</u></b><br>".$row["Remarks"]."<br><br>
                    </td>  "; 
                    
                    
                    $StrFiles = explode("§", $row["Files"]);
                    $sizeStrFiles = sizeof($StrFiles);
                    
                    echo "<td>";
                    for($i=0;$i<$sizeStrFiles;$i++)
                    {
                        echo "<a download href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>"; 
                    } 
                    echo  "</td>  ";
                    
                    if($row["HowitWasDone"]=="טרם בוצע"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!="עבר לטיפול בשטח")
                    {
                        echo "  <td> <button class='faSubmit' style='  '  name='עריכה'   value='".$row["IDInvitation"]."'>  <i class='fa fa-cogs' aria-hidden='true'></i>  </button> </td>
                        <td> <button class='faSubmit' style=' float:center;'  name='ביטול'   value='".$row["IDInvitation"]."'>  <i class='fa fa-times' aria-hidden='true'></i>  </button> </td>";
                    }
                    else
                    {
                        echo "  <td> לא ניתן </td>
                        <td> לא ניתן </td>"; 
                    }
                    echo " <td> ".$row["OrderOpeningDate"]." </td>  </tr>"; 

                }  
                else
                { 
                    echo " <tr>   
                    <td> <button class='TreatmentOrdersSubmit'    name='מספרהזמנה'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
                    <td> ".$row["StatusInvitation"]." </td>
                    <td> ".$row["OrderType"]." </td>
                    
                    <td><b><u>נמען:</u></b><br>".$row["TheNameOfTheCustomer"]."<br><br>
                    <b><u>כתובת:</u></b><br>".$row["Address"]."<br><br>
                    <b><u>טלפון:</u></b><br>".$row["PhoneOfTheRecipient"]."<br><br>
                    <b><u>הערות:</u></b><br>".$row["Remarks"]."<br><br>
                    </td>  "; 
                    
                    
                    $StrFiles = explode("§", $row["Files"]);
                    $sizeStrFiles = sizeof($StrFiles);
                    
                    echo "<td>";
                    for($i=0;$i<$sizeStrFiles;$i++)
                    {
                        echo "<a download href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>"; 
                    } 
                    echo  "</td>  ";
                    
                    if($row["HowitWasDone"]=="טרם בוצע"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!="עבר לטיפול בשטח")
                    {
                        echo "  <td> <button class='faSubmit'   name='עריכה'   value='".$row["IDInvitation"]."'>  <i class='fa fa-cogs' aria-hidden='true'></i>  </button> </td>
                        <td> <button class='faSubmit' style=' float:center;'  name='ביטול'   value='".$row["IDInvitation"]."'>  <i class='fa fa-times' aria-hidden='true'></i>  </button> </td>";
                    }
                    else
                    {
                        echo "  <td> לא ניתן </td>
                        <td> לא ניתן </td>"; 
                    }
                    echo " <td> ".$row["OrderOpeningDate"]." </td>  </tr>"; 
                }
            } 
        }
    }
      
    else if($UserPermissionsField['PermissionsField'] == 4)    //    print invitations for VIP user
    {  
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {  
            if($IdUser==$row["IdUserInvitation"])
            { 
                if($flag)
                {
                    $flag=0;
                    echo "<tr>
                    <th>מס' <br>הזמנה</th>
                    <th>סטטוס</th>
                    <th>פרטי הזמנה</th>
                    <th>הערות</th>  
                    <th>קבצים</th>
                    <th>עריכת</th> 
                    <th>ביטול</th> 
                    <th>תאריך<br>פתיחת הזמנה</th>  
                    </tr>";
                    
                     
                                        
                    echo " <tr>   
                    <td> <button class='TreatmentOrdersSubmit'    name='מספרהזמנה'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
                    <td> ".$row["StatusInvitation"]." </td>
                     
                    <td>".$row["FullTextInvitation"]."</td>  
                    <td> ".$row["Remarks"]." </td> "; 
                    
                    
                    $StrFiles = explode("§", $row["Files"]);
                    $sizeStrFiles = sizeof($StrFiles);
                    
                    echo "<td>";
                    for($i=0;$i<$sizeStrFiles;$i++)
                    {
                        echo "<a download href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>"; 
                    } 
                    echo  "</td>  ";
                    
                    if($row["HowitWasDone"]=="טרם בוצע"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!="עבר לטיפול בשטח")
                    {
                        echo "  <td> <button class='faSubmit'   name='עריכה'   value='".$row["IDInvitation"]."'>  <i class='fa fa-cogs' aria-hidden='true'></i>  </button> </td>
                        <td> <button class='faSubmit' style=' float:center;'  name='ביטול'   value='".$row["IDInvitation"]."'>  <i class='fa fa-times' aria-hidden='true'></i>  </button> </td>";
                    }
                    else
                    {
                        echo "  <td> לא ניתן </td>
                        <td> לא ניתן </td>"; 
                    }
                    echo " <td> ".$row["OrderOpeningDate"]." </td>  </tr>"; 
                    
                    
                    
                }  
                else
                { 
                    
                                       
                                        
                    echo " <tr>   
                    <td> <button class='TreatmentOrdersSubmit'  name='מספרהזמנה'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
                    <td> ".$row["StatusInvitation"]." </td>
                     
                    <td>".$row["FullTextInvitation"]."</td>  
                    <td> ".$row["Remarks"]." </td> "; 
                    
                    
                    $StrFiles = explode("§", $row["Files"]);
                    $sizeStrFiles = sizeof($StrFiles);
                    
                    echo "<td>";
                    for($i=0;$i<$sizeStrFiles;$i++)
                    {
                        echo "<a download href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>"; 
                    } 
                    echo  "</td>  ";
                    
                    if($row["HowitWasDone"]=="טרם בוצע"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!="עבר לטיפול בשטח")
                    {
                        echo "  <td> <button class='faSubmit'    name='עריכה'   value='".$row["IDInvitation"]."'>  <i class='fa fa-cogs' aria-hidden='true'></i>  </button> </td>
                        <td> <button class='faSubmit' style=' float:center;'  name='ביטול'   value='".$row["IDInvitation"]."'>  <i class='fa fa-times' aria-hidden='true'></i>  </button> </td>";
                    }
                    else
                    {
                        echo "  <td> לא ניתן </td>
                        <td> לא ניתן </td>"; 
                    }
                    echo " <td> ".$row["OrderOpeningDate"]." </td>  </tr>"; 
                    

                }
            } 
        } 
    } 
 
   
   
   
   
   
   
   
   
   
    if($flag)
    {
        echo "<h1>אין לך הזמנות</h1>";
    }
 
 
$this->disconnect();
return;
}


 
	

/*** print all open invitations - only manager
 *
 *  return void
 */
public function MasterAffiliateInvitations() 
{
    $flag=1;
    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation");  
 

	while($row = $result->fetch(PDO::FETCH_ASSOC))
    { 
        if($row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!= "הזמנה נעולה") 
        {
            if($flag)
            {  
                $flag=0;
                    echo   "<tr>
                            <th>מס'<br>הזמנה</th>
                            <th>סטטוס</th>
                            <th>סוג<br>הזמנה</th>
                            <th>פרטי הזמנה</th>  
                            <th>קבצים</th>
                            <th>אישור מסירה</th>
                            <th>תצהירים</th>  
                            <th>פרטי השליח</th>  
                            <th>תאריך<br>פתיחת<br>הזמנה</th>
                            </tr>";
            } 
            echo " <tr> 
                
            <td> <input type='checkbox' name='formDoor[]'   value='".$row["IDInvitation"]."'>  <br>
            <button class='TreatmentOrdersSubmit'    name='View'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button></td>
            
            <td> ".$row["StatusInvitation"]." </td>
            <td> ".$row["OrderType"]." </td>
            
            <td><b><u>נמען:</u></b><br>".$row["TheNameOfTheCustomer"]."<br><br>
                <b><u>כתובת:</u></b><br>".$row["Address"]."<br><br>
                <b><u>טלפון:</u></b><br>".$row["PhoneOfTheRecipient"]."<br><br>
                <b><u>הערות:</u></b><br>".$row["Remarks"]."<br><br>
            </td>  "; 

          
    		$StrFiles = explode("§", $row["Files"]);
    		$sizeStrFiles = sizeof($StrFiles); 
    		echo "<td>";
    		for($i=0;$i<$sizeStrFiles;$i++) 
    		{ 
    		    echo "<a download     href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>";   
    		} 
    		echo "</td> ";
    		
    		
    	

				 
    		/////////////////////////////////////////   	
            //  delivery approval
    		if($row["OrderType"]=="מסירה משפטית")
    		{ 
                    echo "<td><a download  href='../PHP/uploads/".$row["IDInvitation"]."/".$row["deliveryApproval"]."'>".$row["deliveryApproval"]."</a></td> ";
                
    		}
    		else
    		{
                echo "<td>-הגשה-</td> "; 
    		}
      
        

    	  
    	  
    	  
    		/////////////////////////////////////////   		
            //  affidavits
    		if($row["OrderType"]=="מסירה משפטית")
    		{
    		    //  signed  affidavit
                if($row["ClosingFileSigned"]!="טרם הועלה תצהיר חתום")
                {
                    echo "<td> <u>תצהיר חתום:</u><br>
                    <a download href='../PHP/uploads/".$row["IDInvitation"]."/".$row["ClosingFileSigned"]."'>".$row["ClosingFileSigned"]."</a>   <br><br><br>";
                }
                else
                {
                    echo "<td> <u>תצהיר חתום:</u><br>טרם הועלה  <br><br>  "; 
                }   
                
                // unsigned affidavit
                if($row["ClosingFileUnsigned"]!="")
                {
                    echo "   <u> תצהיר לא חתום:</u><br>
                    <a download  href='../PHP/uploads/".$row["IDInvitation"]."/".$row["ClosingFileUnsigned"]."'>".$row["ClosingFileUnsigned"]."</a> <br><br><br></td> ";
                }
                else
                {
                    echo "   <u> תצהיר לא חתום:</u><br> טרם נוצר  <br><br><br></td>"; 
                }
                
                
                 
    		}
    		else
    		{
                echo "<td>-הגשה-</td> "; 
    		}
    		
        
    	 
    	 

            if($row["IdDeliveryInvitation"]!="0")
            {         
                echo "<td>
                    <b><u>מס' שליח:</u></b><br>".$row["IdDeliveryInvitation"]."<br><br>
                    <b><u>שם:</u></b>br>".$row["nameCourier"]."<br><br> 
                    </td>  "; 
  
            }
            else
            {
                echo "<td>טרם שוייך שליח</td> "; 
            }
                 
            echo "<td> ".$row["OrderOpeningDate"]." </td>   
            </tr> "; 

    		
    	 
        } 
    } 
    if($flag)
    {
        echo "<h1>בנתיים אין הזמנות פתוחות</h1>";
    }
$this->disconnect();
return;
}

 
 
 
 
 
 
 

/*** print all messages - only manager
 *
 *  return void
 */
public function MasterViewAllMessage() 
{
    $flag=1;   // if there are no messages
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `Messages` WHERE 1");  
 

	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
       if($row["StatusMessage"]=="בטיפול"&&$flag==1)
        {
            $flag=0;
            echo "
                <tr>
                <th>מס' <br>הודעה</th>
                <th>סטטוס</th>
                <th>תוכן הודעה</th>
                <th>תאריך פתיחת הודעה</th>
                <th>פרטי משתמש השולח</th>  
                </tr>"; 
        } 
        if($row["StatusMessage"]=="בטיפול")
        {
             
        echo    "<tr>".
                "<td> <button class='TreatmentOrdersSubmit' style='font-size: 20px; float:center;'  name='idMessage'   value='".$row["idMessage"]."'> &nbsp;".$row["idMessage"]."&nbsp;</button> </td>".
                "<td> ".$row["StatusMessage"]." </td>".
                "<td> ".$row["textMessage"]." </td>".
                "<td> ".$row["DateMessages"]." </td>". 
                "<td> "
                ."IdUser: ".$_SESSION['UserNow']->getIdUser()."<br>".  
                "שם: ".$_SESSION['UserNow']->getUserName() ."<br><br>".
                "מייל: ".$_SESSION['UserNow']->getEmail() ."<br><br>".
                "טלפון: ".$_SESSION['UserNow']->getMobile() ."<br><br>".
                "כתובת: ".$_SESSION['UserNow']->getStreet() ."<br><br>".
                "<br><br></td>"; 
                echo	" </tr> " ; 
                
        }
    }
    if($flag)
    {
        echo "<h1>אין כלום כי לא היה כלום - אף משתמש לא  השאיר הודעה <br><br></h1>";
    }

$this->disconnect();
return;
}








 
 


/*** print all invitations - only manager
 *
 *  return void
 */
public function MasterViewAllManagerOrders() 
{
    $flag=1;
    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation");  
 

	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
       if($flag) 
            {
                $flag=0;
                echo "
                    <tr>
                    <th>מס' <br>הזמנה</th>
                    <th>סטטוס</th> 
                    <th>פרטי ההזמנה</th> 
                    <th>קבצים</th>
                    <th>אישור מסירה</th> 
                    <th>תצהירים</th> 
                    <th>אופן ביצוע</th>
                    <th>פרטי השליח</th>
                    <th>תאריכי פתיחה וסגירת הזמנה</th> 
                   
                    </tr>
                ";
                
            }
			
     
        	echo " <tr>
    		<td> ".$row["IDInvitation"]." </td>
    		<td> ".$row["StatusInvitation"]." </td>
     	
            <td><b><u>סוג הזמנה:</u></b> <br> ".$row["OrderType"]." <br><br>
                <b><u>שם:</u></b> ".$row["TheNameOfTheCustomer"]." <br><br>
                <b><u>כתובת:</u></b> <br>  ".$row["Address"]." <br><br>
                <b><u>טלפון:</u></b> <br>  ".$row["PhoneOfTheRecipient"]." <br><br>
               <b><u>הערות:</u></b> <br>  ".$row["Remarks"]." </td>";
               
    		 
    		$StrFiles = explode("§", $row["Files"]);
    		$sizeStrFiles = sizeof($StrFiles); 
    		echo "<td>";
    		for($i=0;$i<$sizeStrFiles;$i++) 
    		{ 
    		    echo "<a download     href='../PHP/uploads/".$row["IDInvitation"]."/".$StrFiles[$i]."'>".$StrFiles[$i]."</a> <br><br>";   
    		} 
    		echo "</td> ";
    		
    				 
    		/////////////////////////////////////////   	
            //  delivery approval
    		if($row["OrderType"]=="מסירה משפטית")
    		{ 
                    echo "<td><a download  href='../PHP/uploads/".$row["IDInvitation"]."/".$row["deliveryApproval"]."'>".$row["deliveryApproval"]."</a></td> ";
                
    		}
    		else
    		{
                echo "<td>-הגשה-</td> "; 
    		}
      
        
    	  
    		/////////////////////////////////////////
            //  Affidavit
    		if($row["OrderType"]=="מסירה משפטית")
    		{

                if($row["ClosingFileSigned"]!="טרם הועלה תצהיר חתום")
                {
                    echo "<td> <u>תצהיר חתום:</u><br>
                    <a download href='../PHP/uploads/".$row["IDInvitation"]."/".$row["ClosingFileSigned"]."'>".$row["ClosingFileSigned"]."</a>   <br><br><br>";
                }
                else
                {
                    echo "<td> <u>תצהיר חתום:</u><br>טרם הועלה  <br><br>  "; 
                }   
                
                if($row["ClosingFileUnsigned"]!="")
                {
                    echo "   <u> תצהיר לא חתום:</u><br>
                    <a download  href='../PHP/uploads/".$row["IDInvitation"]."/".$row["ClosingFileUnsigned"]."'>".$row["ClosingFileUnsigned"]."</a> <br><br><br></td> ";
                }
                else
                {
                    echo "   <u> תצהיר לא חתום:</u><br> טרם נוצר  <br><br><br></td>"; 
                } 
    		}
    		else
    		{
                echo "<td>-הגשה-</td> "; 
    		}
    		
         	echo "<td> ".$row["HowitWasDone"]." </td>  ";
            
			echo "<td>
                <u>שם:</u><br>".$row["nameCourier"]."<br><br> 
                <u>הערות השליח:</u><br>	".$row["RemarksField"]." <br><br>
                </td> ";
                

        	echo "<td>  <u>תאריך פתיחת הזמנה:</u><br> ".$row["OrderOpeningDate"]." <br><br>  ";
    		if($row["OrderClosingDate"]=="0")
    		{
    			echo"<u>תאריך סגירת הזמנה:</u><br> טרם נסגר <br><br>  </td> ";
    	
    		} 
    		else
    		{
    			echo "<u>תאריך סגירת הזמנה:</u><br> ".$row["OrderClosingDate"]."<br><br> </td>";
    		}
 
    		" </tr> " ;
    
 
    }
        if($flag)
        {
            echo "<h1>אין כלום כי לא היה כלום - אף משתמש לא הזמין הזמנה</h1>";
        }

$this->disconnect();
return;
}







	/*** print all users - only manager
	 *
	 * @return void
	 */
public function MasterViewAllUsers() 
{
    $flag=1;
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `users` WHERE `PermissionsField`='2'");  
 
	while($row = $result->fetch(PDO::FETCH_ASSOC))
    { 
        if($row["PermissionsField"]=="2")
        {
              if($flag)
            {
                $flag=0;
                echo "  <tr> 
                        <th>פרטי המשתמש</th>
                        <th>שם המשרד</th>
                        <th>כתובת</th> 
                        <th>מתי נרשם</th> 
                        </tr>";
              
            }
            echo " <tr> 
            <td><u>מס' משתמש:</u><br> ".$row["IdUser"]."  <br><br>
                <u>מייל:</u><br>  ".$row["Email"]."  <br><br>
                <u>שם:</u><br>  ".$row["UserName"]."  <br><br>
                <u>טלפון:</u><br>  ".$row["Mobile"]." <br><br>  </td>
                
                
                 
            <td> ".$row["NameOfOffice"]." </td>
            <td> ".$row["Street"]." </td>
            <td> ".$row["timestam"]." </td> 
            </tr> " ; 
            
        }
    
      
    }
   if($flag)
    {
        echo "<H1>אין כלום כי לא היה כלום - אין משתמשים</H1>";
    }
   
$this->disconnect();
return;
}












/*** print all delivery persons - only manager
 *
 *  return void
 */
public function MasterViewAllCouriers() 
{
    $flag=1;
    $this->connect();
    $result = $this->connection->query("SELECT * FROM users");  
 

	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        if($row["PermissionsField"]=="3")
        {
             if($flag)
            {
                $flag=0;
                echo    "
                    <tr>
                    <th>מס שליח</th>
                    <th>פרטי השליח</th> 
                    <th>מתי נרשם</th>
                    </tr>";
            }
            
            echo " <tr> 
                <td> ".$row["IdUser"]."</td>
                
                <td><u>שם:</u><br> ".$row["UserName"]." <br><br>
                    <u>תז:</u><br> ".$row["IdentityCard"]."  <br><br>
                    <u>מייל:</u><br> ".$row["Email"]."<br><br>
                    <u>טלפון:</u><br> ".$row["Mobile"]."<br><br>
                    <u>כתובת:</u><br> ".$row["Street"]." <br><br></td>
                     
               <td> ".$row["timestam"]." </td></tr>";
            
            
          
        }
    }
    
    if($flag)
    {
        echo "<h1>אין שליחים - חוץ ממך</h1>";
    }

$this->disconnect();
return;
}













 
 



/***  check type invitation
 *
 *  param $IDinvitation
 *  return int
 */
public function CheckInvitationOrderType($IDinvitation): int
{ 
    $this->connect();
    $result = $this->connection->query("SELECT   `OrderType`  FROM invitation WHERE `IDInvitation`='$IDinvitation'");  
    $row = $result->fetch(PDO::FETCH_ASSOC);
   
    if($row["OrderType"]=="מסירה משפטית")
    {
        $this->disconnect();
        return 1;
    }
  
    $this->disconnect();
    return 0;
}




/***  invitation execution or update
 *
 *  param $submit - action
 *  param $IDinvitation
 *  return void
 */
public function CancelEditAdd($submit,$IDinvitation) 
{
    $this->connect();
    $result = $this->connection->query("SELECT  * FROM invitation WHERE `IDInvitation`='$IDinvitation'");  
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $StatusInvitation=$row["StatusInvitation"];
    
    
 
    
    
    if($submit=="אישוריםחתומים")
    {
        if($row["StatusInvitation"]!="הזמנה נעולה"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]=="בוצע בשטח"&&$row["OrderType"]=="מסירה משפטית"&&$row["ClosingFileSigned"]=="טרם הועלה תצהיר חתום")
        {
            echo   "
                <div class='title'>אישורים חתומים - הזמנה מספר  $IDinvitation  <br>תאריך פתיחת הזמנה - ".$row['OrderOpeningDate']."  </div><br><br><br><br><br><br><br><br><br><br><br>
                <div class='inputfield'>
            
                <input   type='text'  style=' color: white;  border: none; float:center;'     name='action' value='$submit' readonly><br><br><br>
            
                <label>אישור מסירה חתום</label> <br><br>
                <input    type='file'   name='SignedDeliveryConfirmation'  required><br><br><br><br><br><br><br>
              
                <label>תצהיר חתום</label> <br><br>
                <input   type='file'   name='SignedAffidavit'  required><br><br><br><br><br><br><br><br><br>
            
                <button  type='submit' class='btn' value='$IDinvitation'  name='submit'> בצע </button><br><br><br><br><br> </div>";

        }
        else
        {         
            echo "<script   type=\"text/javascript\">window.alert(' בהזמנה מספר $IDinvitation - לא ניתן להוסיף אישורים חתומים כי לא עומד בבדיקות הבאות: הזמנה בוטלה או נעולה או כתובת שגויה או היא אינה מסירה משפטית או לא הועלה תצהיר לא חתום או שלא בוצע עדיין בשטח');window.location.href = '../Pages/MasterInvitations.php';</script>"; 

        }
        
    }
    else if($submit=="עריכתהזמנה")
    {
        if($row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!="הזמנה נעולה"&&$row["StatusInvitation"]!="בוצע בשטח")
        {
            if($row["OrderType"]=="מסירה משפטית")
            {   
                echo "
                    <div class='title'>  עריכת הזמנה - מסירה משפטית מספר  $IDinvitation <br>תאריך פתיחת הזמנה - ".$row['OrderOpeningDate']."  <br><hr></div>
                    <div class='inputfield'>
                    
                    <input   type='text'  style=' color: white; border: none; float:center;'     name='action' value='$submit'  >
                    <input   type='text'  style=' color: white; border: none; float:center;'     name='OrderType' value='".$row["OrderType"]."'  ><br>
                    
                    
                    <input  class='input'  type='text' name='CaseNumber' placeholder='מספר תיק ".$row['CaseNumber']." ' ><br><br><br><br>

                    <label> סוג מסירה - ".$row['DeliveryType']." </label>
                    <br><select   class='input' name='DeliveryType'   size='5'   required>
                    <option>משפטית-התראה</option><option>משפטית-תביעה</option><option>הוצל''פ-התראה</option><option>הוצל''פ-אזהרה</option> </select ><br><br><br>
  
                    <input  class='input'  type='text' name='FullNameOfTheRecipient' placeholder=' שם מלא של הנמען - ".$row['TheNameOfTheCustomer']." '     ><br><br><br>
                    
                    <input  class='input'  type='text' name='toID' placeholder='ת.ז. של הנמען  - ".$row['IDOfTheCustomer']."'  ><br><br><br>
                    
                    <input  class='input'  type='text' name='PhoneOfTheRecipient' placeholder='טלפון של הנמען  - ".$row['PhoneOfTheRecipient']." '  ><br><br><br>
                    
                    <label> כתובת:  ".$row['Address']."  -   לא ניתן לשנות עיר</label>  <br><br><br>";
                  //  <input  class='input'  type='text' name='Address' placeholder='כתובת  - ".$row['Address']."'    > <br><br><br>
  
                    echo " <input  class='input'  type='text' name='Remarks'      placeholder='הערות   - ".$row['Remarks']." ' > <br><br><br><br>
              
                    <button  type='submit' class='btn' value='$IDinvitation'  name='submit'> בצע </button><br><br><br><br></div>";
 
            }
            else if($row["OrderType"]=="הגשה")
            {
                echo "
                    <div class='title'>  עריכת הזמנה -  הגשה  מספר  $IDinvitation <br>תאריך פתיחת הזמנה - ".$row['OrderOpeningDate']."  <br><hr></div>
                    <div class='inputfield'>
                    
                    <input   type='text'  style=' color: white; border: none; float:center;'     name='action' value='$submit'  ><br>
                    
                    
                    
                    <input  class='input'  type='text' name='FullNameOfTheRecipient'     placeholder='הגש ב..   - ".$row['TheNameOfTheCustomer']."''  ><br><br><br><br><br>
                    
                    
                     <label> כתובת:  ".$row['Address']."  - שם לב שאתה משנה לאותו עיר</label><br>
                    <input  class='input'  type='text' name='Address' placeholder='כתובת  - ".$row['Address']."'    > <br><br><br><br><br>
  
                    
                    <input  class='input'  type='text' name='Remarks'      placeholder='הערות   - ".$row['Remarks']." ' > <br><br><br><br><br>
                    
                    <button  type='submit' class='btn' value='$IDinvitation'  name='submit'> בצע </button><br><br><br><br></div>";
    
            }
            else
            {
                echo "<script   type=\"text/javascript\">window.alert(' ההזמנה $IDinvitation -  סוג הזמנה לא תקין');window.location.href = '../Pages/MasterInvitations.php';</script>"; 

            }
     
        }
        else
        {
            echo "<script   type=\"text/javascript\">window.alert(' הזמנה מספר $IDinvitation - לא ניתן לערוך אותה מהסיבות הבאות: המסירה בוצע כבר בשטח או בוטלה או נעולה');window.location.href = '../Pages/MasterInvitations.php';</script>"; 
        }
    }
     

 
    $this->disconnect();
    return;
}


 

/*** function that checks 3 things
 *  1  invitation - locked
 *  2 invitation - done
 *  3  invitation - cancelled
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return string
 */
public function MasterChecklockingCanceledDone($ArrIDInvitation,$SizeArr) 
{ 
    $stringInvitation=""; // all open invitations

    for($i=0; $i < $SizeArr; $i++)
    { 
        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation
        
        if($AllDataInvitation['StatusInvitation']=="בוצע בשטח"||$AllDataInvitation['StatusInvitation']=="הזמנה נעולה"||$AllDataInvitation['StatusInvitation']=="בוטל")  
        {
            $stringInvitation=$stringInvitation.$ArrIDInvitation[$i]." , ";
        }
      
        $this->disconnect();
    }
   
    return $stringInvitation;
 
}

 
 

/***  function that checks if the invitation has been done
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return string
 */
public function MasterChecklocIfDone($ArrIDInvitation,$SizeArr) 
{ 
    $stringInvitation=""; // all open invitations

    for($i=0; $i < $SizeArr; $i++)
    { 
        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation
        
        if($AllDataInvitation['HowitWasDone']=="טרם בוצע") 
        {
            $stringInvitation=$stringInvitation.$ArrIDInvitation[$i]." , ";
        }
      
        $this->disconnect();
    }
   
    return $stringInvitation;
 
}

 


/***   function that locks the invitation
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return void
 */
public function ClosedInvitation($ArrIDInvitation,$SizeArr) 
{   
    for($i=0; $i < $SizeArr; $i++)
    {    
        date_default_timezone_set("israel"); 
      	$OrderOpeningDate=date( 'd.m.y H:i:s', time());  //  now time and date
        
		$this->connect();
		$into=$this->connection->exec("UPDATE `invitation` SET  `OrderClosingDate`='$OrderOpeningDate'  , `StatusInvitation`='הזמנה נעולה'  WHERE `IDInvitation`='$ArrIDInvitation[$i]'");
		$this->disconnect(); 
    } 
    return; 
}
 
 
 
 
 
 
 
 
 
 
 

/***   function that checks if the invitation is locked or cancelled
 *
 *  param $ArrIDInvitation
 *  param $SizeArr
 *  return string
 */
public function MasterChecksIfCanceledLocking($ArrIDInvitation,$SizeArr) 
{  
    
    $stringInvitation=""; // all open invitations

    for($i=0; $i < $SizeArr; $i++)
    { 
        $this->connect();
        $result = $this->connection->query("SELECT * FROM `invitation` WHERE `IDInvitation`='$ArrIDInvitation[$i]'");  
        $AllDataInvitation = $result->fetch(PDO::FETCH_ASSOC); //   get all data invitation
        
        if($AllDataInvitation['StatusInvitation']=="הזמנה נעולה"||$AllDataInvitation['StatusInvitation']=="בוטל")  
        {
            $stringInvitation=$stringInvitation.$ArrIDInvitation[$i]." , ";
        }
      
        $this->disconnect();
    }
   
    return $stringInvitation;
 
}




 

/*** function print invitation for  delivery persons or manager
 *
 *  param $IdUser - delivery persons or manager
 *  return void
 */
public function TreatmentOrders($IdUser) 
{
        $flag=1;

    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation");  

  


	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        if($IdUser==$row["IdDeliveryInvitation"])
        {         

            if($row["HowitWasDone"]=="טרם בוצע"&&$row["StatusInvitation"]!="בוטל"&&$row["StatusInvitation"]!= "הזמנה נעולה")
            {    
                if($flag)
                {
                    $flag=0;
                    echo    "
                            <tr>
                            <th>מס' <br>הזמנה<br>[בחר]</th>
                            <th>סטטוס</th>
                            <th>סוג הזמנה</th>
                            <th>פרטי הזמנה</th>    
                            <th>תאריך פתיחת הזמנה</th> 
                            <th>פרטי המזמין</th>  
                            </tr>  ";
                }

            $DataUser = $this->connection->query("SELECT * FROM `users` WHERE `IdUser`='".$row['IdUserInvitation']."'");  
            $DataUser = $DataUser->fetch(PDO::FETCH_ASSOC);
            

 
            echo " <tr>
            <td> <button class='TreatmentOrdersSubmit'    name='formDoor'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
            <td> ".$row["StatusInvitation"]." </td>
            <td> ".$row["OrderType"]." </td>
            
            <td><u>נמען:</u><br> ".$row["TheNameOfTheCustomer"]."  <br><br> 
                <u>מען:</u><br>".$row["Address"]."   <br><br> 
                <u>טלפון הנמען:</u><br> ".$row["PhoneOfTheRecipient"]."<br><br> 
                <u>הערות:</u><br>".$row["Remarks"]." </td>
                
            <td> ".$row["OrderOpeningDate"]." </td> 
            
            <td><u>שם:</u><br>".$DataUser["UserName"]."<br><br>
                <u>טלפון:</u><br> ".$DataUser["Mobile"]." <br><br>
                <u>כתובת:</u><br> ".$DataUser["Street"]." </td> 
            </tr> " ;
            }
        }
     
      
    }
    if($flag)
    {
        echo "<h1>אין לך הזמנות לביצוע</h1>";
    }

                
$this->disconnect();
return;
}





/***   checking if invitation is locked before execution
 *
 *  param $IDInvitations
 *  return mixed
 */
public function DeliveryCheckBeforePerforming($IDInvitations)  
{
    
    $this->connect();
    $result = $this->connection->query("SELECT  `StatusInvitation` FROM invitation WHERE `IDInvitation`='$IDInvitations'");  
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $this->disconnect();
    return $row['StatusInvitation']; 
}











/*** print data message - only manager
 *
 *  param $IdMessage
 *  return void
 */
public function  DetaMessages($IdMessage) 
{ 
    $this->connect();
    $result = $this->connection->query("SELECT * FROM `Messages` WHERE `idMessage`='$IdMessage'");  
    $AllDataMessage = $result->fetch(PDO::FETCH_ASSOC); //   get data for message
 
    if($AllDataMessage['StatusMessage']=="בטיפול")
    {  
        echo    "<div  style='font-size: 20px;  ' >".
                " מספר הזמנה - ".$AllDataMessage['idMessage']."<br><br><br>".$AllDataMessage['textMessage']."<br><br><br> </div>
                
                <div class='inputfield'>
                <button   style='font-size: 20px;' type='submit' class='btn' value=".$AllDataMessage['idMessage']."  name='submit'>סגור הודעה</button> 
                </div><br><br><br><br><br >"; 
 
    } 
    else
    {
        echo "אין הודעות פתוחות";
    } 
        
    $this->disconnect();
    return;
    
    
    
    /*
        echo "<br>AA<pre>";
        print_r($AllDataMessage);
        echo "</pre>";
        
        die("<br><br><br><br><br> ");
         
    */
}





/*** Prints the invitation selected for execution
 *  param $IDInvitations
 *  return void
 */
public function OrderHandling($IDInvitations)  
{
    
    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation WHERE `IDInvitation`='$IDInvitations'");  
   
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $IdUserInvitation=$row["IdUserInvitation"]; // id user
 
    $DataUser = $this->connection->query("SELECT * FROM `users` WHERE `IdUser`='".$IdUserInvitation."'");  
    $DataUser = $DataUser->fetch(PDO::FETCH_ASSOC);
    
    echo "<table class='customers'>
        <tr>
        <th>מס' <br>הזמנה</th> 
        <th>סוג הזמנה</th>
        <th>פרטי ההזמנה</th> 
        <th>פרטי המזמין</th>  >        
        <th>תאריך פתיחת הזמנה</th> 
        </tr>
   
        <tr>
        <td> ".$IDInvitations." </td>
        <td> ".$row["OrderType"]." </td>
        
        <td><u>שם:</u> <br> ".$row["TheNameOfTheCustomer"]." <br><br>
            <u>כתובת:</u> <br>  ".$row["Address"]." <br><br>
            <u>טלפון:</u> <br>  ".$row["PhoneOfTheRecipient"]." <br><br>
            <u>הערות:</u> <br>  ".$row["Remarks"]." </td>
            
        <td><u>שם: </u><br>  ".$DataUser["UserName"]."   <br><br>
            <u>טלפון:</u> <br>  ".$DataUser["Mobile"]. "  <br><br>
            <u>כתובת: </u><br>   ".$DataUser["Street"]." </td> 
        
        <td> ".$row["OrderOpeningDate"]." </td> 
        </tr> </table>";
        
 
 
    $this->disconnect();
    return; 
}

 
 
  
   


/*** save photo
 *  param $IDInvitations
 *  return string
 */
public function SavePhoto($IDInvitations):string
{ 
    $uploadfile ="uploads/$IDInvitations/". $_FILES['Photo']['name'];

    move_uploaded_file($_FILES['Photo']['tmp_name'], $uploadfile) ;
    
    return $_FILES['Photo']['name'];    // return name photo
}



/*** function that performs the invitation - delivery person or manager
 *
 *  param $IDInvitations
 *  return void
 */
public function DeliveryHandling($IDInvitations)
{
    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation WHERE `IDInvitation`='$IDInvitations'");  
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $OrderType=$row["OrderType"];  // type invitation
 
    if($OrderType=="מסירה משפטית")
    {
        $DeliveryType=$row["DeliveryType"];  // type of delivery (writ of execution - ochaa lapoal or legal)
    }
      
    
    $this->disconnect();
    
    
    if($OrderType=="הגשה") // submission
    {
       
        echo   "<div class='inputfield'>
                <br><br><br><br> 
                <label>ביצוע ההגשה<br></label>
                <br><hr><br><br><br><br>
            
                <label>  אופן ביצוע הזמנת  <input style=' border: none;  width: 4%;    font-size: 20PX;'  type='text'   name='OrderType' value='$OrderType' readonly>  </label><br><br><br>
                
                <select class='input' name='Execution'  class='SelectStyle' required><option></option> 
                <option>הוגש</option><option>לא הוגש</option></select><br><br><br><br><br><br>
                
                <label>הוסף תמונה</label> <br>
                <input   type='file'   name='Photo'  required><br><br><br><br>
                
                <label> ביצוע ביום </label><br>
                <input  class='input'  type='date' name='date3' required><br><br><br><br>
     
                <input  class='input'  type='text' name='Remarks' placeholder='הערות'><br><br><br><br><br><br>
                
                <button  type='submit' class='btn' value='$IDInvitations'  name='submit'>  בצע הזמנה מספר  $IDInvitations</button><br><br><br><br><br> </div>";

    }
    else if($OrderType=="מסירה משפטית") //   legal
    {
        
        if($DeliveryType=="משפטית-התראה"||$DeliveryType=="משפטית-תביעה")
        {
   
            echo   "<div class='inputfield'>
                    <br><br><br><br> 
                    <label>ביצוע מסירה<br></label>
                    <br><hr><br><br><br><br>
                   
                    <label>  אופן ביצוע הזמנת  <input style=' border: none;  width: 4%;    font-size: 20PX;'  type='text'   name='OrderType' value='$OrderType' readonly>  </label><br><br>
                    
                    <select class='input' name='Execution'  class='SelectStyle'  id='Execution' onchange='Family()'  required>
                    <option></option> 
                    <option>נמסר לנמען</option>
                    <option>בן/ת משפחה</option>
                    <option>נמסר לנמען אך סירב לחתום</option>
                    <option>סירב לחתום ולקבל -הושאר במקום</option>
                    <option>מסרתי את הכתב למורשה של הנעמן</option>
                    <option>ביקור שלישי הודבק במקום</option>
                    <option>כתובת שגויה</option>
                    </select><br><br>
                    </div> 
                    
                    
                    <div class='inputfield'  id='Continued'>  
                    
                     
                    </div> <br><br>
                    
                    <div class='inputfield'>
                    <button  type='submit' class='btn' value='$IDInvitations'  name='submit'>  בחר אופן ביצוע הזמנה $IDInvitations </button><br><br><br><br><br> </div>";
   
        }
        
        else   //  writ of execution - ochaa lapoal
        {
  
            echo   "<div class='inputfield'>
                    <br><br><br><br> 
                    <label>ביצוע מסירה<br></label>
                    <br><hr><br><br><br><br>
                   
                    <label>  אופן ביצוע הזמנת  <input style=' border: none;  width: 4%;    font-size: 20PX;'  type='text'   name='OrderType' value='$OrderType' readonly>  </label><br><br>
                    
                    <select class='input' name='Execution'  class='SelectStyle'  id='Execution' onchange='Family()'  >
                    <option></option> 
                    <option>נמסר לנמען</option>
                    <option>בן/ת משפחה</option>
                    <option>נמסר לנמען אך סירב לחתום</option>
                    <option>סירב לחתום ולקבל -הושאר במקום</option>
                    <option>ביקור שלישי הודבק במקום</option>
                    <option>כתובת שגויה</option>
                    </select><br><br>
                    </div> 
                    
                    
                    <div class='inputfield'  id='Continued'>  
                    
                     
                    </div> <br><br>
                    
                    <div class='inputfield'>
                    <button  type='submit' class='btn' value='$IDInvitations'  name='submit'>  בחר אופן ביצוע הזמנה $IDInvitations </button><br><br><br><br><br> </div>";

        }
   
    }
    else 
    {
               echo "<br><br>000000000<br><br><br><br>";
 
    }
    
    return;
}




/***  submission execution
 *  param $IDInvitations
 *  param $PhotoNam  -  name photo
 *  param $Execution - mode of operation
 *  param $Remarks
 *  param $date3  - 3 visit
 *  return void
 */
public function DoSubmission($IDInvitations,$PhotoNam,$Execution,$Remarks="",$date3)
{
    $StatusInvitation="בוצע בשטח";
  
    $this->connect();
	$into=$this->connection->exec("UPDATE `invitation` SET `DayDelivered`='$date3' ,`StatusInvitation`='$StatusInvitation',`Photography`='$PhotoNam'  ,`HowitWasDone`='$Execution' ,`RemarksField`='$Remarks'   WHERE `IDInvitation`='$IDInvitations'");
	$this->disconnect();
 
    return;     
}

  


/***  delivery  execution (writ of execution - ochaa lapoal or legal)
 *
 *  param $IDInvitations
 *  param $PhotoNam   -  name photo
 *  param $Execution - mode of operation
 *  param $Remarks
 *  param $TypeFamily - affinity
 * param $NAME  - who received
 * param $date1  - day 1
 * param $date2 - day 2
 * param $date3 - day 3
 * param $time1 - time 1
 * param $time2 - time 2
 * param $time3 - time 3
 * param $VerificationSource
 * return void
 */
public function DoDelivery($IDInvitations,$PhotoNam,$Execution,$Remarks="",$TypeFamily="",$NAME,$date1="",$date2="",$date3,
                           $time1="",$time2="",$time3,$VerificationSource)
{
   /*
    echo "<br>";
    echo "אידי הזמנה  ".$IDInvitations."<br>";
    echo "תמונה  ".$PhotoNam."<br>";
    echo"  אופן ביצוע".$Execution ."<br>";
    echo "  הערות".$Remarks."<br>";
    echo "  סוג קרבה".$TypeFamily."<br>";
    echo "  שם הנמסר".$NAME."<br>";
    echo"  יום 1". $date1."<br>";
    echo " יום 2".$date2."<br>";
    echo "יום 3 ".$date3."<br>";
    echo " שעה 1  " .$time1."<br>";
    echo "שעה 2  ".$time2."<br>";
    echo"שעה 3 ". $time3."<br>";
    
    */
    $StatusInvitation="בוצע בשטח";
  
    $this->connect();
	$into=$this->connection->exec("UPDATE `invitation` SET `NameReceiver`='$NAME' ,`StatusInvitation`='$StatusInvitation',`VerificationSource`='$VerificationSource', `TypeOfCloseness`='$TypeFamily', `Day1`='$date1',`Day2`='$date2',`DayDelivered`='$date3',`time1`='$time1',`time2`='$time2',`timeDelivered`='$time3', `Photography`='$PhotoNam'  ,`HowitWasDone`='$Execution' ,`RemarksField`='$Remarks'   WHERE `IDInvitation`='$IDInvitations'");
	$this->disconnect();
 
    return;     
}
 



/*** print all invitations for delivery person or manager
 *
 *  param $IdUser
 *  return void
 */
public function DeliveryViewAllCourierOrders($IdUser) 
{
    $flag=1;
    $this->connect();
    $result = $this->connection->query("SELECT * FROM invitation");  

	while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        if($IdUser==$row["IdDeliveryInvitation"])
        {
            
            if($flag)
            {
                $flag=0;
                    echo "<tr>
                    <th>מס' <br>הזמנה<br>[עריכת ביצוע]</th>
                    <th>סטטוס</th>
                    <th>סוג הזמנה</th>
                    <th>פרטי הזמנה</th> 
                    <th>איך בוצע</th> 
                    <th>הערות השליח</th> 
                    <th>תאריך פתיחת הזמנה</th> 
                    </tr>";
            }
	 
       
            echo "  <tr>
            <td> <button class='TreatmentOrdersSubmit' style='font-size: 20px;  '  name='formDoor'   value='".$row["IDInvitation"]."'> &nbsp;".$row["IDInvitation"]."&nbsp;</button> </td>
            <td> ".$row["StatusInvitation"]." </td>
            <td> ".$row["OrderType"]." </td>
            <td><u>שם:</u><br> ".$row["TheNameOfTheCustomer"]."  <br><br>
                <u>כתובת:</u><br>  ".$row["Address"]." <br><br>
                <u>טלפון:</u><br>  ".$row["PhoneOfTheRecipient"]." <br><br>
                <u>הערות:</u><br>  ".$row["Remarks"]." </td>
            <td> ".$row["HowitWasDone"]." </td> 
            <td> ".$row["RemarksField"]." </td> 
            <td> ".$row["OrderOpeningDate"]." </td>  
            </tr> " ;
        }
    } 
  
    if($flag)
    {
        echo "<h1>חכה חכה תכף יהיה עבודה אל תדאג</h1>";
    }
			
$this->disconnect();
return;
}




/*** return all data for invitation for creating an affidavit
 *
 *  param $IDInvitation
 *  return mixed
 */
public function OrderDeliveryType($IDInvitation) 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT *  FROM `invitation` WHERE  `IDInvitation`='$IDInvitation'");  
    
    $row = $result->fetch(PDO::FETCH_ASSOC);
    
    $this->disconnect();
    return $row;
}





/*** function return how many users there are
 *
 *  return mixed
 */
public function CountRegisteredUsers() 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT COUNT(IdUser) as max FROM users WHERE PermissionsField=2");   
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $this->disconnect(); 
    
    return $row["max"];
}




/***  function return how many delivery persons there are
 *
 *  return mixed
 */
public function CountCourier() 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT COUNT(IdUser) as max FROM users WHERE PermissionsField=3");   
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $this->disconnect(); 
    
    return $row["max"];
}






/*** function return how many invitations there are
 *
 *  return mixed
 */
public function CountInvitations() 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT COUNT(IDInvitation) as max FROM invitation");   
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $this->disconnect(); 
    
    return $row["max"];
}






/***  function return how many open invitations there are
 *
 *  return mixed
 */
public function CountInvitationsOpen() 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT COUNT(IDInvitation) as max FROM invitation WHERE StatusInvitation!='הזמנה נעולה'");   
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $this->disconnect(); 
    
    return $row["max"];
}





/***  return how many invitation does the employee have - delivery person or manager
 *  param $IdUser
 *  return mixed
 */
public function CountTreatmentOrders($IdUser) 
{
    
    $this->connect();
    $result = $this->connection->query("SELECT COUNT(IDInvitation) as max FROM invitation WHERE IdDeliveryInvitation='$IdUser' AND StatusInvitation!='הזמנה נעולה'");    
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $this->disconnect(); 
    
    return $row["max"];
}


/************* TODO -  NOT DONE
 *
 *  param $str
 *  return mixed
 */
public function CorrectionQuotesStr($str) 
{   
    $checkIntStr=1;
    $sizeStr=strlen($str);
    $flag=0;
    
    while($checkIntStr !== false)
    { 
        $checkIntStr = strpos($str, '"');  // check if there is (")
        if($checkIntStr !== false)
        { 
        	$newStr=$str; 
        	$newStr[$checkIntStr]='\"';
         
        	for($i=1+$checkIntStr;$checkIntStr<$sizeStr;$i++,$checkIntStr++)
        	{
        		$newStr[$i]=$str[$checkIntStr];
        	}  
        	$flag=1;   
        } 
    } 
    if($flag==1)
    {
        return $newStr; 
    } 
    
    return $str;
}














   
/* 
פוקנציה שיוצרת קובת טקסט בכל פעם שמישהו נכנס לאתר בעמוד הרשמה 

 
*/ 
public function FuncCOUNTentry() 
{   
    require_once '../PHP/COUNTentry/SxGeo.php';



    $fi = new FilesystemIterator("../PHP/COUNTentry", FilesystemIterator::SKIP_DOTS); //   count pages for file/s
    $CountFile=iterator_count($fi)+1;
    
    
    
    $ip = getHostByName(getHostName());
   

    $SxGeo=new SxGeo('../PHP/COUNTentry/SxGeoCity.dat',SXGEO_BATCH | SXGEO_MEMORY);
    //  $city=$SxGeo->getCityFull($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];

  

    $myfile = fopen("../PHP/COUNTentry/$CountFile.txt", "w") or die("Unable to open file!");
    $txt =  "\n\n\n\n\n".$ip.
            "\n\n\n"."תאריך:". date("d-m-Y") .
            "\nשעה: ".date("h:i:sa").
            "\n\nHTTP_USER_AGENT: ".$useragent."\n";




         
    
    
    
    fwrite($myfile, $txt);
    
    fclose($myfile);


}



 

 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 

}	





	 
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


















 
