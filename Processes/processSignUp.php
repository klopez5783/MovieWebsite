<?php
define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

 // Access the global $conn variable
 global $conn;


// // Get user input from command line
// $email = readline("Enter email: ");
// $password = readline("Enter password: ");
// $phoneNumber = readline("Enter phone number (optional): ");
// $customerName = readline("Enter customer name: ");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['SignupCustomerName']) && 
    isset($_POST['SignupPhoneNumber']) &&
    isset($_POST['SignupPassword']) &&
    isset($_POST['SignupEmail']) ) {
        $password = $_POST['SignupPassword'];
        $customerName = $_POST['SignupCustomerName'];
        $email = $_POST['SignupEmail'];
        $phoneNumber = $_POST['SignupPhoneNumber'];
        //Hash and salt password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $conn->prepare("INSERT INTO customers (password, email, phone_number, Customer_Name) VALUES (?, ?, ?, ?)");

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }

            // Bind parameters
            $stmt->bind_param("ssss", $hashedPassword, $email, $phoneNumber, $customerName);

            // Execute the statement
            $stmt->execute();
            printf("%d row inserted.\n", $stmt->affected_rows);

        
            echo "User added successfully.\n";
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

    }
}
else{
    echo "form not submited";
}





?>