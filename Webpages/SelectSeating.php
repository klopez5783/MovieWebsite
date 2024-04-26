<?php 
include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';
echo "ShowTime ID: " . $_SESSION['ShowTimeID'] . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <!-- Add your CSS files here -->
    <!-- Add any meta tags, external stylesheets, or scripts here -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css"> -->


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

        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }


    </style>

<script>

</script>


</head>





    <body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 

        <div class="container mt-5">
        <h1 class="text-center mb-4">Select Seats</h1>
        <div class="d-flex">
            <div class="col-md-6">
                <?php
                    $rows = 6;
                    $seatsPerRow = 6;
                    $rowLabel = 'A';
                    for ($i = 1; $i <= $rows; $i++) {
                        echo '<div class="row">';
                        echo '<div class="col-md-12">';
                        echo '<div class="d-flex justify-content-center">';
                        echo '<h3 class="d-flex align-items-center me-2">' . $rowLabel . '</h3>';
                        echo '<div class="d-flex justify-content-center">';
                        for ($j = 1; $j <= $seatsPerRow; $j++) {
                            echo '<button data-bs-toggle="button"  class="seat btn btn-outline-secondary">' . $j . '</button>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $rowLabel++;
                    }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                    $rows = 6;
                    $seatsPerRow = 6;
                    $rowLabel = 'A';
                    for ($i = 1; $i <= $rows; $i++) {
                        echo '<div class="row">';
                        echo '<div class="col-md-12">';
                        echo '<div class="d-flex justify-content-center">';
                        echo '<h3 class="d-flex align-items-center me-2">' . $rowLabel . '</h3>';
                        echo '<div class="d-flex justify-content-center">';
                        for ($j = 1; $j <= $seatsPerRow; $j++) {
                            echo '<button data-bs-toggle="button"  class="seat btn btn-outline-secondary">' . $j . '</button>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $rowLabel++;
                    }
                ?>
            </div>
            
        </div>
    </div>
       
        

    </body>

    <?php include 'Partials/Footer.html' ?>

</html>