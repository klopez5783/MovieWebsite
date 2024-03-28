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
        
        

    </style>

  <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css">

  <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                const email = document.getElementById("SignupEmail");
                const password = document.getElementById("SignupPassword");
                const confirmPassword = document.getElementById("ConfirmSignupPassword");
                const submitButton = document.getElementById("SubmitSignup");

                email.addEventListener("input", () => {
                    if (!email.validity.valid) {
                        email.setCustomValidity("Please enter a valid email address");
                    } else {
                        email.setCustomValidity("");
                    }
                });

                confirmPassword.addEventListener("input", () => {
                    if (password.value !== confirmPassword.value) {
                        confirmPassword.setCustomValidity("Passwords do not match");
                    } else {
                        confirmPassword.setCustomValidity("");
                    }
                });
            });
    </script>

</head>

    <body class="bgImage">

    <?php include 'Partials/NavBar.html' ?> 
            <div class="container-fluid" id="content">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="submit" name="Movies" value="Retrieve Movies">
                </form>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="submit" name="Theatres" value="Retrieve Theatre">
                </form>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="submit" name="Customers" value="Retrieve Customers">
                </form>
                <div>
                <?php if(isset($_POST['Movies'])){
                include '../Objects/Movie/MovieObj.php';
                include '../Objects/Movie/MovieFunctions.php';
                $movies = getMovieObjArray();
                

                if (!empty($movies)) {

                    echo '<a href="addMovie.php" class="btn btn-primary float-end me-3">Add Movie</a>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Movie ID</th>';
                    echo '<th scope="col">Movie Name</th>';
                    echo '<th scope="col">Actors</th>';
                    echo '<th scope="col">Director</th>';
                    echo '<th scope="col">Release Date</th>';
                    echo '<th scope="col">Edit</th>';
                    echo '<th scope="col">Delete</th>';
                    echo '</tr>';
                    echo '</thead>';
                    
                    echo '<tbody>';
                    foreach ($movies as $movie) {
                        echo '<tr>';
                        echo '<th scope="row">' . $movie->Movie_ID . '</th>';
                        echo '<td>' . $movie->movie_name . '</td>';
                        echo '<td>' . $movie->actors . '</td>';
                        echo '<td>' . $movie->Director . '</td>';
                        echo '<td>' . $movie->release_date . '</td>';
                        echo '<td><a href="edit_movie.php?id=' . $movie->Movie_ID . '">Edit</a></td>';
                        echo '<td>';
                        echo '<form method="post" action="delete_movie.php">';
                        echo '<input type="hidden" name="delete_id" value="' . $movie->Movie_ID . '">';
                        echo '<input type="submit" name="delete" value="Delete" class="btn btn-danger">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    
                    echo '</table>';
                } 
            }

            if(isset($_POST['Theatres'])){
                include '../Objects/Theatre/TheatreObj.php';
                include '../Objects/Theatre/TheatreFunctions.php';
                $theaters = getTheatreObjArray();
                
                
                if (!empty($theaters)) {
                  echo '<a href="addLocation.php" class="btn btn-primary float-end me-3">Add Location</a>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Theater ID</th>';
                    echo '<th scope="col">Name</th>';
                    echo '<th scope="col">Location</th>';
                    echo '<th scope="col">Edit</th>';
                    echo '<th scope="col">Delete</th>';
                    echo '</tr>';
                    echo '</thead>';
                    
                    echo '<tbody>';
                    foreach ($theaters as $theater) {
                        echo '<tr>';
                        echo '<th scope="row">' . $theater->theatre_id . '</th>';
                        echo '<td>' . $theater->name . '</td>';
                        echo '<td>' . $theater->location . '</td>';
                        echo '<td><a href="edit_theater.php?id=' . $theater->theatre_id . '">Edit</a></td>';
                        echo '<td>';
                        echo '<form method="post" action="delete_theater.php">';
                        echo '<input type="hidden" name="delete_id" value="' . $theater->theatre_id . '">';
                        echo '<input type="submit" name="delete" value="Delete" class="btn btn-danger">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    
                    echo '</table>';
                }else {
                    echo '<p>No theaters found.</p>';
                }
            }


            if(isset($_POST['Customers'])){
                include '../Objects/Customers/CustomersObj.php';
                include '../Objects/Customers/CustomersFunctions.php';
                $Customers = getCustomerObjArray();
                
                if (!empty($Customers)) {
                  echo '<a href="addCustomer.php" class="btn btn-primary float-end me-3">Add Customer</a>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Customer ID</th>';
                    echo '<th scope="col">Name</th>';
                    echo '<th scope="col">Email</th>';
                    echo '<th scope="col">Phone Number</th>';
                    echo '<th scope="col">Edit</th>';
                    echo '<th scope="col">Delete</th>';
                    echo '</tr>';
                    echo '</thead>';
                    
                    echo '<tbody>';
                    foreach ($Customers as $customer) {
                        echo '<tr>';
                        echo '<th scope="row">' . $customer->Customer_ID . '</th>';
                        echo '<td>' . $customer->Customer_Name . '</td>';
                        echo '<td>' . $customer->Email . '</td>';
                        echo '<td>' . $customer->phone_number . '</td>';
                        echo '<td><a href="edit_customer.php?id=' . $customer->Customer_ID . '">Edit</a></td>';
                        echo '<td>';
                        echo '<form method="post" action="delete_customer.php">';
                        echo '<input type="hidden" name="delete_id" value="' . $customer->Customer_ID . '">';
                        echo '<input type="submit" name="delete" value="Delete" class="btn btn-danger">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    
                    echo '</table>';
                }

            }

            ?>
                </div>
            </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                    stagePadding: 50,
                    loop:true,
                    margin:10,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
            });
        </script>

    </body>

   <?php include 'Partials/Footer.html' ?>
</html>