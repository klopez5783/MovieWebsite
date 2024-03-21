<?php

function getTheatreObjArray(){
    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Movie objects
    $theatres = array();

    // Retrieve movies from database
    $sql = "SELECT * FROM theatre";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Create Movie object for each row
            $theatre = new Theatre($row["theatre_id"],
            $row["name"],
            $row["location"],
            $row["state"]);
            // Add Movie object to movies array
            $theatres[] = $theatre;
        }
    }

    // Return the array of Movie objects
    return $theatres;
}


?>