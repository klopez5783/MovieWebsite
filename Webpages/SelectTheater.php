<?php

include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';


$movieID = $_SESSION['Movie_ID'];

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

        .cardHover:hover {
        border: 2.5px solid blue;
    }

    #posterImage {
    display: none; /* Hide the image by default */
    }

    #TheaterList{
            margin: 0px auto 0px auto;
            width: 90%;
            height: 600px;
        }

    /* Show the image for medium to larger screens */
    @media screen and (min-width: 768px) {
        #posterImage {
            display: block; /* Show the image */
            /* Set size for medium to larger screens */
            width: 40%; /* Adjust the width as needed */
            height: auto; /* Let the height adjust proportionally */
        }
        #TheaterList{
            width: 90%;
            height: 600px;
        }
    }

    /* Additional styles for larger screens if needed */
    @media screen and (min-width: 992px) {
        #posterImage {
            /* Set size for larger screens */
            width: 40%; /* Adjust the width as needed */
        }
        #TheaterList{
            width: 85%;
            height: 600px;
        }
        #selectTheaterContainer{
            margin: 10px auto 0px auto; 
        }
    }

    /* Additional styles for extra-large screens if needed */
    @media screen and (min-width: 1200px) {
        #posterImage {
            /* Set size for extra-large screens */
            width: 30%; /* Adjust the width as needed */
        }
        #TheaterList{
            width: 85%;
            height: 600px;
        }
}

/* Additional styles for extra-large screens if needed */
@media screen and (min-width: 1600px) {
        #posterImage {
            /* Set size for extra-large screens */
            width: 20%; /* Adjust the width as needed */
        }
}

.small-scroll-box {
    height: 200px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Optional: add a border for visual distinction */
}

.scroll-content {
    padding: 10px; /* Optional: add padding to the scrollable content */
}



    </style>

  

</head>





    <body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 


        <?php
       include '../Objects/Theatre/TheatreObj.php';
       include '../Objects/Theatre/TheatreFunctions.php';
       include '../Objects/Movie/MovieObj.php';
       include '../Objects/Movie/MovieFunctions.php';
       $movie = getMovie($movieID);
        ?>

        <div id="selectTheaterContainer" class="d-flex justify-content-between">
                <div id="TheaterList" class="overflow-auto p-3 bg-body-tertiary">
                    <h3>Winterfell</h3>
                    <h3>King's Landing</h3>
                    <h3>Dragonstone</h3>
                    <h3>The Wall</h3>
                    <h3>Castle Black</h3>
                    <h3>Riverrun</h3>
                    <h3>Highgarden</h3>
                    <h3>Pyke</h3>
                    <h3>Dorne</h3>
                    <h3>Meereen</h3>
                    <h3>Storm's End</h3>
                    <h3>Harrenhal</h3>
                    <h3>The Eyrie</h3>
                    <h3>Casterly Rock</h3>
                    <h3>Braavos</h3>
                    <h3>Volantis</h3>
                    <h3>Qarth</h3>
                    <h3>Astapor</h3>
                    <h3>Yunkai</h3>
                    <h3>Oldtown</h3>
                    <h3>Sunspear</h3>
                    <h3>Dragonpit</h3>
                    <h3>White Harbor</h3>
                    <h3>Horn Hill</h3>
                    <h3>Moat Cailin</h3>
                    <h3>Seagard</h3>
                    <h3>Old Valyria</h3>
                    <h3>Summerhall</h3>
                    <h3>Valyria</h3>
                    <h3>Lannisport</h3>
                    <h3>Dragonstone</h3>
                    <h3>Qohor</h3>
                    <h3>Tarth</h3>
                    <h3>Dragonstone</h3>
                    <h3>Lys</h3>
                    <h3>King's Landing</h3>
                    <h3>Dragonstone</h3>
                    <h3>The Twins</h3>
                    <h3>The Arbor</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                    <h3>Dragonstone</h3>
                </div>
                <img src="<?php getMoviePoster($movie->movie_name) ?>" class="mx-auto" id="posterImage" alt="Movie Poster"> 
        </div>


      



        

    </body>

    <?php include 'Partials/Footer.html' ?>

</html>