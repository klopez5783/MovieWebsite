<?php

define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Movie/MovieFunctions.php';
include '../Objects/Movie/MovieObj.php';


//convert json to Movie Data type
$movieJSON = $_POST['movie']; // Get the JSON string representing the movie object
$movie = json_decode($movieJSON); // Decode the JSON string to get the movie object

$result = updateMovie($movie);


if($result){
    echo 'Movie Updated successfully.'; 
}
else{
    echo 'Failed to Update movie.';
}

$posterResult = (isset($_FILES['file'])) ? addPoster($movie->movie_name) : ""; 

echo $posterResult;

?>