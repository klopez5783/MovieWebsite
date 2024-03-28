<html>

<head>
<?php include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';
?>
</head>

<body class="bgImage">

<?php include 'Partials/NavBar.html' ?> 

    <div class="container-fluid d-flex" id="content">
        <form class="row " method="post" action="add_theater.php">
            <div class="">
                <label for="validationServer01" class="form-label">Theater Name</label>
                <input type="text" class="form-control" id="validationServer01" name="theaterName" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="">
                <label for="validationServer02" class="form-label">Location</label>
                <input type="text" class="form-control" id="validationServer02" name="location" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="">
        <label for="validationServer01" class="form-label">State</label>
        <select class="form-select" id="validationServer01" name="state" required>
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
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

            <div class="col-12 d-flex align-items-end btn-group">
                <a href="Tables.php" class="btn btn-success">Back to Tables</a>
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-person-circle-plus fa-xl"></i> Add Location</button>
            </div>

        </form>
    <div class="mx-auto">
        <img src="../Images/UserAdd.png" alt="" width="350px;">
        <h3 class="d-flex justify-content-center">Add New Location</h3>
    </div>

    </div>
    
</body>


</html>