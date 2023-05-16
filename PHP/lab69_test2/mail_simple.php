<?php
$text="aaaaaaaaaaaaaaaaaaaa"; 
$tos=array("a_a@a_a","b_b@b_b","aa@aa","bb@bb");
$tpl=file_get_contents("mail.eml");

foreach($tos as $to)
{
	$mail=$tpl;
	$mail=strtr($mail,array(
	"{TO}" =>$to,
	"{TEXT}"=>$text,
	));
	list($head,$body)=preg_split("/\r?\n\r?\n/s",$mail,2);
	mail("","",$body,$head);
}
 


?>