<?php
   class User
{
    protected $IdUser;
    protected $Email;
    protected $UserName;
    protected $Password;
    protected $IdentityCard;
	protected $PermissionsField;
	protected $Mobile;
	protected $NameOfOffice;
	protected $Street;
    protected $Timestam;
	protected $ThanTheSiteRules;
	protected $FixedPrice;
	
	 
	
 


	
	/////////////////////////////////////
    public function getIdUser()
	{
        return $this->IdUser;
    }
	 
    public function setIdUser($IdUser)
    {  
        return $this->IdUser=$IdUser;
    }
	/////////////////////////////////////
	
	
	
	
	
	/////////////////////////////////////
    public function getEmail()
    {
        return $this->Email;
    }
 
    public function setEmail($Email)
    {
        $this->Email=$Email;
    }
	/////////////////////////////////////

	
	
	
	/////////////////////////////////////
    public function getUserName()
    {  
        return $this->UserName;
    }
 
    public function setUserName($UserName)
    {
        $this->UserName=$UserName;
    }
	/////////////////////////////////////
	
	
	
	/////////////////////////////////////
    public function getPassword()
    {
        return $this->Password;    
    }
 
    public function setPassword($Password) 
    {
        $this->Password=$Password;
    }
	/////////////////////////////////////
	
	
	
	
	/////////////////////////////////////
    public function getIdentityCard()
    {
        return $this->IdentityCard;
    }
	 
    public function setIdentityCard($IdentityCard)
    {
        $this->IdentityCard=$IdentityCard;
    }
	/////////////////////////////////////
	
	
	
	/////////////////////////////////////
    public function getPermissionsField()
    {
        return $this->PermissionsField;
    }
	 
    public function setPermissionsField($PermissionsField)
    {
        $this->PermissionsField=$PermissionsField;
    }
	/////////////////////////////////////
	
	
	
	/////////////////////////////////////
    public function getMobile()
    {
        return $this->Mobile;
    }
	 
    public function setMobile($Mobile)
    {
        $this->Mobile=$Mobile;
    }
	/////////////////////////////////////
	
	
	
	
	/////////////////////////////////////
    public function getNameOfOffice()
    {
        return $this->NameOfOffice;
    }
	 
    public function setNameOfOffice($NameOfOffice)
    {
        $this->NameOfOffice=$NameOfOffice;
    }
	/////////////////////////////////////

	
	
	/////////////////////////////////////
    public function getStreet()
    {
        return $this->Street;
    }
	 
    public function setStreet($Street)
    {
        $this->Street=$Street;
    }
	/////////////////////////////////////
	
	
	
	
		/////////////////////////////////////
    public function getTimestam()
    {
        return $this->Timestam;
    }
	 
    public function setTimestam($Timestam)
    {
        $this->Timestam=$Timestam;
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
	 
 
 
	/////////////////////////////////////
    public function getFixedPrice()
	{
        return $this->FixedPrice;
    }
	 
    public function setFixedPrice($FixedPrice)
    {  
        return $this->FixedPrice=$FixedPrice;
    }
	/////////////////////////////////////
	
	
	
	
	
}
	
 
?>