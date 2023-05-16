<?php 
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

unset($_SESSION['arr']);// מוחק את Delete data
unset($_SESSION['name']);// Delete data 
session_destroy();// Delete SESSION 
?>
