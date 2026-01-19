<?php
// Resume session
session_start();

// Clearr whata nside the session
$_SESSION = [];

// destroy session
session_destroy();

// Start new session : New Loop
session_start();
$_SESSION['login'] = false;

// Redirect to HOme page
header("Location: ../../home/index.php");

?>