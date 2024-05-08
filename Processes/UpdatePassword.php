<?php 
session_start();
include_once '../Configuration/DBconnect.php';
include 'SignUpFunctions.php';

 // Access the global $conn variable
 global $conn;


if( isset ( $_SESSION['forgotPasswordEmail'] )){
    $password = $_POST['UpdatePassword'];
    $email = $_SESSION['forgotPasswordEmail'];

    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

    echo $hashedPassword, $email;
    try {
        $stmt = $conn->prepare("UPDATE customers SET password = ? WHERE email = ?");

        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ss", $hashedPassword, $email);

        // Execute the statement
        $stmt->execute();
        header("Location: /MovieWebsite/webpages/Home.php");
       // $_SESSION['PasswordUpdated'];

    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}




?>