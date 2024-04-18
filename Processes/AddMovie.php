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
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
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
        echo "Error adding file to folder.";
    } 
} else {
    // File upload error occurred
    echo "Error uploading file.";
}


?>
