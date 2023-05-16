<?php
abstract class Car
{
	public $x;
	public $y;


public function __construct($x,$y)
{
	$this->x=$x;
	$this->y=$y;
}

abstract public function move($x,$y);
abstract public function sound();

}


?>