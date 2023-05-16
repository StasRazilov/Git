<?php
class Text 
{
	private $text; // ישמור את הטקסט שהוקלט 
	
	function set(string $text):string
	{
		$this->text=$text;
		return $this->text;
	}
	
	function bold(string $str):string
	{
		$this->text=str_replace($str,'<b>'.$str.'</b>',$this->text);
		return $this->text;
	}
	
	
	function italic(string $str):string
	{
		$this->text=str_replace($str,'<i>'.$str.'</i>',$this->text);
		return $this->text;
	}
	
	
	function underline(string $str):string
	{
		$this->text=str_replace($str,'<u>'.$str.'</u>',$this->text);
		return $this->text;
	}

	
}
 
?>



