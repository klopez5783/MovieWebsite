<?php

session_start(); // Make sure to start the session


// Check if the button was clicked
if(isset($_POST['create_session'])) {
    // Get the ID number from the form
    $id = $_POST['id'];

    // Set session variable with the ID number
    $_SESSION['Movie_ID'] = $id;

    // Redirect or display a message
    header("Location: /MovieWebsite/webpages/SelectTheater.php");
    exit;
} else {
    // Handle if the button was not clicked
    header("Location: error.php");
    exit;
}

?>
