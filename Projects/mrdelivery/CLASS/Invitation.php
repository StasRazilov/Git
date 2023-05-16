<?php
class Invitation
{
   
	
// 	protected $IDInvitation;
	protected $TheNameOfTheCustomer;
	protected $OrderType;
	protected $Address;
	protected $Price;
	protected $Files;
//	protected $ClosingFile;
	protected $Remarks;
//	protected $OrderOpeningDate;
//	protected $OrderClosingDate;
//	protected $IdUserInvitation;
//	protected $DeliveryApproval;
	protected $CaseNumber;
	protected $ThanTheSiteRules;
//	protected $StatusInvitation;
	protected $PhoneOfTheRecipient;
//	protected $IdDeliveryInvitation;
	protected $toID;
	protected $source_file;
	protected $DeliveryType;
	protected $SizeArrFiles;
    
    
    
	public function __construct($TheNameOfTheCustomer,$OrderType,$Address,$Price,$Files,$Remarks,$CaseNumber,$PhoneOfTheRecipient
	                            ,$ThanTheSiteRules,$toID,$source_file,$DeliveryType,$SizeArrFiles)
    { 
 
		$this->TheNameOfTheCustomer=$TheNameOfTheCustomer;
		$this->OrderType=$OrderType;
		$this->Address=$Address;
		$this->Price=$Price;
		$this->Files=$Files;
		$this->Remarks=$Remarks;
		$this->CaseNumber=$CaseNumber;
		$this->PhoneOfTheRecipient=$PhoneOfTheRecipient;
		$this->ThanTheSiteRules=$ThanTheSiteRules;
		$this->toID=$toID;
		$this->source_file=$source_file;
		$this->DeliveryType=$DeliveryType;
		$this->SizeArrFiles=$SizeArrFiles;
	
	}

	
 /*
	/////////////////////////////////////
    public function getIDInvitation()
    {
        return $this->IDInvitation;
    }
	 
    public function setIDInvitation($IDInvitation)
    {
        $this->IDInvitation=$IDInvitation;
    }
	/////////////////////////////////////
 */
	
	
	/////////////////////////////////////
    public function getTheNameOfTheCustomer()
    {
        return $this->TheNameOfTheCustomer;
    }
	 
    public function setTheNameOfTheCustomer($TheNameOfTheCustomer)
    {
        $this->TheNameOfTheCustomer=$TheNameOfTheCustomer;
    }
	/////////////////////////////////////
	
	
	
	
	/////////////////////////////////////
    public function getOrderType()
    {
        return $this->OrderType;
    }
	 
    public function setOrderType($OrderType)
    {
        $this->OrderType=$OrderType;
    }
	/////////////////////////////////////

	
	
	/////////////////////////////////////
    public function getAddress()
    {
        return $this->Address;
    }
	 
    public function setAddress($Address)
    {
        $this->Address=$Address;
    }
	/////////////////////////////////////
	
	
  
	/////////////////////////////////////
    public function getPrice()
    {
        return $this->Price;
    }
	 
    public function setPrice($Price)
    {
        $this->Price=$Price;
    }
	/////////////////////////////////////

	
	/////////////////////////////////////
    public function getFiles()
    {
        return $this->Files;
    }
	 
    public function setFiles($Files)
    {
        $this->Files=$Files;
    }
	/////////////////////////////////////

	
	
	/*
	/////////////////////////////////////
    public function getClosingFile()
    {
        return $this->ClosingFile;
    }
	 
    public function setClosingFile($ClosingFile)
    {
        $this->ClosingFile=$ClosingFile;
    }
	/////////////////////////////////////
*/
	
	
	/////////////////////////////////////
    public function getRemarks()
    {
        return $this->Remarks;
    }
	 
    public function setRemarks($Remarks)
    {
        $this->Remarks=$Remarks;
    }
	/////////////////////////////////////

	
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
	/* 
    public function getOrderOpeningDate()
    {
        return $this->OrderOpeningDate;
    }
	 
    public function setOrderOpeningDate($OrderOpeningDate)
    {
        $this->OrderOpeningDate=$OrderOpeningDate;
    }
 
	

	
	
	 
    public function getOrderClosingDate()
    {
        return $this->OrderClosingDate;
    }
	 
    public function setOrderClosingDate($OrderClosingDate)
    {
        $this->OrderClosingDate=$OrderClosingDate;
    }
 	*/ 
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
	
	
	
	/*
	/////////////////////////////////////
    public function getIdUserInvitation()
    {
        return $this->IdUserInvitation;
    }
	
    public function setIdUserInvitation($IdUserInvitation)
    {
        $this->IdUserInvitation=$IdUserInvitation;
    }
	/////////////////////////////////////
	 */
	 
	 

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
    /*
    public function getDeliveryApproval()
    {
        return $this->DeliveryApproval;
    }
	
    public function setDeliveryApproval($DeliveryApproval)
    {
        $this->DeliveryApproval=$DeliveryApproval;
    }
    */
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////	 
	 
	 
	 
	 
	/////////////////////////////////////
    public function getCaseNumber()
    {
        return $this->CaseNumber;
    }
	
    public function setCaseNumber($CaseNumber)
    {
        $this->CaseNumber=$CaseNumber;
    }
	/////////////////////////////////////
	 
	 
	 
	 
  
	/////////////////////////////////////
    public function getThanTheSiteRules()
    {
        return $this->ThanTheSiteRules;
    }
	
    public function setThanTheSiteRules($ThanTheSiteRules)
    {
        $this->ThanTheSiteRules=$ThanTheSiteRules;
    }
	/////////////////////////////////////
  
    
    /*
	/////////////////////////////////////
    public function getStatusInvitation()
    {
        return $this->StatusInvitation;
    }
	
    public function setStatusInvitation($StatusInvitation)
    {
        $this->StatusInvitation=$StatusInvitation;
    }
	/////////////////////////////////////
	*/
	 
 


	/////////////////////////////////////
    public function getPhoneOfTheRecipient()
    {
        return $this->PhoneOfTheRecipient;
    }
	
    public function setPhoneOfTheRecipient($PhoneOfTheRecipient)
    {
        $this->PhoneOfTheRecipient=$PhoneOfTheRecipient;
    }
	/////////////////////////////////////
	
	
	
	
	/*
	/////////////////////////////////////
    public function getIdDeliveryInvitation()
    {
        return $this->IdDeliveryInvitation;
    }
	
    public function setIdDeliveryInvitation($IdDeliveryInvitation)
    {
        $this->IdDeliveryInvitation=$IdDeliveryInvitation;
    }
	/////////////////////////////////////
    */



	/////////////////////////////////////
    public function getToID()
    {
        return $this->toID;
    }
	
    public function setToID($toID)
    {
        $this->toID=$toID;
    }
	/////////////////////////////////////


 
 
	/////////////////////////////////////
    public function getSource_file()
    {
        return $this->source_file;
    }
	
    public function setSource_file($source_file)
    {
        $this->source_file=$source_file;
    }
	/////////////////////////////////////
 

  




	/////////////////////////////////////
    public function getDeliveryType()
    {
        return $this->DeliveryType;
    }
	
    public function setDeliveryType($DeliveryType)
    {
        $this->DeliveryType=$DeliveryType;
    }
	/////////////////////////////////////
 

 
  
	/////////////////////////////////////
    public function getSizeArrFiles()
    {
        return $this->SizeArrFiles;
    }
	
    public function setSizeArrFiles($SizeArrFiles)
    {
        $this->SizeArrFiles=$SizeArrFiles;
    }
	/////////////////////////////////////
 

 
 
  

}



	
?>