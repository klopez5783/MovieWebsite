<?php
// Start the session
session_start();
// Check if the 'date' parameter is set in the query string
if (isset($_GET['date'])) {

    // Set the selected date as a session variable
    $_SESSION['selected_date'] = $_GET['date'];
}

if ( isset( $_POST['MTD'] ) ){
    // Retrieve the values from $_POST
    $_SESSION['ShowTimeID'] = $_POST['ShowTimeID'];
    //redirect user
    echo "post MTD set.";
    header("Location: /MovieWebsite/webpages/SelectSeating.php");
}

if(isset($_POST['selectedSeats'])) {
    echo 'inside selected Seats Session If';
    // Get the JSON data sent via POST
    $json = file_get_contents('php://input');
    // Decode JSON data to PHP array
    $selectedSeats = json_decode($json, true);
    
    // Set session variable with selected seat data
    $_SESSION['selected_seats'] = $selectedSeats;

    print_r($selectedSeats);

    echo "Seat data processed successfully";
}

?>
