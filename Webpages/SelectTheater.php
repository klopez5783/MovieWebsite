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

    

    #TheaterList{
            margin: 0px auto 0px auto;
            width: 100%;
            height: 600px;
        }

    

.small-scroll-box {
    height: 200px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Optional: add a border for visual distinction */
}

.scroll-content {
    padding: 10px; /* Optional: add padding to the scrollable content */
}


#TheaterTitle{
    background-color: rgba(0, 0, 0, 0.25);
}

#posterImage{
    display: none;
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

<script>
        // Function to handle selecting a date
        function selectDate(date) {
            // Set the selected date as a session variable using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../Processes/SetDateSession.php?date=" + encodeURIComponent(date), true);
            xhr.send();

            // Reload the page with the selected date as a query parameter
            window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?date=" + encodeURIComponent(date);
        }

</script>


</head>





    <body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 


        <?php
       include '../Objects/Theatre/TheatreObj.php';
       include '../Objects/Theatre/TheatreFunctions.php';
       include '../Objects/Movie/MovieObj.php';
       include '../Objects/Movie/MovieFunctions.php';
       include '../Objects/Show/ShowTimeFunctions.php';
       include '../Objects/Show/ShowObj.php';
       $movie = getMovie($movieID);
       $dates = getMovieShowTimeDates($movieID);


       $currentDate = $dates[0];
       echo $currentDate;
       
       if (isset($_SESSION['selected_date'])) {
        // Sanitize the input date
        $currentDate = $_SESSION['selected_date'];
        // Set the date as a session variable
        }

       
       $showTimeArray = getMovieTimes($movieID,$currentDate);
       unset($_SESSION['selected_date']);
       $startTimes = getStartTimes($showTimeArray);
       ?>
       
        <div id="selectTheaterContainer" class="mt-2">
            <div class="d-flex justify-content-center">
                <!-- Theater List Column -->
                <div class="col-6 d-flex align-items-center">
                    <div id="TheaterList" class="overflow-auto bg-body-tertiary">
                        <div class="row">
                            <!-- Date Dropdown -->
                            <form action="" class="col-4">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle m-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-calendar fa-lg"></i> Date 
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php foreach($dates as $date){ ?>
                                            <li><a class="dropdown-item" href="#" onclick="selectDate('<?php echo $date; ?>')" ><?php echo $date ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </form>
                            <!-- Movie Name -->
                            <div class="col-8">
                                <?php echo $movie->movie_name ?>   
                            </div>
                        </div>
                        <!-- Theater Sections -->
                        <?php foreach ($startTimes as $id=>$start){ $theaterOBJ = getTheaterObj($id); ?>
                            <div id="TheaterContainer" class="p-1">
                                <div class="card-body border-bottom" id="TheaterSection">
                                    <h5 class="card-title p-3 rounded-3" id="TheaterTitle"><?php echo $theaterOBJ->name; ?> 
                                        <a href=""><i class="fa-solid fa-map-location-dot fa-lg mx-2"></i></a> 
                                    </h5>
                                    <!-- Theater Start Times -->
                                    <div class="d-flex">
                                        <?php foreach( $start as $timeStart ) {  ?>
                                            <form action="../Processes/SetDateSession.php" method="POST">
                                                <input type="hidden" name="MTD">
                                                <input type="hidden" name="ShowTimeID" value="<?php $showTimeOBJ = getShowTimeOBJ($movieID,$currentDate,$theaterOBJ->theater_id); echo $showTimeOBJ->showtime_ID ?>">
                                                <input type="submit" class="m-2 btn btn-outline-secondary" value="<?php echo date('g:i A', strtotime($timeStart)); ?>">
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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