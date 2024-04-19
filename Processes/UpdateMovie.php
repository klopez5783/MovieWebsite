<?=

define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Movie/MovieFunctions.php';
include '../Objects/Movie/MovieObj.php';

//convert json to Movie Data type
$movieOBJ = json_decode($_POST['movieSend']);


// $movie = new Movie($JSONmovie["Movie_ID"], 
//             $JSONmovie["movie_name"],
//             $JSONmovie["actors"], 
//             $JSONmovie["Director"], 
//             $JSONmovie["release_date"],
//             $JSONmovie["genre"],
//             floatval($JSONmovie["rating"]) ); // Convert rating to float

//echo 'inside file !!!! ' . gettype($JSONmovie->movie_name);

$result = updateMovie($movieOBJ);

if ($result) {
    //echo 'Movie Updated successfully.';
} else {
    //echo 'Failed to Update movie.';
}

?>