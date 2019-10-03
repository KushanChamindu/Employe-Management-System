<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems_database";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//foreach ($row as $key => $value) {
//    echo "Key: $key; Value: $value\n";
//}

//$conn->close();
?>