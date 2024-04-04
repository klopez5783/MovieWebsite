<?php
// Start the session
session_start();

// Check if theatre ID is received from the AJAX request
if (isset($_POST['id'])) {
    // Set session variable with the received theatre ID
    $_SESSION['TheaterID'] = $_POST['id'];
    // Send success response back to the client
    // echo 'Session variable set successfully.';
    echo 'Session Variable Set';
    exit();
} else {
    // Send error response if theatre ID is not received
    http_response_code(400);
    echo 'Theatre ID is missing.';
}

?>
