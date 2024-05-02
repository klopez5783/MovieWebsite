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
    unset( $_SESSION['selectedSeats'] );
   
    $data = $_POST['selectedSeats'];
    $array = json_decode($data,true);
    $_SESSION['selectedSeats'] = $array;
    echo "inside if";
    header("Location: /MovieWebsite/Webpages/CustomerInfo.php");
}

?>
