<?php
require "JsFunction.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_ems";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM employee WHERE `NIC`='945950242V'";
//$sql = "SELECT NIC FROM employee";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//foreach ($row as $key => $value) {
//    echo "Key: $key; Value: $value\n";
//}

$conn->close();
?>