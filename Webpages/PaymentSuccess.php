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

    <?php include 'HeaderFiles/HeaderTags.php';
    include '../Processes/SignUpFunctions.php';
    
    $showAlert = 1;

    if (isset($_SESSION['token']) && !$_SESSION['token'] ){
        $showAlert = $_SESSION['token'];
        unset($_SESSION['token']); // Unset the token session variable
    }
    ?>
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


    // Define vars we'll be using
    :root {
            --brand-success: #5cb85c;
            --loader-size: 7em;
            --check-height: calc(var(--loader-size) / 2);
            --check-width: calc(var(--check-height) / 2);
            --check-left: calc(var(--loader-size) / 6 + var(--loader-size) / 12);
            --check-thickness: 3px;
            --check-color: var(--brand-success);
        }



 .circle-loader {
            margin-bottom: 1.5em; /* 7em / 2 */
            margin-top: 1.5em; /* 7em / 2 */
            border: 4px solid rgba(0, 0, 0, 0.2);
            border-left-color: #268226;
            animation: loader-spin 1.2s infinite linear;
            position: relative;
            display: inline-block;
            vertical-align: top;
            border-radius: 50%;
            width: 7em;
            height: 7em;
        }

        .load-complete {
            -webkit-animation: none;
            animation: none;
            border-color: #268226;
            transition: border 500ms ease-out;
        }

        .checkmark {
            display: none;
        }

        .checkmark.draw:after {
            animation-duration: 800ms;
            animation-timing-function: ease;
            animation-name: checkmark;
            transform: scaleX(-1) rotate(135deg);
        }

        .checkmark:after {
            opacity: 1;
            height: 3.5em; /* 7em / 2 */
            width: 1.75em; /* (7em / 2) / 2 */
            transform-origin: left top;
            border-right: 3px solid #5cb85c;
            border-top: 3px solid #5cb85c;
            content: '';
            left: 1.75em; /* (7em / 6 + 7em / 12) */
            top: 3.5em; /* 7em / 2 */
            position: absolute;
        }

        @keyframes loader-spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }
            20% {
                height: 0;
                width: 1.75em; /* (7em / 2) / 2 */
                opacity: 1;
            }
            40% {
                height: 3.5em; /* 7em / 2 */
                width: 1.75em; /* (7em / 2) / 2 */
                opacity: 1;
            }
            100% {
                height: 3.5em; /* 7em / 2 */
                width: 1.75em; /* (7em / 2) / 2 */
                opacity: 1;
            }
        }


        #paymentSuccessContainer{
            text-align:center;
            background-color: white;
            width: 50%;
        }

        /* Media Queries */
        @media (max-width: 1200px) {
            #paymentSuccessContainer {
                width: 60%;
            }
        }

        @media (max-width: 992px) {
            #paymentSuccessContainer {
                width: 70%;
            }
        }

        @media (max-width: 768px) {
            #paymentSuccessContainer {
                width: 85%;
            }
        }

        @media (max-width: 576px) {
            #paymentSuccessContainer {
                width: 90%;
                flex-direction: column;
                text-align: center;
            }
        }

    </style>

<script>
        setTimeout(function() {
            document.querySelector('.circle-loader').classList.add('load-complete');
            document.querySelector('.checkmark').style.display = 'block';
        }, 1000); // 2 seconds delay
    </script>
  

</head>

    <body class="bgImage">

    <?php include 'Partials/NavBar.html' ?> 

    <div class="mt-3 container-fluid rounded" id="paymentSuccessContainer">
        <div class="row justify-content-center">
            <div class="circle-loader">
                <div class="checkmark draw"></div>
            </div>
            <div class="" id="paymentSuccessText">
                <div id="movieImg">

                </div>
                <div id="paymentSuccesMessage">
                    <h4>Payment Succesful</h4>
                    <h5>Check your email to view tickets</h5>
                </div>

                <hr>
            </div>
        </div>

        <h5>
            <?php

            print_r($_SESSION); // Or var_dump($_SESSION);

            include '../Objects/Theatre/TheatreObj.php';
            include '../Objects/Theatre/TheatreFunctions.php';
            include '../Objects/Movie/MovieObj.php';
            include '../Objects/Movie/MovieFunctions.php';
            include '../Objects/Show/ShowTimeFunctions.php';
            include '../Objects/Show/ShowObj.php';

            $showID = $_SESSION['ShowTimeID'];
            $show = getShowTimeOBJWithID($showID);


            ?>
        </h5>

    </div>
    
    </body>

    <?php include 'Partials/Footer.html' ?>

</html>