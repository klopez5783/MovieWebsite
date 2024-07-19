<?php
function getTicketPriceWithID($id){
    // Access the global $conn variable
    global $conn;

    // Retrieve users from database
    $sql = "SELECT Price FROM moviePrices where Movie_ID = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Bind the result to a variable
        $stmt->bind_result($price);

        // Fetch the result
        if ($stmt->fetch()) {
            // Return the price
            return $price;
        } else {
            // Return false if no result was found
            return false;
        }
    } else {
        // Return false if there was an error executing the query
        return false;
    }
}