<?php
define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Movie/MovieFunctions.php';


// Get form data
$movieName = $_POST['movieName'];
$actors = $_POST['actors'] ?? null;
$director = $_POST['director'] ?? null;
$releaseDate = $_POST['releaseDate'] ?? null;
$genre = $_POST['genre'] ?? null;
$ratings = $_POST['ratings'] ?? null;


$result = insertMovie($movieName,$actors,$director,$releaseDate,$genre,$ratings);

// Check the result and return appropriate response
if ($result) {
    echo 'Movie inserted successfully.';
} else {
    echo 'Failed to insert movie.';
}


// Check if a file has been uploaded
$posterResult = addPoster($movieName);

echo $posterResult;


?>
