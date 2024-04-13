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


?>
