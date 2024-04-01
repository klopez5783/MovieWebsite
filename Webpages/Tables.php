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


<script>
function deleteRecord(uniqueId, tableName, columnName) {
    // Send data via AJAX to the PHP script
    $.ajax({
        type: "POST",
        url: "../Processes/deleteRecord.php", // PHP script to set session
        data: {
            unique_id: uniqueId,
            table_name: tableName,
            column_name: columnName
        },
        success: function(response) {
            console.log("Response from php file : " + response);
            $('#DeleteRecordModal'+uniqueId).modal('hide');
            $('#deleteSuccessModal').modal('show'); // Show the success modal
        },
        error: function(xhr, status, error) {
            // Handle error if needed
            console.error("Error:", error);
            $('#deleteErrorModal .modal-body').text(response.trim()); // Set the error message in the modal
            $('#deleteErrorModal').modal('show'); // Show the error modal
        }
    });
    
}


function refreshPage() {
    window.location.reload();
}

</script>

</head>

<!-- Delete Success Modal -->
<div class="modal fade" id="deleteSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Record deleted successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refreshPage()" >Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Add Customer Modal -->
<div class="modal fade" id="AddCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus fa-xl"></i> Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form class="row g-3" method="post" action="add_customer.php">
                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="validationServer01" name="customerName" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer02" class="form-label">Email</label>
                    <input type="email" class="form-control" id="validationServer02" name="email" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="validationServer03" name="phoneNumber">
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationServer04" class="form-label">Password</label>
                    <input type="password" class="form-control" id="validationServer04" name="password" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Add Location Modal -->
<div class="modal fade" id="AddLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-location-dot fa-xl"></i> Add Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationServer01" class="form-label">Theater Name</label>
                <input type="text" class="form-control" id="validationServer01" name="theaterName" required>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label for="validationServer02" class="form-label">Location</label>
                <input type="text" class="form-control" id="validationServer02" name="location" required>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label for="validationServer03" class="form-label">State</label>
                <select class="form-select" id="validationServer03" name="state" required>
                    <option value="" disabled selected>Select State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <div class="valid-feedback">Looks good!</div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add Movie Modal -->
<div class="modal fade" id="AddMovieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-film fa-xl"></i> Add Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" action="add_movie.php" method="POST" novalidate>
            <div class="col-md-6">
                <label for="movieName" class="form-label">Movie Name</label>
                <input type="text" class="form-control" id="movieName" name="movieName" required>
                <div class="invalid-feedback">
                    Please provide a movie name.
                </div>
            </div>
            <div class="col-md-6">
                <label for="actors" class="form-label">Actors</label>
                <input type="text" class="form-control" id="actors" name="actors">
            </div>
            <div class="col-md-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director">
            </div>
            <div class="col-md-6">
                <label for="releaseDate" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="releaseDate" name="releaseDate">
            </div>
            <div class="col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
            <div class="col-md-6">
                <label for="ratings" class="form-label">Ratings</label>
                <input type="number" class="form-control" id="ratings" name="ratings" step="0.1" min="0" max="10">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


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

                    echo '<a href="addMovie.php" class="btn btn-primary float-end me-3" data-bs-toggle="modal" data-bs-target="#AddMovieModal" >Add Movie</a>';
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
                  echo '<a href="addLocation.php" class="btn btn-primary float-end me-3" data-bs-toggle="modal" data-bs-target="#AddLocationModal" >Add Location</a>';
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
                        echo '<input type="hidden" name="deleteID" value="' . $theater->theatre_id . '">';
                        echo '<input type="hidden" name="table_name" value="theater">';
                        echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteRecordModal' . $theater->theatre_id . '" >Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';

                        echo '<!-- Modal -->
                        <div class="modal fade" id="DeleteRecordModal' . $theater->theatre_id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="text-center"><i class="fa-regular fa-circle-xmark fa-4x" style="color: #f05151;"></i></div>
                                        <h4 class="text-center mt-3" >Are you sure you want to delete this record? This cannot be undone.</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger" onClick="deleteRecord(' . $theater->theatre_id . ', &quot;theater&quot;, &quot;theater_id&quot;)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
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
                  echo '<a href="addCustomer.php" class="btn btn-primary float-end me-3" data-bs-toggle="modal" data-bs-target="#AddCustomerModal" >Add Customer</a>';
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