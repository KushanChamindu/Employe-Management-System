<?php session_start();?>
<?php
    $e_id_ses=$_SESSION["e_id"];
    $conn = require_once("administrator/dbConfig.php");
    $sql = "SELECT * FROM employee WHERE employee_ID='$e_id_ses'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $leaveType=$_REQUEST['radio1'];
    $dateFrom=$_REQUEST['date-from'];
    $dateTo=$_REQUEST['date-to'];
    $dateNo=$_REQUEST['date-no'];
    $timeFrom=$_REQUEST['time-from'];
    $timeTo=$_REQUEST['time-to'];
    $reason=$_REQUEST['reason'];
    $assign=$_REQUEST['assign'];
    $status='<font color="red">' . 'Pending' . '</font>';

    $getAdminID=$assign;
    $admin_sql = "SELECT * FROM admin WHERE a_id='$getAdminID'";
    $admin_result=mysqli_query($conn, $admin_sql);
    $admin_row = mysqli_fetch_assoc($admin_result);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - View Leave Form</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/schedule.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        
    <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <form name="form1" id="form1" method="post" >
            <div class="table-detail">
                <h3 class="title">Schedule Leave</h3>
                <table>
                    <col width="30">
                    <col width="180">
                    <col width="600">
                    <tr>
                        <td>01.</td>
                        <td>Date of Request</td>
                        <td>: <?php echo date("Y-m-d"); ?></td>
                    </tr>
                    <tr>
                        <td>02.</td>
                        <td>Employee ID</td>
                        <td >: <span id="eid" name="eid"><?php echo $row['employee_ID'] ?></span> </td>
                    </tr>
                    <tr>
                        <td>03.</td>
                        <td>Name</td>
                        <td id="name">: <?php echo $row['Full_Name'] ?></td>
                    </tr>
                    <tr>
                        <td>04.</td>
                        <td>Department</td>
                        <td id="department">: <?php echo $row['Department'] ?></td>
                    </tr>
                    <tr>
                        <td>05.</td>
                        <td >Leave Type</td>
                        <td >: <?php echo $leaveType; ?> </td>
                    </tr>
                </table>
                    
                
                        
                <table>
                    <col width="30">
                    <col width="180">
                    <col width="550">
                    <tr>
                        <td>06.</td>
                        <td>Leave date</td>
                        <td>: From &nbsp; <?php echo $dateFrom; ?> &nbsp;&nbsp; To &nbsp; <?php echo $dateTo; ?>  </td>
                    </tr>
                    <tr>
                        <td>07.</td>
                        <td>No of Date</td>
                        <td>: <?php echo $dateNo; ?></td>
                    </tr>
                    <tr>
                        <td>08.</td>
                        <td>Time</td>
                        <td class="clock">: From &nbsp; <?php echo $timeFrom; ?> &nbsp;&nbsp; To &nbsp; <?php echo $timeTo; ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Only for Short Leaves)
                        </td>

                    </tr>
                    <tr>
                        <td>09.</td>
                        <td>Leave Reason</td>
                        <td>: <?php echo $reason; ?></td>
                    </tr>
                    
                </table>

                <table class="last-raw">
                <tr>
                        <td width="100">Assed by</td>
                        <td width="500">: 
                            <?php echo $admin_row['a_username']; ?>
                        </td>
                        <td width="50">Status</td>
                        <td id="status" width="200">: <?php echo $status; ?></td>
                    </tr>
                </table>
                
                <div class="btn-view">
                    <button class="btn btn-lg btn-primary btn-circle" type=button  onClick="window.history.back()"><i class="fa fa-arrow-left"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-lg btn-primary btn-circle" type=button  onClick="window.location.href='/ems-website/leave.php'"><i class="fa fa-times"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="submitbutton" class="btn btn-lg btn-primary btn-circle" onClick="window.location.href='leave.php'"><i class="fa fa-arrow-right"></i></button>
                </div>

                <input class="opacity" type="hidden" name="radio1" id="inlineRadio1" value="<?php echo $leaveType; ?>">
                <input class="date" type="hidden" type="date" name="date-from" value="<?php echo $dateFrom; ?>">
                <input class="date" id="date-to" type="hidden" name="date-to" value="<?php echo $dateTo; ?>">
                <input type="hidden" id="date-no" name="date-no" value="<?php echo $dateNo; ?>">
                <input type="hidden" id="time-from" name="time-from" class="form-control" value="<?php echo $timeFrom; ?>" >
                <input type="hidden" id="time-to" name="time-to" class="form-control" value="<?php echo $timeTo; ?>">
                <input id="reason" type="hidden" name="reason" value="<?php echo $reason; ?>">
                <input id="assign" type="hidden" name="assign" value="<?php echo $assign; ?>">
              
            </div>
        </form>

        <?php require_once('codeblocks/footer.php'); ?>

	</div>
<body>
</body>
</html>                



<?php
  
    $req_date=date("Y-m-d");
    $eid=$row['employee_ID'];
    $eName=$row['Full_Name'];
    $dept=$row['Department'];
    if (isset($_POST['submitbutton'])){
        //$sql = "INSERT INTO leave_table(leave_type ) VALUES ($leaveType)";
//        $conn = new mysqli('localhost', 'root', '', 'project_ems');
        // Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
        
        $sql = "INSERT INTO leave_table(date_of_request,employee_ID,employee_name,Department,leave_type,leave_date_from,leave_date_to,no_of_days,time_from,time_to,reason,assesd_by) VALUES ('$req_date','$eid','$eName','$dept','$leaveType','$dateFrom','$dateTo','$dateNo','$timeFrom','$timeTo','$reason','$assign')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            echo "<script> location.href='leave.php'; </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
 
?>