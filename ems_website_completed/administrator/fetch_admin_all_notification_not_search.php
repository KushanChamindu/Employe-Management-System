<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
$db=require_once('dbConfig.php');
$output = '';
$sql = "SELECT * FROM msg_info WHERE `from_ID` IS NOT NULL ORDER BY `date_time` DESC";

$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
    $output .= '<h4 align ="center" style="font-size:32px; font-weight: bold;">Notifications</h4>'.'<br>';
    $output .= '<br>';
    $output .= '<div class= "table-responsive">
                <table class="table table bordered">
                <tr>
                    <th style="text-align:center;">Subject</th>
                    <th style="text-align:center;">Message</th>
                    <th style="text-align:center;">Date-Time</th>
                    <th style="text-align:center;">status</th>
                </tr>';
    while($row =mysqli_fetch_array($result))
    {
        $btn_echo="";
        $page_id="#";
        if ($row["status"]==1){
                $page_id='adminviewLeaveForm.php?no='.$row["leave_ID"].'';
                $btn_echo.='<a href="'.$page_id.'" ><span class="label label-warning">View</span></a>';
            }elseif ($row["status"]==8){
                $page_id="#";
            }elseif ($row["status"]==2){
                $page_id='adminviewLeaveForm.php?no='.$row["leave_ID"].'';
                $btn_echo.='<a href="'.$page_id.'" ><span class="label label-warning">View</span></a>';
            }elseif ($row["status"]==5){
                $page_id='personal_details_change_request.php?no='.$row["from_ID"].'';
                $btn_echo.='<a href="'.$page_id.'" ><span class="label label-warning">View</span></a>';
            }elseif ($row["status"]==6){
                $page_id='employee_details_change_request.php?no='.$row["from_ID"].'';
            $btn_echo.='<a href="'.$page_id.'" ><span class="label label-warning">View</span></a>';
            }elseif ($row["status"]==7){
                $page_id='contact_details_change_request.php?no='.$row["from_ID"].'';
            $btn_echo.='<a href="'.$page_id.'" ><span class="label label-warning">View</span></a>';
            }
        $output .= '
            <tr class="clickableRaw">
                <td style="width:15%; max-width:150px;">'.$row['subject'].'</td><td style=" width:40%; max-width:150px;"><p style="word-wrap:break-word;" >'.$row['message'].'</p></td><td style=" width:15%; max-width:100px;">'.$row['date_time'].'</td>
                <td style="text-align:center; width:15%; max-width:100px;">
                
                '.$btn_echo.'
                

            </tr>
        ';
    }
    echo $output;
}else
{
    $output='Data Not Found';
    echo $output;
}

?>

