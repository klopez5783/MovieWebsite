
<?php
include '../Objects/Movie/MovieObj.php';
include '../Objects/Movie/MovieFunctions.php';
$movies = getMovieObjArray()
?>


    <div class="owl-carousel mt-3">
        <?php
        // Loop through the array of movie objects
        foreach ($movies as $movie) {
            ?>
            <div class="card">
                <img src="../Images/<?php echo $movie->movie_name; ?>//<?php echo $movie->movie_name; ?>_poster.jpg" class="card-img-top" alt="Movie Poster"> <!-- Update the src attribute with the actual movie poster image -->
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <h5 class="card-title mx-auto"><?php echo $movie->movie_name; ?></h5> <!-- Display movie name -->
                    </div>
                    <div>
                      <div style="display:flex;">
                        <p class="">Genre: <?php echo $movie->genre; ?></p> <!-- Display genre -->
                        <p class="">Rating: <?php echo $movie->rating; ?></p> <!-- Display rating -->
                      </div>
                      <p class="">Release Date: <?php echo $movie->release_date; ?></p> <!-- Display release date -->
                    </div>
                    <a href="#" class="btn buttonColor ">Go somewhere</a>
                </div>
            </div>
        <?php
        }
        ?>

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