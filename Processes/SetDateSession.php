<?php
// Start the session
session_start();
echo "Inside File!!!";
// Check if the 'date' parameter is set in the query string
if (isset($_GET['date'])) {

    echo "Inside IF statement!!!";
    // Set the selected date as a session variable
    $_SESSION['selected_date'] = $_GET['date'];
}
?>