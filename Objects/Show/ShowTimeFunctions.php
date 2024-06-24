<?php

function getMovieTimes($movieID,$date){

    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Movie objects
    $Showtimes = array();

    // Retrieve movies from database
    $query = "SELECT * FROM show_times where Movie_ID = ? and Date = ?";

    $stmt = $conn->prepare($query);


    if ($stmt === false) {
        // Handle the error
        die("\nError preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("ss",$movieID,$date);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Create ShowObj object for each row
            $showtime = new ShowObj($row["showtime_ID"],
            $row["end_time"],
            $row["start_time"],
            $row["language"],
            $row["Date"],
            $row["theater_id"],
            $row["Movie_ID"]);
            
            // Add ShowObj object to theaters array
            $Showtimes[] = $showtime;
        }
    }else{
        echo "\n\n\nShowOBj function getMovieTimes Function \n\n : No records found";
    }
    

    // Return the array of Movie objects
    return $Showtimes;
}

function getMovieShowTimeDates($movieID){
    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Movie objects
    $dates = array();

    // Retrieve movies from database
    $query = "SELECT * FROM show_times where Movie_ID = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("s", $movieID);

     // Execute the statement
     $stmt->execute();
    
     // Get the result set
     $result = $stmt->get_result();
     if (!$result) {
        die('Error getting result set: ' . $stmt->error);
    }
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dates = array(); // Initialize array to store unique dates
            $encountered_dates = array(); // Initialize array to keep track of encountered dates
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $date = $row["Date"];
                    // Check if date has already been encountered
                    if (!in_array($date, $encountered_dates)) {
                        // Add date to array if it's not a duplicate
                        $dates[] = $date;
                        // Add date to encountered dates array
                        $encountered_dates[] = $date;
                    }
                }
            }
            
        }
    }else{
        echo "no records";
    }

    return $dates;
}


function getStartTimes($showTimeArray){
    
    $startTimeArray = array();
    foreach($showTimeArray as $x){
        $theaterID = $x->theater_id;
        $startTime = $x->start_time;
        
        if( isset($startTimeArray[$theaterID]) ){
            $startTimeArray[$theaterID][] = $startTime;
        }else{
            $startTimeArray[$theaterID] = array($startTime);
        }
        
    }
    return $startTimeArray;
}

function getShowTimeOBJ($movieID,$date,$theaterID){
    
    // Access the global $conn variable
    global $conn;

    // Retrieve movies from database
    $query = "SELECT * FROM show_times where Movie_ID = ? and Date = ? and theater_id = ?";

    $stmt = $conn->prepare($query);


    if ($stmt === false) {
        // Handle the error
        die("\nError preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("sss",$movieID,$date,$theaterID);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Initialize a variable to store the ShowObj object
        $showtime = null;
    
        while ($row = $result->fetch_assoc()) {
            // Create a new ShowObj object for each row
            $showtime = new ShowObj(
                $row["showtime_ID"],
                $row["end_time"],
                $row["start_time"],
                $row["language"],
                $row["Date"],
                $row["theater_id"],
                $row["Movie_ID"]
            );
        }
    } else {
        echo "\n\n\nShowObj function getMovieTimes Function \n\n : No records found";
    }
    
    // Return the single ShowObj object
    return $showtime;
    
    
}


function getShowTimeOBJWithID($showTimeID){
    // Access the global $conn variable
    global $conn;

    // Retrieve movies from database
    $query = "SELECT * FROM show_times where showtime_ID = ?";


    $stmt = $conn->prepare($query);


    if ($stmt === false) {
        // Handle the error
        die("\nError preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("s",$showTimeID);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Initialize a variable to store the ShowObj object
        $showtime = null;
    
        while ($row = $result->fetch_assoc()) {
            // Create a new ShowObj object for each row
            $showtime = new ShowObj(
                $row["showtime_ID"],
                $row["end_time"],
                $row["start_time"],
                $row["language"],
                $row["Date"],
                $row["theater_id"],
                $row["Movie_ID"]
            );
        }
    } else {
        echo "\n\n\nShowObj \n\n function getMovieTimes with showtime ID \n\n : No records found";
    }
    
    // Return the single ShowObj object
    return $showtime;
    
    
}


?>