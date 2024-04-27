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

if ( isset( $_POST['MTD'] ) ){
    // Retrieve the values from $_POST
    $_SESSION['ShowTimeID'] = $_POST['ShowTimeID'];
    //redirect user
    header("Location: /MovieWebsite/webpages/SelectSeating.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data sent via POST
    $json = file_get_contents('php://input');
    // Decode JSON data to PHP array
    $selectedSeats = json_decode($json, true);
    
    // Set session variable with selected seat data
    $_SESSION['selected_seats'] = $selectedSeats;

    print_r($selectedSeats);

    // Send success response
    http_response_code(200);
    echo "Seat data processed successfully";
} else {
    // If request method is not POST, send a 405 Method Not Allowed response
    http_response_code(405);
    echo "Method Not Allowed";
}

?>
