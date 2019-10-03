<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
$db=require_once('dbConfig.php');
$output = '';
$sql = "SELECT * FROM leave_table WHERE status=3 ORDER BY date_of_request DESC";
$statusList=array("Not Applied","Pending","Canceled","Approved","Declined");

$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
    $output .= '<h4 align ="center" style="font-size:32px; font-weight: bold;">Approved Leave</h4>';
    $output .= '<br><br>';
    $output .= '<div class= "table-responsive">
                <table class="table table bordered">
                <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date Type</th>
                    <th>No of Days</th>
                    <th>Status</th>
                </tr>';
    while($row =mysqli_fetch_array($result))
    {
        $output .= '
            <tr class="clickableRaw">
                <td>'.$row['employee_name'].'</td><td>'.$row['leave_type'].'</td><td>'.$row['leave_date_from'].'</td><td>'.$row['leave_date_to'].'</td><td>'.$row['no_of_days'].'</td><td>'.$statusList[$row['status']].'</td>
                <td>
                <a href="adminviewLeaveForm.php?no='.$row['leave_num'].'"><span class="label label-warning">View</span></a>
                &nbsp;
                <a href="leave_manage.php?no='.$row['leave_num'].'=4=0" onclick="return confirm(/      Are You Sure ?      /)"><span class="label label-danger">Decline</span></a></td>
            
            </tr>
        ';
    }
    echo $output;
}else
{
    $output='<br><br><br>';
    $output.='Data Not Found';
    echo $output;
}

?>

<script>
    function declineRun(){
        alert(<?php decline(); ?>);       
    }
</script>

<?php

    
    
    function decline(){ 
        
        echo $getTID;  
        //$sql = "UPDATE leave_table SET lastname='Doe' WHERE id=2";    
    }

?>