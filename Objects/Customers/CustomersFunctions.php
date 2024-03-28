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

?>
