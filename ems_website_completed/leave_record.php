<?php
session_start();
$emp_ID=$_SESSION["e_id"];
$conn = require_once("administrator/dbConfig.php");
$sql = "SELECT * FROM leave_table WHERE employee_ID='$emp_ID'";
$result = mysqli_query($conn, $sql);
$total_posts = mysqli_num_rows($result);
$output = '';
$statusList=array("Not Applied","Pending","Canceled","Approved","Declined");

if(mysqli_num_rows($result) > 0){
    $output .= '<h3 class="title">Apply/Cancel Leave</h3>';
    $output .= '<div class="tabel-content">
                    <table>
                        <tr>
                            <th>Leave Type</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>No of Days</th>
                            <th>Status</th>
                            <th>Assign Date</th>
                        </tr>';
    while($row =mysqli_fetch_array($result))
    {
        $output .= '
        <tr class="clickable text-center"  onclick="run( '.$row['leave_num'].' ,' .$row['status'].');" >                   
            <td> '.$row['leave_type'] .'</td>
            <td> '.$row['leave_date_from'].'</td> 
            <td> '.$row['leave_date_to'] .'</td> 
            <td> '.$row['no_of_days'] .'</td> 
            <td> '. $statusList[$row['status']] .' </td> 
            <td> '.$row['assesd_date'] .' </td>
                                            
        </tr>
        ';
    }

    $output.='
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

            </table>


            </div>';
    $output.='<div class="footer"  >
    Copyright &copy;'. date('Y').'.All Rights Reserved.                
</div>';
    echo $output;
}else
{
    $output='Data Not Found';
    echo $output;
}

