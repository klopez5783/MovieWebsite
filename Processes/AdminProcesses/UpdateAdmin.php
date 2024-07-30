<?php
include_once '../../Configuration/DBconnect.php';
include_once '../../Objects/Customers/CustomersObj.php';
include_once '../../Objects/Customers/CustomersFunctions.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['UpdateAdminName']) && 
    isset($_POST['UpdatePhoneNumber']) &&
    isset($_POST['UpdateEmail']) && 
    isset($_POST['role']) &&
    isset($_POST['AdminID']) ){
       $name = $_POST['UpdateAdminName'];
       $number = $_POST['UpdatePhoneNumber'];
       $email = $_POST['UpdateEmail'];
       $role = $_POST['role'];
       $id = intval($_POST['AdminID']);

       echo "Number Type " .gettype($number). " \n ID Type : " . gettype($id) . "\n\n";

       $_SESSION['AdminUpdated'] = UpdateAdmin($name,$email,$number,$role,$id); 

        
    }
    

}

