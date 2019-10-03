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

if (isset($_POST['Title']) && isset($_POST['Full_Name']) && isset($_POST['Date_Of_Birth']) && isset($_POST['Gender']) && isset($_POST['NIC']) && isset($_POST['Marital_Status']) && isset($_POST['Nationality']) && isset($_POST['Religion']) && isset($_POST['change_num'])){

    $title = $_POST['Title'];
    $fullName = $_POST['Full_Name'];
    $birthday = $_POST['Date_Of_Birth'];
    $gender = $_POST['Gender'];
    $nic = $_POST['NIC'];
    $maritalStatus = $_POST['Marital_Status'];
    $nationality = $_POST['Nationality'];
    $religion = $_POST['Religion'];
    $change_num=$_POST['change_num'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    $sql_delet="DELETE FROM editemployee WHERE Num_Change ='$change_num'";
    $sql = "UPDATE employee SET Title='$title', Full_Name='$fullName',Date_Of_Birth='$birthday',Gender='$gender',NIC='$nic',Marital_Status='$maritalStatus',Nationality='$nationality',Religion='$religion'  WHERE employee_ID='$getTID'";

    if ($conn->query($sql) === TRUE && $conn->query($sql_delet)) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Your Personal details change request has been accepted.', 'unread', 'Personal Details change approved', '14')";
        //update past msg-56
            if(!($db->query($notify_sql))){echo "Connection loss";}
        $update_sql="UPDATE msg_info SET status='77' WHERE change_ID='$change_num'";
            if(!($db->query($update_sql))){echo "Connection loss";}
        //echo success
        echo "Personal Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

 
}
//contact
if (isset($_POST['Address']) && isset($_POST['Country']) && isset($_POST['Phone']) && isset($_POST['Mobile']) && isset($_POST['E_mail']) && isset($_POST['change_num'])){

    $address = $_POST['Address'];
    $country = $_POST['Country'];
    $phone = $_POST['Phone'];
    $mobile = $_POST['Mobile'];
    $email = $_POST['E_mail'];
    $change_num=$_POST['change_num'];
    
//    echo $address,$country,$phone,$mobile,$email,$change_num;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                
    $sql_delet="DELETE FROM editemployee WHERE Num_Change ='$change_num'";
    $sql = "UPDATE employee SET Address='$address', Country='$country',Phone='$phone',Mobile='$mobile',E_mail='$email' WHERE employee_ID='$getTID'";

    if ($conn->query($sql) === TRUE && $conn->query($sql_delet)) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Your Contact details change request has been accepted.', 'unread', 'Contact Details change approved', '10')";
        //update past msg-56
            if(!($db->query($notify_sql))){echo "Connection loss";}
        $update_sql="UPDATE msg_info SET status='66' WHERE change_ID='$change_num'";
            if(!($db->query($update_sql))){echo "Connection loss";}
        //echo success
        echo "Contact Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    

}
//employee
if (isset($_POST['Date_Of_Joinning']) && isset($_POST['Designation']) && isset($_POST['Employee_type']) && isset($_POST['Department']) && isset($_POST['change_num'])){

    $joinDate = $_POST['Date_Of_Joinning'];
    $designation = $_POST['Designation'];
    $employeeType = $_POST['Employee_type'];
    $department = $_POST['Department'];
    $change_num=$_POST['change_num'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //aprroved employ
    $sql_delet="DELETE FROM editemployee WHERE Num_Change ='$change_num'";
    $sql = "UPDATE employee SET Date_Of_Joinning='$joinDate', Designation='$designation',Employee_type='$employeeType',Department='$department' WHERE employee_ID='$getTID'";
    
    // new msg without change id-12
    if ($conn->query($sql) === TRUE && $conn->query($sql_delet)) {
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Your Employee details change request has been accepted.', 'unread', 'Employee Details change approved', '12')";
        //update past msg-56
            if(!($db->query($notify_sql))){echo "Connection loss";}
        $update_sql="UPDATE msg_info SET status='55' WHERE change_ID='$change_num'";
            if(!($db->query($update_sql))){echo "Connection loss";}
        //echo success
        echo "Employement Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }    
}

//cancel
if(isset($_POST["cancel"]) && isset($_POST['change_num'])){
    $change_num=$_POST['change_num'];
    $cancel=$_POST["cancel"];
    $sql_delet="DELETE FROM editemployee WHERE Num_Change ='$change_num'";
    
    
            if(!($db->query($notify_sql))){echo "Connection loss";}
      if ( $cancel == TRUE && $conn->query($sql_delet)) {
          
           $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status)
VALUES ('$getTID', 'Your details change request has been declined.', 'unread', 'Details change declined', '11')";
          
          $update_sql="UPDATE msg_info SET status='56' WHERE change_ID='$change_num'";
            if(!($db->query($update_sql))){echo "Connection loss";}
        echo "Employment Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>