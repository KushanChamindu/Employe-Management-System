<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
 
    if (isset($_POST['Title']) or isset($_POST['Full_Name']) or isset($_POST['Date_Of_Birth']) or isset($_POST['Gender']) or isset($_POST['NIC']) or isset($_POST['Marital_Status']) or isset($_POST['Nationality']) or isset($_POST['Religion']) or isset($_POST['Date_Of_Joinning']) or isset($_POST['Designation']) or isset($_POST['Employee_type']) or isset($_POST['Department']) or isset($_POST['Address']) or isset($_POST['Country']) or isset($_POST['Phone']) or isset($_POST['Mobile']) or isset($_POST['E_mail'])){

        $title = $_POST['Title'];
        $fullName = $_POST['Full_Name'];
        $userName = $_POST['User_Name'];
        $birthday = $_POST['Date_Of_Birth'];
        $gender = $_POST['Gender'];
        $nic = $_POST['NIC'];
        $maritalStatus = $_POST['Marital_Status'];
        $nationality = $_POST['Nationality'];
        $religion = $_POST['Religion'];
        $address = $_POST['Address'];
        $country = $_POST['Country'];
        $phone = $_POST['Phone'];
        $mobile = $_POST['Mobile'];
        $email = $_POST['E_mail'];
        $employeeID=$_POST['employeeID'];
        $joinDate = $_POST['Date_Of_Joinning'];
        $designation = $_POST['Designation'];
        $employeeType = $_POST['Employee_type'];
        $department = $_POST['Department'];
        $password = sha1($_POST['password']);

        $conn = require_once("dbConfig.php");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO employee(Title,Full_Name,E_username,Date_Of_Birth,Gender,NIC,Marital_Status,Nationality,Religion,Address,Country,Phone,Mobile,E_mail,Date_Of_Joinning,Designation,Employee_type,Department,e_password,employee_ID) VALUES ('$title','$fullName','$userName','$birthday','$gender','$nic','$maritalStatus','$nationality','$religion','$address','$country','$phone','$mobile','$email','$joinDate','$designation','$employeeType','$department','$password','$employeeID')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>