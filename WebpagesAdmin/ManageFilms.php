<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'Partials/AdminHeaderFiles.php';
        include_once '../Configuration/DBconnect.php';?>
</head>
<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'Partials/SideBar.php' ?>

            <div class="col">

                <h1>test</h1>

                <?php

                        include '../Objects/Movie/MovieObj.php';
                        include '../Objects/Movie/MovieFunctions.php';
                        $movies = getMovieObjArray();

                        echo '<a href="addMovie.php" class="btn btn-primary float-end me-3" data-bs-toggle="modal" data-bs-target="#AddMovieModal" >Add Movie</a>';

                        if (!empty($movies)) {
                            echo '<table class="table">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope="col">Movie ID</th>';
                            echo '<th scope="col">Movie Name</th>';
                            echo '<th scope="col">Actors</th>';
                            echo '<th scope="col">Director</th>';
                            echo '<th scope="col">Release Date</th>';
                            echo '<th scope="col">Edit</th>';
                            echo '<th scope="col">Delete</th>';
                            echo '</tr>';
                            echo '</thead>';
                            
                            echo '<tbody>';
                            foreach ($movies as $movie) {
                                echo '<tr>';
                                echo '<th scope="row">' . $movie->Movie_ID . '</th>';
                                echo '<td>' . $movie->movie_name . '</td>';
                                echo '<td>' . $movie->actors . '</td>';
                                echo '<td>' . $movie->Director . '</td>';
                                echo '<td>' . $movie->release_date . '</td>';
                                echo '<td><div class="btn btn-success" id=' . $movie->Movie_ID . '" data-bs-toggle="modal" data-bs-target="#EditMovieModal" onclick="handleEditMovie('. $movie->Movie_ID .')" >Edit</div></td>';
                                echo '<td>';
                                echo '<input type="button" name="delete" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteRecordModal" onclick="deleteRecord('. $movie->Movie_ID .')" >';
                                echo '</td>';
                                echo '</tr>';
                                
                            }
                            echo '</tbody>';
                            
                            echo '</table>';
                        }
                        else{
                            echo '<h1>No Movie Records, please add records using the insert records button</h1>';
                        }

                ?>

            </div>

        </div>
    </div>


    <div class="modal fade" id="EditMovieModal" tabindex="-1" aria-labelledby="EditMovieModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-film fa-xl"></i> Edit Movie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="EditMovieForm' . $movie->Movie_ID .  '">
                    <form class="row g-3 needs-validation" action="add_movie.php" method="POST" novalidate>
                        <div class="col-md-6">
                            <label for="movieName" class="form-label">Movie Name</label>
                            <input type="text" class="form-control" id="movieName" name="movieName" required>
                            <div class="invalid-feedback">
                                Please provide a movie name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="actors" class="form-label">Actors</label>
                            <input type="text" class="form-control" id="actors" name="actors">
                        </div>
                        <div class="col-md-6">
                            <label for="director" class="form-label">Director</label>
                            <input type="text" class="form-control" id="director" name="director">
                        </div>
                        <div class="col-md-6">
                            <label for="releaseDate" class="form-label">Release Date</label>
                            <input type="date" class="form-control" id="releaseDate" name="releaseDate">
                        </div>
                        <div class="col-md-6">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre">
                        </div>
                        <div class="col-md-6">
                            <label for="ratings" class="form-label">Ratings</label>
                            <input type="number" class="form-control" id="ratings" name="ratings" step="0.1" min="0" max="10">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div> <!-- Close modal-body div -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="" class="btn btn-primary">Submit</button>
                </div>
                </div> <!-- Close modal-content div -->
                
            </form> <!-- Close form -->
        </div> <!-- Close modal-dialog div -->
    </div> <!-- Close modal fade div -->

    <div class="modal fade" id="DeleteRecordModal" tabindex="-1" aria-labelledby="DeleteRecorModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center"><i class="fa-regular fa-circle-xmark fa-4x" style="color: #f05151;"></i></div>
                    <h4 class="text-center mt-3" >Are you sure you want to delete this record? This cannot be undone.</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onClick="deleteRecord()">Delete</button>
                </div>
            </div>
        </div>
    </div>


    
</body>

<script>
    function handleEditMovie(id){
        console.log("inside function!! \n\n Selected ID : " + id);
    }

    function deleteRecord(){
        console.log("inside deleteRecord");
    }
</script>

</html>