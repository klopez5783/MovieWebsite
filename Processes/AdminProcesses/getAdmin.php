<?php
include_once '../../Configuration/DBconnect.php';
include_once '../../Objects/Customers/CustomersObj.php';
include_once '../../Objects/Customers/CustomersFunctions.php';

if(isset($_POST['userID'])){

    $id = $_POST['userID'];

    $user = getUser($id);

    echo json_encode($user);
}
