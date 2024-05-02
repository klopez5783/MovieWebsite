<?php 
include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';

require_once '../Processes/Paypal.php';

$numberOfTickets = 0;

$showTimeID = $_SESSION['ShowTimeID'];
$selectedSeats = $_SESSION['selectedSeats'];
$movieID = $_SESSION['Movie_ID'];
include '../Objects/Movie/MovieObj.php';
include '../Objects/Movie/MovieFunctions.php';
$movie = getMovie($movieID);
foreach ( $selectedSeats as $seat ){
    $numberOfTickets++;
}
$total = $numberOfTickets * $ticketPirce;
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        
        /* Define bigger-input class */
        .bigger-input {
            font-size: 16px; /* Adjust the font size as needed */
        }

        .loginForm , .signupForm{
            border: none;
            border-bottom: 1px solid black;
            outline: none;
        }

        #loginModalContent{
            width: 350px;
        }

        /* Show the image for medium to larger screens */
    @media screen and (min-width: 768px) {
        #posterImage {
            display: block; /* Show the image */
            /* Set size for medium to larger screens */
            /* Adjust the width as needed */
            /* Let the height adjust proportionally */
            width: 100%;
            height: auto;
        }
    }

    /* Additional styles for larger screens if needed */
    @media screen and (min-width: 992px) {
        #posterImage {
            /* Set size for larger screens */
            /* Adjust the width as needed */
        }
    }

    /* Additional styles for extra-large screens if needed */
    @media screen and (min-width: 1150px) {
        #posterImage {
            /* Set size for extra-large screens */
            /* Adjust the width as needed */
            width: 90%;
        }
    }

    /* Additional styles for extra-large screens if needed */
    @media screen and (min-width: 1300px) {
            #posterImage {
                /* Set size for extra-large screens */
                /* Adjust the width as needed */
                width: 80%;
            }
    }

    @media screen and (min-width: 1400px) {
            #posterImage {
                /* Set size for extra-large screens */
                /* Adjust the width as needed */
                width: 80%;
            }
    }


    @media screen and (min-width: 1500px) {
            #posterImage {
                /* Set size for extra-large screens */
                /* Adjust the width as needed */
                width: 70%;
            }
    }
    
    @media screen and (min-width: 1800px) {
            #posterImage {
                /* Set size for extra-large screens */
                /* Adjust the width as needed */
                width: 60%;
            }
    }

</style>


</head>





<body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 
        
    <div class="container">
        
    </div>

    <div id="selectTheaterContainer" class="mt-2">
            <div class="d-flex justify-content-center">
                <!-- Customer Info Column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment Information</h4>
                        </div>

                        <div class="card-body">
                        <ul class="list-group m-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h5><?php echo $movie->movie_name; ?></h5>
                                    <small class="text-muted">
                                        <?php echo "Seats : " . implode(', ', $selectedSeats); ?>
                                    </small>
                                </div>
                                <div>
                                <h5><?php echo "Tickets : $" . $total; ?></h5>
                                </div>
                            </li>
                        </ul>


                                                    <form action="process_payment.php" method="POST">
                                <button type="submit" class="btn btn-primary">Process Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="col-5">
                    <div class="image-container d-flex align-items-center justify-content-center">
                        <img src="<?php getMoviePoster($movie->movie_name) ?>" class="mx-auto" id="posterImage" alt="Movie Poster">
                    </div>
                </div>
            </div>
        </div>

</body>

    <?php include 'Partials/Footer.html' ?>

</html>