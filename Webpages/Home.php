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

    <?php include 'HeaderFiles/HeaderTags.php';?>
    <!-- <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css"> -->
    

    <style>
        .loginForm{
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

</head>

<?php
include '../Objects/Movie/MovieObj.php';
include '../Objects/Movie/MovieFunctions.php';
$movies = getMovieObjArray()
?>



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
                            <button data-bs-toggle="modal" data-bs-target="#loginModal" type="button" class="btn btn-success"><i class="fa-solid fa-right-to-bracket fa-lg"></i> Login</button>
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
                        <div class="m-5">
                            <i class="fa-solid fa-envelope fa-xl"></i>
                            <input type="text" id="LoginEmail" class="loginForm bigger-input" name="LoginEmail" placeholder="Email">
                        </div>
                        <div class="m-5">
                            <i class="fa-solid fa-lock fa-xl"></i>
                            <input type="text" id="LoginPassword" class="loginForm bigger-input" name="LoginPassword" placeholder="Password">
                            <div class="d-flex justify-content-end">
                                <a href="" class="mt-2">Forgot Password?</a>
                            </div>
                        </div>
                        

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn buttonColor">Login</button>
                    </div>
                </div>
            </div>
        </div>

            <div class="container-fluid" id="content">
                <!-- Set up your HTML -->
                <div class="owl-carousel">
                    <?php
                    // Loop through the array of movie objects
                    foreach ($movies as $movie) {
                        ?>
                        <div class="card">
                            <img src="..." class="card-img-top" alt="Movie Poster"> <!-- Update the src attribute with the actual movie poster image -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $movie->movie_name; ?></h5> <!-- Display movie name -->
                                <p class="card-text Test">Director: <?php echo $movie->Director; ?></p> <!-- Display director -->
                                <p class="card-text">Actors: <?php echo $movie->actors; ?></p> <!-- Display actors -->
                                <p class="card-text">Release Date: <?php echo $movie->release_date; ?></p> <!-- Display release date -->
                                <p class="card-text">Genre: <?php echo $movie->genre; ?></p> <!-- Display genre -->
                                <p class="card-text">Rating: <?php echo $movie->rating; ?></p> <!-- Display rating -->
                                <a href="#" class="btn buttonColor ">Go somewhere</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            </div>


            <?php
            include '../Objects/Theatre/TheatreObj.php';
            include '../Objects/Theatre/TheatreFunctions.php';
            $theatres = getTheatreObjArray()
            ?>

            <div class="d-flex justify-content-between">
                <div class="overflow-auto p-3 m-3 bg-light " style="max-width: 400px;max-height:250px;"> 
                    <div class="list-group">
                        <?php foreach ($theatres as $theatre): ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <?php echo $theatre->location; ?> Cinema
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div> 
                <div>
                    placeholder
                </div>
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

