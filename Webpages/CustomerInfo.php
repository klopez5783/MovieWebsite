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
$total = $numberOfTickets * $itemAmount;
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


                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="card_number" class="form-label">Card Number:</label>
                                <input type="password" id="card_number" name="card_number" class="form-control" required maxlength="19" pattern="\d{4} \d{4} \d{4} \d{4}" title="Please enter a valid card number (e.g., xxxx xxxx xxxx xxxx)">
                            </div>

                            <div class="mb-3">
                                <label for="card_name" class="form-label">Name on Card:</label>
                                <input type="text" id="card_name" name="card_name" class="form-control" required>
                            </div>
                            

                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="expiry_date" class="form-label">Expiration Date:</label>
                                    <input type="month" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV:</label>
                                    <input type="text" id="cvv" name="cvv" class="form-control" required>
                                </div>
                            </div>
                                                        
                        

                            <ul class="list-group mb-3">
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
                                <li class="list-group-item d-flex justify-content-end">
                                    <div>
                                    NY Tax $<?php $OrderTotal = round($total * 0.08875, 2); echo $OrderTotal ; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        Total (USD)
                                    </div>
                                    <div>
                                        <h5>
                                        $<?php echo $total + $OrderTotal; ?>
                                        </h5>
                                    </div>
                                </li>
                            </ul>


                            <form class="d-flex justify-content-end" action="process_payment.php" method="POST">
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