<?php 
include '../Processes/SignUpFunctions.php';
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

    <?php
     include 'HeaderFiles/HeaderTags.php';
    ?>

    


    <style>

        .seat {
            height: 35px !important;
            color: white;
            border-radius: 15px 15px 0px 0px;
            background-color: #505050;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .seat:hover{
            background-color: #FFF;
            color: #343a40;
        }

        /* Additional CSS for theater seating container */
.theater-seating-container {
    background-color: rgba(39, 39, 39, 0.863); /* Set background color */
    padding: 20px; /* Add padding for spacing */
    border-radius: 10px; /* Add border radius for rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}

.theater-seating-container h1 {
    color: #343a40; /* Set title color */
}

.theater-seating-container .row {
    margin-bottom: 20px; /* Add margin between rows */
}

.theater-seating-container .seat {
    width: 50px; /* Set button width */
    height: 50px; /* Set button height */
    margin: 5px; /* Add margin between buttons */
    font-size: 16px; /* Set button font size */
}

.theater-seating-container .seat:focus {
    outline: none; /* Remove focus outline */
}

.theater-seating-container .seat.active {
    background-color: #007bff; /* Set active button background color */
    color: #fff; /* Set active button text color */
}

#TopBarCurve{
    border-top: 10px solid #ffffff;
    background: linear-gradient(to top,rgba(0,0,0,0) 0%, rgba(23,23,23,0.24528301886792447) 60%, rgba(255,255,255,1) 120%);
    /* background: linear-gradient(90deg, rgba(255,255,255,0) 20%, rgba(255,255,255,0.19575471698113212) 30%, rgba(255,255,255,0.35377358490566035) 40%, rgba(255,255,255,0.3466981132075472) 60%, rgba(255,255,255,0.2) 70%, rgba(255,255,255,0) 80%); */
    /* background: linear-gradient(90deg, rgba(255,255,255,0) 20%, rgba(255,255,255,0.19575471698113212) 30%, rgba(255,255,255,0.35377358490566035) 40%, rgba(255,255,255,0.3466981132075472) 60%, rgba(255,255,255,0.2) 70%, rgba(255,255,255,0) 80%); */
    height: 60px;
    width: 90%;
    margin: 20px auto;
    border-radius: 50% 50% 0 0;
    line-height: 70px;
    font-size: 20px;
    color: #fff;
    position: relative;
    text-shadow: 0 0 5px #FFF,
        0 0 20px #FFF,
        40px 40px 0px rgba(255,255,255,0);
    font-size: 2.5em;
}

.LetterLabel{
    color: white;
}


        @media screen and (min-width: 1400px) {

        }
</style>

<script>


const selectedSeats = []; // Array to store selected seats

// Function to handle seat button click
function handleSeatClick(row, seat) {
    const selectedSeat = row + seat.toString();
    var boolean = false;
    var index;
    console.log("before loop");
    for (let i = 0; i < selectedSeats.length; i++) {
        if( selectedSeats[i] == selectedSeat){
            boolean = true;
            index = i;
        }
}
    if (boolean == true ) {
        // If seat is already selected, remove it from the array
        selectedSeats.splice(index, 1);
    } else {
        // If seat is not selected, add it to the array
        selectedSeats.push( selectedSeat );
    }
    console.log(selectedSeats);
    // Call the function to attach selected seats when needed
    attachSelectedSeats();
} 

// Function to attach the selected seats array to the form
function attachSelectedSeats() {
    // Get the form and input element
    var form = document.getElementById("myForm");
    var input = document.getElementById("selectedSeatsInput");
    
    // Convert the array to JSON and set it as the input value
    input.value = JSON.stringify(selectedSeats);
}


</script>


</head>




<body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 

<div class="container mt-5 theater-seating-container">
    <h1 id="TopBarCurve" class="text-center mb-4">Screen</h1>

    <div class="row mt-5">
        <div class="col-md-6">
            <?php
                $rows = 6;
                $seatsPerRow = 6;
                $rowLabel = 'A';
                for ($i = 1; $i <= $rows; $i++) {
                    echo '<div class="row">';
                    echo '<div class="col-5 col-sm-2 col-md-1">';
                    echo '<h3 class="LetterLabel d-flex align-items-end justify-content-end"><div>' . $rowLabel . '</div></h3>';
                    echo '</div>';
                    echo '<div class="col-7 col-sm-10 col-md-11">';
                    echo '<div class="d-flex justify-content-evenly">';
                    for ($j = 1; $j <= $seatsPerRow; $j++) {
                        echo '<div data-bs-toggle="button" autocomplete="off" data-row="' . $rowLabel . '" data-seat="' . $j . '" onclick="handleSeatClick(\'' . $rowLabel . '\', ' . $j . ')" class="seat btn btn-outline-secondary">' . $j . '</div>';
                    }
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
                $rowLabel = 'G'; // Adjust row label if needed
                for ($i = 1; $i <= $rows; $i++) {
                    echo '<div class="row">';
                    echo '<div class="col-3 col-sm-2 col-md-1">';
                    echo '<h3 class="LetterLabel d-flex align-items-center">' . $rowLabel . '</h3>';
                    echo '</div>';
                    echo '<div class="col-9 col-sm-10 col-md-11">';
                    echo '<div class="d-flex justify-content-evenly">';
                    for ($j = 1; $j <= $seatsPerRow; $j++) {
                        echo '<div data-bs-toggle="button" autocomplete="off" data-row="' . $rowLabel . '" data-seat="' . $j . '" onclick="handleSeatClick(\'' . $rowLabel . '\', ' . $j . ')" class="seat btn btn-outline-secondary">' . $j . '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $rowLabel++;

                }
            ?>
        </div>
    </div>
        <form id="continue" name="setSeatSession" class="d-flex justify-content-end" onsubmit="SubmitForm()" action="../Processes/SetDateSession.php" method="post">
            <input type="hidden" name="selectedSeats" id="selectedSeatsInput">    
            <input value="Continue" type="Submit" class="btn btn-primary" >
        </form>
</div>
  

</body>

    <?php include 'Partials/Footer.html' ?>

</html>