<?= 

define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Movie/MovieFunctions.php';
include '../Objects/Movie/MovieObj.php';

echo 'inside file!!!';


if(isset($_POST['movieID'])){
    $id = $_POST['movieID'];
    $movie = getMovie($id);

    // Check if movie data is found
    if ($movie) {
        // Encode the movie data as JSON and return it
        echo json_encode($movie);
    } else {
        // Return an error message or handle the case where movie data is not found
        echo json_encode(array('error' => 'Movie not found'));
    }
}
else {
        // Handle the case where movieID is not provided in the POST request
        echo json_encode(array('error' => 'No movieID provided'));
    }

?>