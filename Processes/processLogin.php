<?php

define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

 // Access the global $conn variable
 global $conn;


// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if both email and password are provided
    
// }

if (isset($_POST['LoginEmail']) && isset($_POST['LoginPassword'])) {
   
    // Retrieve the email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['LoginEmail']);
    $password = $_POST['LoginPassword']; 

    // Prepare and execute the query
    $query = "SELECT * FROM Customers WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_NUM);
    if ($row == null){
        die("User not found");
    } 
    elseif(password_verify($password,$row[1])){
        session_start();
        $_SESSION['UserLoggedIn'] = True;
        $_SESSION['UserId'] = $row[0];
        $_SESSION['UserName'] = $row[4];
        echo "User Logged in";
       exit();
    }else {
        // Incorrect password
        echo $row[1];
        
    }
    
} 

?>
