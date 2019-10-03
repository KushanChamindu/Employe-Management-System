<?php
session_start();
require "database.php";
$e_id=$_SESSION['e_id'];
$emp_name=$_SESSION["username"];
$sql = "SELECT * FROM employee WHERE employee_ID='$e_id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
if (isset($_POST['Title']) or isset($_POST['Full_Name']) or isset($_POST['Date_Of_Birth']) or isset($_POST['Gender']) or isset($_POST['NIC']) or isset($_POST['Marital_Status']) or isset($_POST['Nationality']) or isset($_POST['Religion'])){
    $arrayPersonal=[];
    $keysPersonal="";
    $valuesPersonal="";
    $array_personal = ["Title", "Full_Name", "Date_Of_Birth", "Gender", "NIC", "Marital_Status", "Nationality", "Religion"];
    for ($i=0;$i<8;$i++){
        if($_POST[$array_personal[$i]]!=$row[$array_personal[$i]]){
            $arrayPersonal+=[$array_personal[$i] =>$_POST[$array_personal[$i]]];
        }else{$arrayPersonal+=[$array_personal[$i]=> ""];}
    }
    foreach ($arrayPersonal as $key => $value) {
        if($value!=""){
            $keysPersonal=$keysPersonal. ",".$key;
            $valuesPersonal=$valuesPersonal.",'".$value."'";
        }
    }
    $sql1="SELECT * FROM editemployee WHERE `employee_ID`= '$e_id'";
    $result1=$db->query($sql1);
    $already_exist=false;
    $array_already_request=[];
    while($array_already_request = $result1->fetch_assoc()){
        if($array_already_request["Title"]==$arrayPersonal["Title"] && $array_already_request["Full_Name"]==$arrayPersonal["Full_Name"] && $array_already_request["Date_Of_Birth"]==$arrayPersonal["Date_Of_Birth"] && $array_already_request["Gender"]==$arrayPersonal["Gender"] && $array_already_request["NIC"]==$arrayPersonal["NIC"] && $array_already_request["Marital_Status"]==$arrayPersonal["Marital_Status"] && $array_already_request["Nationality"]==$arrayPersonal["Nationality"] && $array_already_request["Religion"]==$arrayPersonal["Religion"]){
            $already_exist=true;
        }
    }
    if ($keysPersonal!=""){
        if($already_exist==false){
            $sqlPeronal="INSERT INTO editemployee(".substr($keysPersonal,1).",employee_ID".")VALUES(".substr($valuesPersonal,1).",'$e_id'".")";
            if ( $db->query($sqlPeronal )) {
                $change_ID="SET @last_id_in_table1 = LAST_INSERT_ID()";
                $reult_change_ID=$db->query($change_ID);
                $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status, change_ID)
VALUES ('$e_id', 'Peronal details change request from {$emp_name}-{$e_id}.', 'unread', 'change Personal Details', '5', @last_id_in_table1)";
            if(!($db->query($notify_sql))){echo "Connection loss";}
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlPeronal . "<br>" . mysqli_error($conn);
            }
        }else{echo "Request already done"; }
    }
}
if (isset($_POST['Date_Of_Joinning']) or isset($_POST['Designation']) or isset($_POST['Employee_type']) or isset($_POST['Department'])){
    $arrayEmployee=[];
    $keysEmployee="";
    $valuesEmployee="";
    $array_employee = ["Date_Of_Joinning", "Designation", "Employee_type", "Department"];
    for ($i=0;$i<4;$i++){
        if($_POST[$array_employee[$i]]!=$row[$array_employee[$i]]){
            $arrayEmployee+=[$array_employee[$i] =>$_POST[$array_employee[$i]]];
        }else{$arrayEmployee+=[$array_employee[$i]=> ""];}
    }
    foreach ($arrayEmployee as $key => $value) {
        if($value!=""){
            $keysEmployee=$keysEmployee. ",".$key;
            $valuesEmployee=$valuesEmployee.",'".$value."'";
        }
    }
    $sql2="SELECT * FROM editemployee WHERE `employee_ID`= '$e_id'";
    $result2=$db->query($sql2);
    $already_exist=false;
    $array_already_request=[];
    while($array_already_request = $result2->fetch_assoc()){
        if($array_already_request["Date_Of_Joinning"]==$arrayEmployee["Date_Of_Joinning"] && $array_already_request["Designation"]==$arrayEmployee["Designation"] && $array_already_request["Employee_type"]==$arrayEmployee["Employee_type"] && $array_already_request["Department"]==$arrayEmployee["Department"]){
            $already_exist=true;
        }
    }
    if ($keysEmployee!=""){
        if($already_exist==false){
            $sqlEmployee="INSERT INTO editemployee(".substr($keysEmployee,1).",employee_ID".")VALUES(".substr($valuesEmployee,1).",'$e_id'".")";
            if ( $db->query($sqlEmployee )) {
                
                $change_ID="SET @last_id_in_table2 = LAST_INSERT_ID()";
                $reult_change_ID=$db->query($change_ID);
                $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status, change_ID)
VALUES ('$e_id', 'Employee details change request from {$emp_name}-{$e_id}.', 'unread', 'change employee Details', '6', @last_id_in_table2)";
                if(!($db->query($notify_sql))){echo "Connection loss";}
                
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlEmployee . "<br>" . mysqli_error($conn);
            }
        }else{echo "Request already done"; }
    }
}
if (isset($_POST['Address']) or isset($_POST['Country']) or isset($_POST['Phone']) or isset($_POST['Mobile']) or isset($_POST['E_mail'])){
    $arrayContact=[];
    $keysContact="";
    $valuesContact="";
    $array_contact = ["Address", "Country", "Phone", "Mobile", "E_mail"];
    for ($i=0;$i<5;$i++){
        if($_POST[$array_contact[$i]]!=$row[$array_contact[$i]]){
            $arrayContact+=[$array_contact[$i] =>$_POST[$array_contact[$i]]];
        }else{$arrayContact+=[$array_contact[$i]=> ""];}
    }
    foreach ($arrayContact as $key => $value) {
        if($value!=""){
            $keysContact=$keysContact. ",".$key;
            $valuesContact=$valuesContact.",'".$value."'";
        }
    }
    $sql3="SELECT * FROM editemployee WHERE `employee_ID`= '$e_id'";
    $result3=$db->query($sql3);
    $already_exist=false;
    $array_already_request=[];
    while($array_already_request = $result3->fetch_assoc()){
        if($array_already_request["Address"]==$arrayContact["Address"] && $array_already_request["Country"]==$arrayContact["Country"] && $array_already_request["Phone"]==$arrayContact["Phone"] && $array_already_request["Mobile"]==$arrayContact["Mobile"] && $array_already_request["E_mail"]==$arrayContact["E_mail"]){
            $already_exist=true;
        }
    }
    if ($keysContact!=""){
        if($already_exist==false){
            
            $sqlContact="INSERT INTO editemployee(".substr($keysContact,1).",employee_ID".")VALUES(".substr($valuesContact,1).",'$e_id'".")";
            if ( $db->query($sqlContact)) {
                
                $change_ID="SET @last_id_in_table3 = LAST_INSERT_ID()";
                $reult_change_ID=$db->query($change_ID);
                $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status, change_ID)
VALUES ('$e_id', 'Contact details change request from {$emp_name}-{$e_id}.', 'unread', 'change Contact Details', '7', @last_id_in_table3)";
                
                if(!($db->query($notify_sql))){echo "Connection loss";}
                
                
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlContact . "<br>" . mysqli_error($conn);
            }
        }else{echo "Request already done"; }
    }
}
?>