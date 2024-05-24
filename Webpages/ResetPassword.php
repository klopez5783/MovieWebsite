<?php 
include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';
if ( !$_SESSION['token'] ) {
    header("Location: /MovieWebsite/webpages/Home.php");
   }
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


    </style>

  <!-- <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css"> -->

  

</head>





    <body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 

        <div class="container mt-5" id="Passwordform">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-lock fa-xl"></i>
                            <div class="ms-2">
                                Enter New Password
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="updatePasswordForm" action="../Processes/UpdatePassword.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="password" id="UpdatePassword" class="form-control" name="UpdatePassword" placeholder="Password" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" id="UpdatePasswordconfirm" class="form-control" name="ConfirmUpdatePassword" placeholder="Confirm Password" required>
                                </div>
                                <div class="modal-footer d-flex justify-content-evenly">
                                    <button type="submit" class="btn buttonColor">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
    </body>

    <?php include 'Partials/Footer.html' ?>

</html>