<?php

require_once "car.php";

class Auto extends Car
{
	public function move($x,$y)
	{
		$this->sound();
		echo "moving car from($this->x,$this->y)to($x,$y)<br>";
		$this->x;
		$this->y;
	}
	
	public function sound()
	{
		echo "tae sound of a car";
	}
	
	 
}

 
?>