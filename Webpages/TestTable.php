<!DOCTYPE html>
<html>
<head>
    <title>Movie Database</title>
</head>
<body>

<h2>Movie Database</h2>

<!-- Include the database connection file -->
<?php include 'DBconnect.php'; ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" name="submit" value="Retrieve Movies">
</form>



<?php
// Retrieve movies
if(isset($_POST['submit'])) {


    include '../Objects/Movie/MovieObj.php';
    include '../Objects/Movie/MovieFunctions.php';

    // // Retrieve movies from database
    // $movies = array(); // Array to store Movie objects
    // $sql = "SELECT * FROM movies";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         // Create Movie object for each row
    //         $movie = new Movie($row["Movie_ID"], $row["movie_name"], $row["actors"], $row["Director"], $row["release_date"]);
    //         // Add Movie object to movies array
    //         $movies[] = $movie;
    //     }
    // }

    $movies = getMovieObjArray()

    ?>

    
    <table border='1'>
        <tr>
            <th>Movie ID</th>
            <th>Movie Name</th>
            <th>Actors</th>
            <th>Director</th>
            <th>Release Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($movies as $movie){ ?>
            <tr>
                <td><?php echo $movie->Movie_ID; ?></td>
                <td><?php echo $movie->movie_name; ?></td>
                <td><?php echo $movie->actors; ?></td>
                <td><?php echo $movie->Director; ?></td>
                <td><?php echo $movie->release_date; ?></td>
                <td><a href='edit_movie.php?id=<?php echo $movie->Movie_ID; ?>'>Edit</a></td>
                <td>
                    <form method='post' action='delete_movie.php'>
                        <input type='hidden' name='delete_id' value='<?php echo $movie->Movie_ID; ?>'>
                        <input type='submit' name='delete' value='Delete'>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php

}



// Handle delete operation
if(isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    // Query to delete record with given Movie ID
    $delete_query = "DELETE FROM movies WHERE Movie_ID = $delete_id";
    if($conn->query($delete_query) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>



<!-- Form to create a new movie -->
<h2>Create New Movie</h2>
<form method="post" action="create_movie.php">
    <label for="movie_name">Movie Name:</label><br>
    <input type="text" id="movie_name" name="movie_name"><br>
    <label for="actors">Actors:</label><br>
    <input type="text" id="actors" name="actors"><br>
    <label for="director">Director:</label><br>
    <input type="text" id="director" name="director"><br>
    <label for="release_date">Release Date:</label><br>
    <input type="date" id="release_date" name="release_date"><br><br>
    <input type="submit" value="Create">
</form>

</body>
</html>
