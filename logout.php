<?php
session_start();

unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['phone']);

// session_destroy();
header('location: login.php');
?>