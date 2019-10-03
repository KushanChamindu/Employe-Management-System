<?php

$db_user='root';
$db_pass='';
$db_name='project_ems';

$db=new PDO('mysql:host=localhost; dbname='.$db_name.';charset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST)){
        $firstname=$_POST['firstname'];
//        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=sha1($_POST['password']);
        $confirmpassword=$_POST['confirmpassword'];
        
        $sql="INSERT INTO admin (a_username, a_email, a_password ) VALUES(?,?,?)";
        $stmtinsert=$db->prepare($sql);
        $result=$stmtinsert->execute([$firstname,$email,$password]);
        echo 'registered';
    }
?>
