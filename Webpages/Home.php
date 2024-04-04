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
    
    ?>
    <!-- <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css"> -->
    

    <style>
        .loginForm , .signupForm{
            border: none;
            border-bottom: 1px solid black;
            outline: none;
        }
        /* Define bigger-input class */
        .bigger-input {
            font-size: 16px; /* Adjust the font size as needed */
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


        <?php include 'Partials/OwlCarousel.php' ?>


        <?php
        include '../Objects/Theatre/TheatreObj.php';
        include '../Objects/Theatre/TheatreFunctions.php';
        $theaters = getTheatreObjArray()
        ?>

        <script>
        function SessionSet(ID) {
            // Send data via AJAX to the PHP script
            $.ajax({
                type: "POST",
                url: "set_session_variable.php", // PHP script to set session
                data: {
                    id: ID
                },
                success: function(response) {
                    // console.log("Response from php file : " + response);
                    if(response == "Session Variable Set") location.replace("Theater.php")
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    console.error("Error:", error);
                    $('#deleteErrorModal .modal-body').text(response.trim()); // Set the error message in the modal
                    $('#deleteErrorModal').modal('show'); // Show the error modal
                }
            });
            
        }
        </script>


        <div class="container">
            <div class="row">
                <?php foreach ($theaters as $theater): ?>
                <div class="col mb-2">
                    <button id="theater_<?php echo $theater->theater_id; ?>" onclick="SessionSet(<?php echo $theater->theater_id; ?>)" class="card cardHover" href="#" style="width: 13rem;">
                        <div class="card-body">
                            <!-- Use anchor tag inside card -->
                            <h5 class="card-title"><div class="card-link"><?php echo $theater->name; ?></div></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $theater->location; ?></h6>
                        </div>
                    </button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>



        

    </body>

    <?php include 'Partials/Footer.html' ?>

</html>