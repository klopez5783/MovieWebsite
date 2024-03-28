<?php
include '../Configuration/DBconnect.php';
// Echo the link tag to include the CSS file

echo '<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/d8ebdfa3e8.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
';

echo '<link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css">';

session_start();
    if(isset($_SESSION['UserLoggedIn']) && isset($_SESSION['UserId']) ){
      $UserName = $_SESSION['UserLoggedIn'];
      $UserID = $_SESSION['UserId'];
      $UserName = $_SESSION['UserName'];
    }
?>
