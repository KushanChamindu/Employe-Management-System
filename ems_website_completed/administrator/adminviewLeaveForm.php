<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getTID=1;
    if (sizeof($str_arr)>1){      
        $getTID=$str_arr[1];
    }
    $conn = require_once("dbConfig.php");
    $sql="SELECT * FROM leave_table WHERE leave_num='$getTID'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $getStatus=$row['status'];
    $statusList=array("Not Applied","Pending","Canceled","Approved","Declined");
    $status='<font color="red">' . $statusList[$getStatus] . '</font>';

?>

<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
  

<link rel="stylesheet" type="text/css" href="css/schedule.css">
<!doctype html>
<html>
 
	    <div class="wrapper">
            <div class="table-detail-view">
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
                        <td width="250">: 
                            <?php echo $row['assesd_by']; ?>
                        </td>
                        <td width="50">Status</td>
                        <td id="status" width="200">: <?php echo $status; ?></td>
                    </tr>
                </table>
                
                <div class="btn-view-leave">
                    
                    <?php
                        echo '

                            <button class="button"  type=button  onClick="window.history.back()">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <a class="button-a" style="height:50px;width:100px;"  href="leave_card_admin.php?no='.$row['employee_ID'].'"  >Leave Card</a>&nbsp;&nbsp;&nbsp;&nbsp;'
                    ?>
<!--                          <button class="button"  type=button  onClick="window.location.href = "leave_manage.phhp";">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;-->
                </div>
	        </div>
        </div>

</html>                
 

