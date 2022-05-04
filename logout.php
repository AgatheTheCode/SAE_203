<?php
// Initialize the session
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle

session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>