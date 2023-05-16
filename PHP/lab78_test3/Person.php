<?php
class Person{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $userpassword;
    
    /**
     * Getting id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setting id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

   
   /**
     * Getting firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Setting firstName
     *
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

    }
   
   /**
     * Getting lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Setting lastName
     *
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

    }
	
	
	/**
     * Getting email
     */ 
    public function getusername()
    {
        return $this->username;
    }

    /**
     * Setting email
     */ 
    public function setEmail($username)
    {
        $this->username = $username;
    }

	
	 /**
     * Getting userpassword - מחזיר את הנתון לדוגמא לצורך הדפסה 
     */ 
    public function getuserpassword()
    {
        return $this->userpassword;
 	
    }

    /**
     * Setting userpassword - שומר את המשנה פה- מכניס את הנתון 
     */ 
    public function setuserpassword($userpassword)
    {
        $this->userpassword = password_hash($userpassword,PASSWORD_DEFAULT);
    }
	
	 
    
    public function toString()
	{
        return $this->id." ".$this->firstName."".$this->lastName." ".$this->username." ".$this->userpassword;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>