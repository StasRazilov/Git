 
<!DOCTYPE html>
<html lang="en" lang="he">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>הזמנות לשיוך</title> 
    <link rel="stylesheet" href="../CSS/stayle.css">
    <link rel="shortcut icon"  type="image/x-icon"    href="../images/logo_AA.ico"/>
    <link rel="stylesheet" type="text/CSS" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="../JS/PriceCity.js"></script>
</head>

<body dir="rtl">
<?php
require_once('../Pages/require_once/CheckUser.php');
?>
 

 
<form  id="formInvitation"  class="contact-form" method="post" action="../PHP/B.php">
 <div   class="wrapper"  >   
  <div class="title">הזמנות לשיוך - 
  
<?php
require_once "../PHP/dbClass.php";
$db = new dbClass();

$CountInvitationsOpen=$db->CountInvitationsOpen();

echo "  מס' הזמנות פתוחות:  $CountInvitationsOpen"; 
?>
</div><br><br><br><br><br><br><br><br>


    <div class="form">
 
  
 
  <!--            <input  class="MasterinputEMAIL"    type="email" name="EMAIL" placeholder="*מייל "    />                    -->
<?php  
 
echo "<select class='MasterinputEMAIL' name='EMAIL'      required>";
$db->ArrCourier();
echo" </select > ";
    


?>
<button class="MasterInvitationsSubmit"  style='  margin-right:10px;  '  value='שייך'  name='submit'>&nbsp;&nbsp;שייך&nbsp;&nbsp;</button> 

 





<select   style='  margin-right:200px;  '  class='MasterinputEMAIL'  name='SearchBy'  >
<option value="IDInvitation" > מספר הזמנה </option>  
<option value="TheNameOfTheCustomer" > שם הנמען או הגשה </option>  
<option value="IDOfTheCustomer" > תז של הנמען </option>  
<option value="OrderType" > סוג הזמנה </option>  
<option value="Address" > כתובת </option>  
<option value="StatusInvitation" > סטטוס </option>  
</select >  

<input style='  margin-right:10px;  '   class="MasterinputEMAIL"    type="text" name="Search" placeholder=" חפש... "    />    

<button  style='  margin-right:10px;  ' class="MasterInvitationsSubmit"  value='עריכתהזמנה'  name='submit'>&nbsp; חפש &nbsp;</button>

























<br><br><br><br><br><br><br>
<button class="MasterInvitationsSubmit"  value='עריכתהזמנה'  name='submit'>&nbsp;&nbsp; עריכת הזמנה&nbsp;&nbsp;</button>
<button class="MasterInvitationsSubmit"  value='ביטולהזמנה'  name='submit'>&nbsp;&nbsp; ביטול הזמנה&nbsp;&nbsp;</button>
<button class="MasterInvitationsSubmit"  value='צורתצהירמוסר'   name='submit'>&nbsp;&nbsp;צור תצהיר מוסר&nbsp;&nbsp;</button>
<button class="MasterInvitationsSubmit"  value='אישוריםחתומים'  name='submit'>&nbsp;&nbsp;אישורים חתומים&nbsp;&nbsp;</button>
<button class="MasterInvitationsSubmit"  value='נעלהזמנה'   name='submit'>&nbsp;&nbsp;נעל הזמנה&nbsp;&nbsp;</button>
<br><br><br><br><br><br><br>
 
<h2    style="   fluat: right;   " ><input  type='checkbox' onClick='toggleALL(this)'  />  סמן את כל ההזמנות </h2>
 
<table class="customers">
  
<?php 


$db->MasterAffiliateInvitations();

 
$db=null;
 
?>
 
</table>  
</div> 
</div>
</form>


<br><br><br><br><br><br><br><br> 

 
  

</body>
<?php  
    require_once('require_once/footer.php');
?>
</html>