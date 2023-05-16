<?php
class FirstClass
{
	private $st;
		
	function __construct($hello="hi")
	{
		$this->st=$hello;
	}
	
 
	
	public function myPrint()
	{
		echo $this->st."<br>";
	}
	
	function __destruct()
	{
		$this->st="";
		echo "destructor fonc <br>";
	}
}
	
?>
 