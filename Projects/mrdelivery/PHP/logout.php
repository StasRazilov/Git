<?php
session_start();
unset($_SESSION['UserNow']);
 
 
session_unset();

// destroy the session
session_destroy();
header('Location: ../Pages/Login.php');
?> 