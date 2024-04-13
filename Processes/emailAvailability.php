<?php


define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

include '../Objects/Customers/CustomersFunctions.php';

$email = $_POST['email']?? null;

if (emailExists($email)) {
    echo "Email exists in the database.";
} else {
    echo "Email does not exist in the database.";
}

?>