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
            $movie = new Movie($row["Movie_ID"], 
            $row["movie_name"],
            $row["actors"], 
            $row["Director"], 
            $row["release_date"],
            $row["genre"],
            $row["ratings"]);
            // Add Movie object to movies array
            $movies[] = $movie;
        }
    }

    // Return the array of Movie objects
    return $movies;
}

function insertMovie($movieName,$actors,$director,$releaseDate,$genre,$ratings){
    global $conn;
    
    // Prepare and bind parameters
    $query = "INSERT INTO Movies (movie_name, actors, Director, release_date, genre, ratings) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("sssssd", $movieName, $actors, $director, $releaseDate, $genre, $ratings);

    // Execute the statement
    if ($stmt->execute()) {
        // Return true if the query executed successfully
        return true;
    } else {
        // Return false if there was an error
        return false;
    }
}

function getMoviePoster($name){

    $directory = "../Images/" . $name ;
    $defaultImage = "../Images/MoviePoster.jpg";

    if (!is_dir($directory)) {
       echo $defaultImage;
       return false;
    }

    $imagePath = $directory . "/" . $name . "_poster.jpg";

    if(file_exists($imagePath)){
        echo $imagePath;
    }
    else{
        echo $defaultImage;
        return false;
    }
}


function getMovie($id){
    // Access the global $conn variable
    global $conn;

    // Retrieve movies from database
    $query = "SELECT * FROM movies where Movie_ID = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("s", $id);

     // Execute the statement
     $stmt->execute();
    
     // Get the result set
     $result = $stmt->get_result();
     if (!$result) {
        die('Error getting result set: ' . $stmt->error);
    }
    
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            // Create Movie object for each row
            $movie = new Movie($row["Movie_ID"], 
            $row["movie_name"],
            $row["actors"], 
            $row["Director"], 
            $row["release_date"],
            $row["genre"],
            $row["ratings"]);
            return $movie;
        }
    }
}

function updateMovie($movie) {
    // Access the global $conn variable
    global $conn;

    $rating = floatval($movie->rating);

    // Prepare the SQL statement to update the record
    $query = "UPDATE movies SET 
              movie_name = ?, 
              actors = ?, 
              Director = ?, 
              release_date = ?, 
              genre = ?, 
              ratings = ? 
              WHERE Movie_ID = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("ssssssi", $movie->movie_name, $movie->actors, $movie->Director, $movie->release_date, $movie->genre, $movie->rating, $movie->Movie_ID);
    
    // Execute the statement
    if (!$stmt->execute()) {
        die('Error updating record: ' . $stmt->error);
        return false; // Return false if execution fails
    }

    // Close the statement
    $stmt->close();
    
    return true; // Return true if execution is successful
}


function addPoster($movieName){
    if ( $_FILES['file']['error'] === UPLOAD_ERR_OK ) {
        // File has been uploaded
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
    
        $directory = BASE_PATH . "\\Images\\";
    
        $uploadOk = 1;
    
        $movieDirectory = $directory . $movieName;
        if (!is_dir($movieDirectory)) {
            // Folder does not exist, create it
            if (!mkdir($movieDirectory, 0755)) { // You can adjust the permissions as needed
                echo "Error creating folder.";
                $uploadOk = 0;
            }
        }
        
        $newFileName = $movieName . "_poster." . pathinfo($fileName, PATHINFO_EXTENSION);
    
        //Move the uploaded file to movie directory
        $targetFile = $movieDirectory . '\\' . $newFileName;
    
        if (!move_uploaded_file($fileTmpName, $targetFile)) {
            // File moved successfully
            return "Error adding file to folder.";
        } 
    } else {
        // File upload error occurred
        return "Error uploading file.";
    }
}




?>