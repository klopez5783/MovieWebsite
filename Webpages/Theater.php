<html>

<?php
        include '../Objects/Theatre/TheatreObj.php';
        include '../Objects/Theatre/TheatreFunctions.php';
        ?>

<head>

<style>
    .gradient-background {
        /* Replace these color values with your desired gradient colors */
        background: linear-gradient(to right, #ff8a00, #da1b60);
        /* Add other CSS properties as needed */
        padding: 20px;
        border-radius: 10px;
        color: white;
    }
</style>
<?php include 'HeaderFiles/HeaderTags.php';
    include '../Processes/SignUpFunctions.php';?>
</head>
<?php $theater =  selectWithID($_SESSION['TheaterID']);?>

<body class="bgImage">

     <?php include 'Partials/NavBar.html' ?> 

     <div class="container-fluid" id="content" >
        <div  class="mt-4 p-5 text-blue rounded mb-2 gradient-background">
            <h1><?php echo $theater->name ?></h1>
            <h4> 123 Main,<?php echo $theater->location ?> 1234</h4>
            <a href=""><h6>Theater Details</h6></a>
        </div>

        <?php
        include '../Objects/Movie/MovieObj.php';
        include '../Objects/Movie/MovieFunctions.php';
        $movies = getMovieObjArray()
        ?>

        <ul class="list-group">
            <?php foreach ($movies as $movie): ?>
                
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../Images/MoviePoster.jpg" class="img-fluid rounded-start" alt="<?php echo $movie->movie_name; ?>">
                            </div>
                            <div class="col-md-8 d-flex">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $movie->movie_name;  ?></h5>
                                    <p class="card-text"><?php echo $movie->genre ?></p>
                                </div>
                                <div class="p-3">
                                    <button class="btn btn-primary">8:30PM</button>
                                    <button class="btn btn-primary">10:00PM</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <?php endforeach; ?>
        </ul>


     </div>
    
</body>


</html>