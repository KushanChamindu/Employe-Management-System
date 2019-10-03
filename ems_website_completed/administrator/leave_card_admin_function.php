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
require "dbConfig.php";
$employee_ID=$getTID;
$sql = "SELECT * FROM leave_table WHERE employee_ID = '$employee_ID'";
$CL=10;
$SPL=10;
$SHTL=10;
$AL=10;
$HL=10;
$LL=10;
$SL=10;
$DL=10;
$ANP=10;
if ($result = mysqli_query($db, $sql)) {
    $str_echo="";
    while ($row = $result->fetch_assoc()) {
        if($row['status']==3){
        $array_leave_details=array("leave_num"=>$row['leave_num'],"employee_ID"=>$row['employee_ID'],"no_of_days"=>$row['no_of_days'],"reason"=>$row['reason'],"project"=>$row['project'],"Time"=>$row['Time'],"status"=>$row['status'],"assesd_by"=>$row['assesd_by'],"employee_name"=>$row['employee_name'],"date_of_request"=>$row['date_of_request'],"assesd_date"=>$row['assesd_date'],"leave_type"=>$row['leave_type'],"leave_date_from"=>$row['leave_date_from'],"leave_date_to"=>$row['leave_date_to'],"Department"=>$row['Department']);
        if($array_leave_details["status"]==0){$status="Declined";}else{$status="Approved";}
        if($array_leave_details["leave_type"]=="Casual leave"){ $CL=$CL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Annual leave"){$AL=$AL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Study leave"){$SL=$SL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Special leave"){$SPL=$SPL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Health leave"){$HL=$HL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Duty leave"){$DL=$DL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Short leave"){$SL=$SL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Lieu leave"){$LL=$LL-$array_leave_details["no_of_days"];}
        if($array_leave_details["leave_type"]=="Authorized leave"){$ANP=$ANP-$array_leave_details["no_of_days"];}
         $str_echo=$str_echo."<tr><td style='text-align:left'>".$array_leave_details["leave_type"]."</td><td style='text-align:center'>".(string)$array_leave_details["no_of_days"]."</td><td style='text-align:center'>".$array_leave_details["leave_date_from"]."</td><td style='text-align:center'>".$array_leave_details["leave_date_to"]."</td><td style='text-align:center'>".$array_leave_details["date_of_request"]."</td><td style='text-align:center'>".$array_leave_details["assesd_date"]."</td></tr>";
        }
    }
}
?>