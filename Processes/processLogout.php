<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();
header("Location: /MovieWebsite/webpages/Home.php");

?>