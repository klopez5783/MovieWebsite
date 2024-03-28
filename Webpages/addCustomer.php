<html>

<head>
<?php include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';
?>
</head>


    <body class="bgImage">

    <?php include 'Partials/NavBar.html' ?> 

    <div class="container-fluid d-flex" id="content">
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
            <div class="col-12 d-flex align-items-end btn-group">
                <a href="Tables.php" class="btn btn-success">Back to Tables</a>
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-person-circle-plus fa-xl"></i> Add Customer</button>
            </div>
        </form>
        <div>
            <img src="../Images/UserAdd.png" alt="" width="350px;">
            <h3 class="d-flex justify-content-center">Add Location</h3>
        </div>

    </div>

   
        
    </body>
</html>