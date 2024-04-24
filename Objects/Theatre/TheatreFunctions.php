<?php



function getTheatreObjArray(){
    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Movie objects
    $theaters = array();

    // Retrieve movies from database
    $sql = "SELECT * FROM theater";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Create Movie object for each row
            $theater = new TheatreObj($row["theater_id"],
            $row["name"],
            $row["location"],
            $row["state"]);
            // Add Movie object to movies array
            $theaters[] = $theater;
        }
    }

    // Return the array of Movie objects
    return $theaters;
}

Function getTheaterObj($id){
    global $conn;

    $query = "Select * from Theater where theater_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$id);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $x = new TheatreObj($row['theater_id'], $row['name'], $row['location']);

        return $x;
    }
    else{
        return null;
    }
}



?>