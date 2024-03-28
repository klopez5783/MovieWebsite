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
    session_start();
    if(isset($_SESSION['UserLoggedIn']) && isset($_SESSION['UserId']) ){
      $UserName = $_SESSION['UserLoggedIn'];
      $UserID = $_SESSION['UserId'];
      $UserName = $_SESSION['UserName'];
    }
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

        <div class="mx-auto" id="navBar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto" id="navBar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Features</a>
                            <a class="nav-link" href="#">Pricing</a>
                        </div>
                        <div class="navbar-nav ms-auto" id="loginDiv">
                          
                        <?php 
                          if(isset($_SESSION['UserLoggedIn']) && isset($_SESSION['UserId']) ){
                            echo '<a class="nav-link" href="Table.php">Tables</a>
                            <form action="../Processes/processLogout.php"
                            style="display:flex;">Welcome Back '.$UserName. '
                            <button data-bs-target="#loginModal" type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket fa-lg"></i> Logout</button>
                            </form>';
                          }
                          else{
                            echo '<div><button data-bs-toggle="modal" data-bs-target="#loginModal" type="button" class="btn btn-success"><i class="fa-solid fa-right-to-bracket fa-lg"></i> Login</button></div>';
                          }
                          ?>
                        </div>
                        
                    </div>
                    
                </div>
            </nav>
        </div>


        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" id="loginModalContent">
                  <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold"><i class="fa-solid fa-user "></i> Login</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                      <form id="loginForm" action="../Processes/processLogin.php" method="POST">
                          <div class="m-4">
                              <i class="fa-solid fa-envelope fa-xl"></i>
                              <input type="text" id="LoginEmail" class="loginForm bigger-input" name="LoginEmail" placeholder="Email">
                          </div>
                          <div class="m-4">
                              <i class="fa-solid fa-lock fa-xl"></i>
                              <input type="password" id="LoginPassword" class="loginForm bigger-input" name="LoginPassword" placeholder="Password">
                              <div class="d-flex justify-content-end">
                                  <a href="" class="mt-2">Forgot Password?</a>
                              </div>
                          </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                      <button type="submit" class="btn buttonColor">Login</button>
                      <button data-bs-toggle="modal" data-bs-target="#signupModal" type="button" class="btn buttonColor"><i class="fa-solid fa-user-plus fa-lg"></i> Sign Up</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="signupModalContent">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fa-solid fa-user-plus"></i> Sign Up</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form id="signupForm" action="../Processes/processSignup.php" method="POST">
                        <div class="m-4">
                            <i class="fa-solid fa-envelope fa-xl"></i>
                            <input type="email" id="SignupEmail" class="signupForm bigger-input" name="SignupEmail" placeholder="Email" required>
                        </div>
                        <div class="m-4">
                            <i class="fa-solid fa-lock fa-xl"></i>
                            <input type="password" id="SignupPassword" class="signupForm bigger-input" name="SignupPassword" placeholder="Password" required>
                        </div>
                        <div class="m-4">
                            <i class="fa-solid fa-lock fa-xl"></i>
                            <input type="password" id="ConfirmSignupPassword" class="signupForm bigger-input" name="ConfirmSignupPassword" placeholder="Confirm Password" required>
                        </div>
                        <div class="m-4">
                            <i class="fa-solid fa-phone fa-xl"></i>
                            <input type="tel" id="SignupPhoneNumber" class="signupForm bigger-input" name="SignupPhoneNumber" placeholder="Phone Number" required>
                        </div>
                        <div class="m-4">
                            <i class="fa-solid fa-user fa-xl"></i>
                            <input type="text" id="SignupCustomerName" class="signupForm bigger-input" name="SignupCustomerName" placeholder="Customer Name" required>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn buttonColor">Submit Sign Up</button>
                        <button data-bs-toggle="modal" data-bs-target="#loginModal" type="button" id="SubmitSignup" class="btn btn-success"><i class="fa-solid fa-right-to-bracket fa-lg"></i> Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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

    <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted mt-4">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>