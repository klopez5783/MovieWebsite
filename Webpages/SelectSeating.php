<?php 
include 'HeaderFiles/HeaderTags.php';
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

        /* Additional CSS for theater seating container */
.theater-seating-container {
    background-color: #f8f9fa; /* Set background color */
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


        @media screen and (min-width: 1400px) {

        }
</style>

<script>


const selectedSeats = []; // Array to store selected seats

// Function to handle seat button click
function handleSeatClick(row, seat) {
    const seatIndex = selectedSeats.findIndex(seat => seat.row === row && seat.seat === seat);
    if (seatIndex !== -1) {
        // If seat is already selected, remove it from the array
        selectedSeats.splice(seatIndex, 1);
    } else {
        // If seat is not selected, add it to the array
        selectedSeats.push({ row, seat });
    }
    console.log(selectedSeats);
    
}

function SubmitForm(){
    event.preventDefault();
    $.ajax({
    type: "POST",
    url: "../Processes/SetDateSession.php", // PHP script to set session and process selected seats
    data: JSON.stringify(selectedSeats), // Convert selectedSeats array to JSON string
    contentType: "application/json", // Set content type to JSON
    success: function(response) {
        console.log(response);
        // Redirect to the next screen if response indicates success
        if(response === "Seat data processed successfully") {
            const form = document.getElementById("continue");
            
        }
    },
    error: function(xhr, status, error) {
        // Handle error if needed
        console.error("Error:", error);
    }
});

}
</script>


</head>





<body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 

<div class="container mt-5 theater-seating-container">
    <h1 class="text-center mb-4">Select Seats</h1>
    <div class="row">
        <div class="col-md-6">
            <?php
                $rows = 6;
                $seatsPerRow = 6;
                $rowLabel = 'A';
                for ($i = 1; $i <= $rows; $i++) {
                    echo '<div class="row">';
                    echo '<div class="col-5 col-sm-2 col-md-1">';
                    echo '<h3 class="d-flex align-items-end justify-content-end"><div>' . $rowLabel . '</div></h3>';
                    echo '</div>';
                    echo '<div class="col-7 col-sm-10 col-md-11">';
                    echo '<div class="d-flex justify-content-evenly">';
                    for ($j = 1; $j <= $seatsPerRow; $j++) {
                        echo '<button data-bs-toggle="button" autocomplete="off" data-row="' . $rowLabel . '" data-seat="' . $j . '" onclick="handleSeatClick(\'' . $rowLabel . '\', ' . $j . ')" class="seat btn btn-outline-secondary">' . $j . '</button>';
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
                    echo '<h3 class="d-flex align-items-center">' . $rowLabel . '</h3>';
                    echo '</div>';
                    echo '<div class="col-9 col-sm-10 col-md-11">';
                    echo '<div class="d-flex justify-content-evenly">';
                    for ($j = 1; $j <= $seatsPerRow; $j++) {
                        echo '<button data-bs-toggle="button" autocomplete="off" data-row="' . $rowLabel . '" data-seat="' . $j . '" onclick="handleSeatClick(\'' . $rowLabel . '\', ' . $j . ')" class="seat btn btn-outline-secondary">' . $j . '</button>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $rowLabel++;

                }
            ?>
        </div>
    </div>
    <form id="continue" class="d-flex justify-content-end" onsubmit="SubmitForm()" action="../Webpages/CustomerInfo.php" method="post">
                <input value="Continue" type="Submit" class="btn btn-primary" >
                    
                </input>
            </form>
</div>
  

</body>

    <?php include 'Partials/Footer.html' ?>

</html>