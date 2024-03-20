<?php

function getMovieObjArray(){
    // Access the global $conn variable
    global $conn;

    // Initialize the array to store Movie objects
    $movies = array();

    // Retrieve movies from database
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Create Movie object for each row
            $movie = new Movie($row["Movie_ID"], $row["movie_name"], $row["actors"], $row["Director"], $row["release_date"]);
            // Add Movie object to movies array
            $movies[] = $movie;
        }
    }

    // Return the array of Movie objects
    return $movies;
}



?>