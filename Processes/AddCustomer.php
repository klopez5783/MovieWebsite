<?php
define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Customers/CustomersFunctions.php';

$customerName = $_POST['customerName'];
$email = $_POST['email']?? null;
$phoneNumber = $_POST['phoneNumber']?? null;
$password = $_POST['password']?? null;

$result = addCustomer($customerName,$email,$phoneNumber,$password);

if($result){
    echo "Customer Added";
}
else{
    echo "Failed to insert movie.";
}

?>