<?php
include_once '../Configuration/DBconnect.php';
include "../Objects/Customers/CustomersFunctions.php";

if ( isset( $_POST['token'] )){
    $token = $_POST['token'];
    $result = validateToken($token);

   echo $result;
   }
else{
    echo "Post or token not set.";
}

?>