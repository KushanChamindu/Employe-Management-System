<?php
session_start();
$emp_ID=$_SESSION["e_id"];
    $conn = require_once("administrator/dbConfig.php");
    $sql = "SELECT * FROM employee WHERE Num_Employee='$emp_ID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getTID=1;
    if (sizeof($str_arr)>1){      
        $getTID=$str_arr[1];
    }

    $sql="SELECT * FROM leave_table WHERE leave_num='$getTID'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $getStatus=$row['status'];
    $statusList=array("Not Applied","Pending","Canceled","Approved","Declined");
    $status='<font color="red">' . $statusList[$getStatus] . '</font>';

    $getAdminID=$row['assesd_by'];
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        
       <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>

        <?php require_once('codeblocks/navigation.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/side.php'); ?>

<!--
        <div class="profile">
            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />
        </div>
-->

        <form  method="post">
            <div class="table-detail">
                <h3 class="title">Schedule Leave</h3>
                <table>
                    <col width="30">
                    <col width="180">
                    <col width="600">
                    <tr>
                        <td>01.</td>
                        <td>Date of Request</td>
                        <td>: <?php echo $row['date_of_request'] ?></td>
                    </tr>
                    <tr>
                        <td>02.</td>
                        <td>Employee ID</td>
                        <td >: <span id="eid" name="eid"><?php echo $row['employee_ID']; ?></span> </td>
                    </tr>
                    <tr>
                        <td>03.</td>
                        <td>Name</td>
                        <td id="name">: <?php echo $row['employee_name']; ?></td>
                    </tr>
                    <tr>
                        <td>04.</td>
                        <td>Department</td>
                        <td id="department">: <?php echo $row['Department']; ?></td>
                    </tr>
                    <tr>
                        <td>05.</td>
                        <td >Leave Type</td>
                        <td >: <?php echo $row['leave_type']; ?> </td>
                    </tr>
                </table>
                    
                
                        
                <table>
                    <col width="30">
                    <col width="180">
                    <col width="550">
                    <tr>
                        <td>06.</td>
                        <td>Leave date</td>
                        <td>: From &nbsp; <?php echo $row['leave_date_from']; ?> &nbsp;&nbsp; To &nbsp; <?php echo $row['leave_date_to']; ?>  </td>
                    </tr>
                    <tr>
                        <td>07.</td>
                        <td>No of Date</td>
                        <td>: <?php echo $row['no_of_days']; ?></td>
                    </tr>
                    <tr>
                        <td>08.</td>
                        <td>Time</td>
                        <td class="clock">: From &nbsp; <?php echo $row['time_from']; ?> &nbsp;&nbsp; To &nbsp; <?php echo $row['time_to']; ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Only for Short Leaves)
                        </td>

                    </tr>
                    <tr>
                        <td>09.</td>
                        <td>Leave Reason</td>
                        <td>: <?php echo $row['reason']; ?></td>
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
                    <button class="btn btn-lg btn-primary btn-circle-a" type=button  onClick="window.location.href='/ems-website/apply_cancel.php'">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;

            <?php 
                if($getStatus==0){
                    echo '<a class="btn btn-lg btn-primary btn-circle-a" href="apply_cancel.php?no='.$row['leave_num'].'=0=1"  >Cancle</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-lg btn-primary btn-circle-a" href="apply_cancel.php?no='.$row['leave_num'].'=1=0" > Apply <a>
                        </div>';
                }elseif($getStatus==1 ){
                    echo '<a class="btn btn-lg btn-primary btn-circle-a" href="apply_cancel.php?no='.$row['leave_num'].'=1=1"  >Cancle</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>';
                }elseif($getStatus==3){
                    echo '<a class="btn btn-lg btn-primary btn-circle-a" href="apply_cancel.php?no='.$row['leave_num'].'=2=0"  >Cancle</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>';
                }
                        
            ?>    
            
                

   
              
            </div>
        </form>

        <?php require_once('codeblocks/footer.php'); ?>

	</div>
<body>
</body>
</html>                
 


<?php


   /*if (isset($_POST['email']))  {

        //Email information
        $to = 'hemakaraveenhansika@gmail.com';
        $email = '199801hansika@gmail.com';
        $subject ='test1';
        $message ='it work';

        if(mail($to, $subject, $message)){
            echo 'Your mail has been sent successfully.';
        } else{
            echo 'Unable to send email. Please try again.';
        }
    }*/

?>