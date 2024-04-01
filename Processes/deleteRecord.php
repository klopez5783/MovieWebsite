<?php

define('BASE_PATH', dirname(__DIR__));
include_once BASE_PATH . '/Configuration/DBconnect.php';

 // Access the global $conn variable
 global $conn;
session_start();

// // Set session variables
$_SESSION['uniqueId'] = $_POST['unique_id'];
$_SESSION['tableName'] = $_POST['table_name'];
$_SESSION['columnName'] = $_POST['column_name'];



// if( isset($_POST['unique_id']) ) echo '\n column Name is Set';

if(isset($_SESSION['uniqueId']) && isset($_SESSION['tableName']) && isset($_SESSION['columnName'])) {
    $id = $_SESSION['uniqueId'];
    echo $id;
    $tableName = $_SESSION['tableName'];
    $column = $_SESSION['columnName'];
    $query = "Delete FROM $tableName WHERE $column = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$id);
    if ($stmt->execute()) {
        // Query executed successfully
        echo "Record deleted successfully.";
    } else {
        // Error occurred during execution
        echo "Error deleting record: " . $stmt->error;
    }
}
?>
