<?php
session_start();
$db=require_once("administrator/dbConfig.php");
$username = $_POST['username'];
$password = sha1($_POST['password']);
$query1 = "SELECT * FROM employee where employee_ID='$username' AND e_password='$password'";

$query2 = "SELECT * FROM employee where E_mail='$username' AND e_password='$password'";
$query3 = "SELECT * FROM admin where a_username='$username' AND a_password='$password'";

$query4 = "SELECT * FROM admin where a_email='$username' AND a_password='$password'";

$resultSet1 = mysqli_query($db, $query1);
$resultSet2 = mysqli_query($db, $query2);
$resultSet3 = mysqli_query($db, $query3);
$resultSet4 = mysqli_query($db, $query4);

$popup = 1;
$message = "Successfully Logged in !";
if (mysqli_num_rows($resultSet1) > 0 || mysqli_num_rows($resultSet2) > 0) {
    if (mysqli_num_rows($resultSet1) > 0) {
        $resultAll = $resultSet1;
    } else {
        $resultAll = $resultSet2;
    }
    $result = mysqli_fetch_assoc($resultAll);
    $_SESSION["e_id"] = $result["employee_ID"];
    $_SESSION["username"] = $result["E_username"];
    $_SESSION["designation"] = $result["Designation"];
    $_SESSION["mobile"] = $result["Mobile"];
    $_SESSION["lanline"] = $result["Phone"];
    $_SESSION["hireDate"] = $result["Date_Of_Joinning"];
    $_SESSION["email"] = $result["E_mail"];
    $_SESSION["emp_type"] = $result["Employee_type"];
    $_SESSION["emp_department"] = $result["Department"];
    $_SESSION["image"] = $result["image"];


    echo "<script type='text/javascript'>
                        window.location.href='Personal.php';</script>";

} elseif (mysqli_num_rows($resultSet3) > 0 || mysqli_num_rows($resultSet4) > 0) {
    if (mysqli_num_rows($resultSet3) > 0) {
        $resultAll = $resultSet3;
    } else {
        $resultAll = $resultSet4;
    }
    $result = mysqli_fetch_assoc($resultAll);
    $_SESSION["a_id"] = $result["a_id"];
    $_SESSION["username"] = $result["a_username"];
    $_SESSION["email"] = $result["a_email"];



    echo "<script type='text/javascript'>
                        window.location.href='administrator/admin_home_search.php';</script>";
} else {
    
    $message = "Login failed, incorrect password or username.";
    $popup=0;
    echo "<script type='text/javascript'> 
            window.location.href='login.php';
            </script>";
}



mysqli_close($db);
?>

