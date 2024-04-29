<?php 
include 'HeaderFiles/HeaderTags.php';
include '../Processes/SignUpFunctions.php';
echo "ShowTime ID: " . $_SESSION['ShowTimeID'] . "<br>";
if( isset( $_SESSION['selected_seats'] )){
    echo 'session is set';
}
print_r($_SESSION['selected_seats'] );
?>

<!DOCTYPE html>
<html lang="en">
<head>

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

</style>

<script>

</script>


</head>





<body class="bgImage">

        <?php include 'Partials/NavBar.html' ?> 
  

</body>

    <?php include 'Partials/Footer.html' ?>

</html>