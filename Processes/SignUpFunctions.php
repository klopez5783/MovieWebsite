<?php
define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

function validate_username($field)
{
    if ($field == "") return "No Username was entered<br>";
    else if (strlen($field) < 5)
    return "Usernames must be at least 5 characters<br>";
    else if (preg_match("/[^a-zA-Z0-9_ñÑáéíóúÁÉÍÓÚüÜ\s-]/", $field))
    return "Only letters, numbers, spaces, -, and _ in Names<br>";
    return "";		
}
function validate_password($field)
{
    if ($field == "") return "No Password was entered<br>";
    else if (strlen($field) < 6)
    return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) ||
            !preg_match("/[A-Z]/", $field) ||
            !preg_match("/[0-9]/", $field))
    return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
    return "";
}
function validate_email($field)
{
    if ($field == "") return "No Email was entered<br>";
    else if (!((strpos($field, ".") > 0) &&
                (strpos($field, "@") > 0)) ||
                preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The Email address is invalid<br>";
    return "";
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'checkEmailExists':
            checkEmailExists();
            break;
        // Add more cases for other functions if needed
        default:
            // Handle invalid action
            echo "Invalid action specified";
    }
}


function checkEmailExists(){

    global $conn;

    
    if(isset($_POST['CustomerEmail'])){
        $email = $_POST['CustomerEmail'];
        $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");

        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        // Check if there is at least one row returned
        if ($result->num_rows > 0) {
            // A row exists with the provided email address
            echo "exists";
        } else {
            // No matching email found
            echo "not_exists";
        }

        $stmt->close();
        $result->free();
    } else {
        echo 'Email not set';
    }
}


?>