<?php

function getCustomerObjArray(){
    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Customer objects
    $Customers = array();

    // Retrieve customers from database
    $sql = "SELECT * FROM Customers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Create Customer object for each row
            $customer = new Customers(
                $row["Customer_ID"], 
                $row["Customer_Name"],
                $row["email"],
                $row["phone_number"],
                $row["password"]
            );
            // Add Customer object to Customers array
            $Customers[] = $customer;
        }
    }

    // Return the array of Customer objects
    return $Customers;
}


function addCustomer($customerName,$email,$phoneNumber,$password){
    global $conn;

    // Prepare and bind parameters
    $query = "INSERT INTO Customers (customer_name, email, phone_number, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $customerName, $email, $phoneNumber, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Return true if the query executed successfully
        return true;
    } else {
        // Return false if there was an error
        return false;
    }

}

function emailExists($email){
    global $conn;

    // prepare SQL
    $stmt = $conn->prepare("Select Count(*) as count from customers where email = ?");

    if (!$stmt) {
        // Handle SQL error
        echo "SQL error: " . $conn->error;
        return false; // Return false to indicate failure
    }

    $stmt->bind_param("s",$email);

    //Excute 
    $stmt->execute();

    //Fetch result
    $result = $stmt->get_result();

    // Fetch the row as an associative array
    $row = $result->fetch_assoc();

    // Close the statement
    $stmt->close();

    return ($row['count'] > 0);

    
}



function updateToken($email, $token) {
    global $conn; // Assuming $conn is your database connection

    // Set the expiry date to 1 hour from now
    $expiryDate = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Prepare and execute the SQL statement
    $sql = "UPDATE Customers SET Token = ?, Token_Expire = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        // Handle SQL error
        echo "Inside updateToken Function 
        SQL error: " . $conn->error;
        return false; // Return false to indicate failure
    }

    $stmt->bind_param("sss", $token, $expiryDate, $email);
    // Execute the update
    $stmt->execute();

    // Check the number of affected rows
    $affectedRows = $stmt->affected_rows;

    // Close the statement
    $stmt->close();

    // Return true if at least one row was affected (update successful), false otherwise
    return ($affectedRows > 0);

}


function validateToken($token) {
    global $conn;

    // Check if the connection was successful
    if (!$conn) {
        // Connection failed, handle the error
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the current date/time
    $currentDateTime = date('Y-m-d H:i:s');

    // Prepare and execute the SQL statement
    $sql = "SELECT Token_Expire FROM Customers WHERE Token = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        // Handle SQL error
        echo "SQL error: " . $conn->error;
        return false; // Return false to indicate failure
    }

    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($tokenExpire);
    $stmt->fetch();
    $stmt->close();

    // Check if the token exists and has not expired
    if ($tokenExpire && $tokenExpire > $currentDateTime) {
        return true; // Token is valid and not expired
    } else {
        return false; // Token does not exist or has expired
    }
}

?>
