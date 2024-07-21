<?php
include_once '../../Configuration/DBconnect.php';
//include '../SignUpFunctions.php';

 // Access the global $conn variable
 global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['SignupCustomerName']) && 
    isset($_POST['SignupPhoneNumber']) &&
    isset($_POST['SignupPassword']) &&
    isset($_POST['SignupEmail']) &&
    isset($_POST['ConfirmSignupPassword']) )
     {
        $password = $_POST['SignupPassword'];
        $customerName = $_POST['SignupCustomerName'];
        $email = $_POST['SignupEmail'];
        $phoneNumber = $_POST['SignupPhoneNumber'];
        $passwordConfirm = $_POST['ConfirmSignupPassword'];
        $role = 'admin';

        //Validate User Input

        if($password == $passwordConfirm ){
            $fail = validate_username($customerName);
            $fail .= validate_password($password);
            $fail .= validate_email($email);
            if($fail != "") die($fail);
        }

        //Hash and salt password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $conn->prepare("INSERT INTO users (password, email, phone_number, Customer_Name,role) VALUES (?, ?, ?, ?,?)");

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }

            // Bind parameters
            $stmt->bind_param("sssss", $hashedPassword, $email, $phoneNumber, $customerName,$role);

            // Execute the statement
            $stmt->execute();
            header("Location: ../../WebpagesAdmin/ManageUsers.php");

        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

    }
}
else{
    echo "form not submited";
}