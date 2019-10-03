<?php session_start();?>
<?php
require "all_notification_function.php";
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - View Notification </title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/pec.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <style>
        .Lable{
                font-size:17px;
                color: black; 
                font-weight: bold; 
                font-family:Times-New_Roamen;
                border: 1px solid black;
                width: 11.6%;
                text-align: center;
            }
            .row{
                font-size: 14px;
                color: black;
                height: 10%;
                font-family: Times-New-Roamen;
                border: 1px solid black;
                text-align: center;
            }
            .warning{
                text-align: center;
                font-size: 14px;
                font-weight: bold;
                width: 11.6%;
                border: 2px solid red;
                color: red; 
            }
        .btn-circle, .btn-circle-3d{
            border-radius: 50% !important;
        }

        .btn-primary.btn-circle{
            -webkit-box-shadow: 0px 0px 3px 1px #245580;
            -moz-box-shadow:    0px 0px 3px 1px #245580;
            box-shadow:         0px 0px 3px 1px #245580;
        }

        .btn-1{
            margin-left: 26%;
            margin-top: 20px;
        }
            
        </style>
    <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div  id="Contact" class="tabcontain">
            <div style="color: dodgerblue;font-size: 30px; margin-left:30%" ><p>Notifications</p></div>
            <table id="leave_utilized_table">
            
            <table id="leave_table">
                <tr style="white-space: no-wrap;">
            <th style="width: 10%;text-align:left" class="table_head">From</th>
            <th style="width: 20%;text-align:center" class="table_head">Subject</th>
            <th style="width: 40%;text-align:center" class="table_head">Message</th>
            <th style="width: 10%;text-align:center" class="table_head">Date - Time</th>
            <th style="width: 10%;text-align:center" class="table_head">Status</th>
            
                </tr>
                <?php echo $str_echo;?>
            </table>
                
            <p class="xs-font-size13" style="margin-left: 30%;margin-top:10px;">Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved.</p>
        </div>
    </div>

</html>

<script>
    
</script>