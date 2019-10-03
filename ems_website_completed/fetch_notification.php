<?php
session_start();
include('administrator/dbConfig.php');
$employee_ID=$_SESSION["e_id"];
if(isset($_POST['view'])){
	
	if($_POST["view"] != ''){
        $m_id=$_POST["view"];
		$update_query = "UPDATE `msg_info` SET `type`='read' WHERE `id`='$m_id'";
		mysqli_query($db, $update_query);
	}
	
	$query = "SELECT * FROM `msg_info` WHERE `to_ID`='$employee_ID' ORDER BY `date_time` DESC";
	$result = mysqli_query($db, $query);
	$count_query = "SELECT * FROM `msg_info` WHERE `type`='unread' AND `to_ID`='$employee_ID'";
	$count_result = mysqli_query($db, $count_query);
	$count = mysqli_num_rows($count_result);
	$output = '<a style="float:right; font-weight:100;text-transform: capitalize; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; font-size:8px; " href="all_notification.php"></span>see all notification <span class="glyphicon glyphicon-comment"></a>';
    
    
    
    
    
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
            $msg_id=$row["id"];
            $page_id="#";
            if ($row["status"]==3){
                $page_id="viewForm.php?no={$row["leave_ID"]}";
            }elseif($row["status"]==4){
                $page_id="viewForm.php?no={$row["leave_ID"]}";
            }elseif($row["status"]==10){
                $page_id="Contact.php";
            }elseif($row["status"]==11){
                $page_id="#";//declined change_reqquest
            }elseif($row["status"]==12){
                $page_id="Employee.php";
            }elseif($row["status"]==14){
                $page_id="Personal.php";
            }elseif($row["status"]==15){
                $page_id="view_doc.php";
            }elseif($row["status"]==16){
                $page_id="Contact.php";
            }elseif($row["status"]==17){
                $page_id="Employee.php";
            }elseif($row["status"]==18){
                $page_id="Personal.php";
            }
            
            
			if($row["type"]=='unread'){
				$output .= '
				<li id='.$msg_id.' class="notify-li">
					<a href="';
                 $output .= $page_id;
				$output .= ' "style="font-size:15px;word-wrap:break-word;background-color: rgb(51, 51, 51,0.2); border-radius:5px; white-space: normal;">
                <p class="notification-header" style=" text-transform: capitalize;"><b>'.$row["subject"].'</b></p>
						<p class="notification-body" style=" font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; ">'.$row["message"].'</p>
					</a>
				</li>
				';
			}
			else{
				$output .= '
				<li id='.$msg_id.' class="notify-li" >
					<a href="';
                    $output .= $page_id;
                    $output .= ' "style="font-size:15px;word-wrap:break-word; border-radius:5px; white-space: normal;">
                <p class="notification-header" style="text-transform: capitalize;"><b>'.$row["subject"].'</b></p>
						<p class="notification-body" style=" font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px; ">'.$row["message"].'</p>
					</a>
				</li>
				';
				
			}
		}
	}
	else{
		$output .= '
		<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
	}
	
	$data = array(
		'notification' => $output,
		'unseen_notification'  => $count
	);
	
	echo json_encode($data);
}
?>