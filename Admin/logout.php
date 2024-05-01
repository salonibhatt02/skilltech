<?php
session_start();

// Unset all session variables
// $_SESSION = array();
unset($_SESSION['mail']);
unset($_SESSION['aname']);
unset($_SESSION['aphone']);
// Destroy the session
// session_destroy();

// Redirect to login page
// header("Location: skilltech\login.php");
header("Location: ../login.php");
// exit;
?>
