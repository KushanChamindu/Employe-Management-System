<?php
require "administrator/dbConfig.php";
session_start();
//require "database.php";
$employee_ID=$_SESSION['e_id'];
$sql = "SELECT * FROM leave_table WHERE employee_ID = '$employee_ID'";

if ($result = mysqli_query($db, $sql)) {
    // Fetch one and one row
    $from_date=($_POST["from_date"]);
    $to_date=($_POST["to_date"]);
    $from_date_obj = new DateTime($from_date);
    $to_date_obj = new DateTime($to_date);
    $str_echo="";
    if( ($from_date!=$to_date ) or isset($_POST["leave_type"])){
        while ($row = $result->fetch_assoc()) {
            $array_leave_details=array("leave_num"=>$row['leave_num'],"employee_ID"=>$row['employee_ID'],"no_of_days"=>$row['no_of_days'],"reason"=>$row['reason'],"project"=>$row['project'],"Time"=>$row['Time'],"status"=>$row['status'],"assesd_by"=>$row['assesd_by'],"employee_name"=>$row['employee_name'],"date_of_request"=>$row['date_of_request'],"assesd_date"=>$row['assesd_date'],"leave_type"=>$row['leave_type'],"leave_date_from"=>$row['leave_date_from'],"leave_date_to"=>$row['leave_date_to'],"De     partment"=>$row['Department']);
            
            $db_from_date_obj=new DateTime($array_leave_details["leave_date_from"]);
            $db_to_date_obj=new DateTime($array_leave_details["leave_date_to"]);
            if($array_leave_details["status"]==0){$status="Declined";}else{$status="Approved";}
            
            if(isset($_POST["leave_type"]) && $from_date!=$to_date){
                $leave_type=$_POST["leave_type"];
                if(($from_date_obj<=$db_from_date_obj) && ($to_date_obj>=$db_to_date_obj) && ($leave_type==$array_leave_details["leave_type"])){
                    
                    $str_echo=$str_echo."<tr><td>".$array_leave_details["leave_type"]."</td><td>".$array_leave_details["leave_date_from"]."</td><td>".$array_leave_details["leave_date_to"]."</td><td style='text-align:center'>".(string)$array_leave_details["no_of_days"]."</td><td>".$status."</td><td>".$array_leave_details["assesd_date"]."</td></tr>";
                }
            }else if(!isset($_POST["leave_type"]) && $from_date != $to_date){
                if(($from_date_obj<=$db_from_date_obj) && ($to_date_obj>=$db_to_date_obj)){
                    
                    $str_echo=$str_echo."<tr><td>".$array_leave_details["leave_type"]."</td><td>".$array_leave_details["leave_date_from"]."</td><td>".$array_leave_details["leave_date_to"]."</td><td style='text-align:center'>".(string)$array_leave_details["no_of_days"]."</td><td>".$status."</td><td>".$array_leave_details["assesd_date"]."</td></tr>";
                }
            }else if(isset($_POST["leave_type"]) && $from_date == $to_date){
                $leave_type=$_POST["leave_type"];
                if(($leave_type==$array_leave_details["leave_type"])){
                    
                    $str_echo=$str_echo."<tr><td>".$array_leave_details["leave_type"]."</td><td>".$array_leave_details["leave_date_from"]."</td><td>".$array_leave_details["leave_date_to"]."</td><td style='text-align:center'>".(string)$array_leave_details["no_of_days"]."</td><td>".$status."</td><td>".$array_leave_details["assesd_date"]."</td></tr>";
                }
                
            }
        }
    }else{ }
    // Free result set
    mysqli_free_result($result);
}
mysqli_close($db);
echo "<tr>
            <th style='width: 21%' class='table_head'>Leave Type</th>
            <th style='width: 18%' class='table_head'>From Date</th>
            <th style='width: 15%' class='table_head'>To Date</th>
            <th style='width: 18%;text-align:center' class='table_head'>No of days</th>
            <th style='width: 18%' class='table_head'>Status</th>
            <th style='width: 18%' class='table_head'>Assed Date</th>
        </tr>".$str_echo;
//echo $str_echo;
?>
