<?php
include_once '../Configuration/DBconnect.php';
include "../Objects/Customers/CustomersFunctions.php";
session_start();
if ( isset( $_GET['token'] )){
    $token = $_GET['token'];
    $_SESSION['token'] = validateToken($token);

   if ( $_SESSION['token'] ) {
    header("Location: /MovieWebsite/webpages/ResetPassword.php");
   }else{
    header("Location: /MovieWebsite/webpages/Home.php");
   }
}
else{
    echo "Post or token not set.";
}

?>