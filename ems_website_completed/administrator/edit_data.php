<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $conn = require_once("dbConfig.php");
    $getTID=$_POST['employee_ID'];
    $sql = "SELECT * FROM employee WHERE employee_ID='$getTID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<?php

if (isset($_POST['Title']) && isset($_POST['Full_Name']) && isset($_POST['Date_Of_Birth']) && isset($_POST['Gender']) && isset($_POST['NIC']) && isset($_POST['Marital_Status']) && isset($_POST['Nationality']) && isset($_POST['Religion'])){

    $title = $_POST['Title'];
    $fullName = $_POST['Full_Name'];
    $birthday = $_POST['Date_Of_Birth'];
    $gender = $_POST['Gender'];
    $nic = $_POST['NIC'];
    $maritalStatus = $_POST['Marital_Status'];
    $nationality = $_POST['Nationality'];
    $religion = $_POST['Religion'];


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    
    $sql = "UPDATE employee SET Title='$title', Full_Name='$fullName',Date_Of_Birth='$birthday',Gender='$gender',NIC='$nic',Marital_Status='$maritalStatus',Nationality='$nationality',Religion='$religion'  WHERE employee_ID='$getTID'";

    if ($conn->query($sql) === TRUE) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Peronal details has been updated by admin.', 'unread', 'change Personal Details', '18')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
        echo "Personal Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

 
}
if (isset($_POST['Address']) && isset($_POST['Country']) && isset($_POST['Phone']) && isset($_POST['Mobile']) && isset($_POST['E_mail'])){

    $address = $_POST['Address'];
    $country = $_POST['Country'];
    $phone = $_POST['Phone'];
    $mobile = $_POST['Mobile'];
    $email = $_POST['E_mail'];


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    
    $sql = "UPDATE employee SET Address='$address', Country='$country',Phone='$phone',Mobile='$mobile',E_mail='$email' WHERE employee_ID='$getTID'";

    if ($conn->query($sql) === TRUE) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Contact details has been updated by admin.', 'unread', 'change Contact Details', '16')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
        echo "Contact Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    

}

if (isset($_POST['Date_Of_Joinning']) && isset($_POST['Designation']) && isset($_POST['Employee_type']) && isset($_POST['Department'])){

    $joinDate = $_POST['Date_Of_Joinning'];
    $designation = $_POST['Designation'];
    $employeeType = $_POST['Employee_type'];
    $department = $_POST['Department'];
   

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    
    $sql = "UPDATE employee SET Date_Of_Joinning='$joinDate', Designation='$designation',Employee_type='$employeeType',Department='$department' WHERE employee_ID='$getTID'";

    if ($conn->query($sql) === TRUE) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Employee details has been updated by admin.', 'unread', 'change Employee Details', '17')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
        echo "Employement Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
    $conn->close();
}

?>