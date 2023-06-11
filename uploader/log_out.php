<?php

session_start();
// Set Session data to an empty array
$_SESSION = array();
// Destroy the session variables
session_destroy();
header("location:users/login/Logged_Out") 
?>

