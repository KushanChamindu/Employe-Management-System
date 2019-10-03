<?php
    session_start();
    $emp_ID=$_SESSION["e_id"];
    $emp_name=$_SESSION["username"] ;
    $conn = require_once("administrator/dbConfig.php");
    $sql = "SELECT * FROM leave_table WHERE employee_ID='$emp_ID'";
    $result = mysqli_query($conn, $sql);
    $total_posts = mysqli_num_rows($result);
    $statusList=array("Not Applied","Pending","Canceled","Approved","Declined");
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - Apply/Cancel</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/apply_cancel.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <body>
        
        <?php require_once('codeblocks/notification.php'); ?>


        <div class="wrapper">
            <?php require_once('codeblocks/head.php'); ?>
            <?php require_once ('codeblocks/image_insert.php'); ?>
            <?php require_once('codeblocks/navigation.php'); ?>
            
            <?php require_once('codeblocks/side.php'); ?>

    <!--
            <div class="profile">
                <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />
            </div>
    -->

            <div class="view-content" id="view-content">
            

            </div>

            <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <span onclick="document.getElementById('id01').style.display='none' " class="w3-button w3-display-topright">&times;</span>
                            <p class="msg">You Already Cancle This Form</p>
                        </div>
                    </div>
                </div>

                <div id="id02" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <p class="msg">Already Decline This Form</p>
                        </div>
                    </div>
                </div>
            <a id="theAnchor" href="mailto:hemakaraveenhansika@gmail.com?subject=request leave&body=need leave"></a>
            
        </div>
        
        
</body>

</html>

<script>

    function run(index,status){
        if(status==0 || status==1 || status==3){
            window.location='viewForm.php?no='+index;
        }else if(status==2) {
            document.getElementById('id01').style.display='block';
        }else if(status==4) {
            document.getElementById('id02').style.display='block';
        }
         
    }
   
</script>

<?php
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getLeaveID=1;
    $status=0;
    if (sizeof($str_arr)>1){      
        $getLeaveID=$str_arr[1];
        $status=$str_arr[2];
        $remove=$str_arr[3];

        if($status==0 && $remove==1){ //not apply to cancel
            $sql = "DELETE FROM leave_table WHERE leave_num=$getLeaveID";
        
        }elseif($status==1 && $remove==0){  //apply leave form
            $sql = "UPDATE leave_table SET status='$status' WHERE leave_num='$getLeaveID'";
            $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status, leave_ID ) VALUES ('$emp_ID', 'Leave request from {$emp_name}-{$emp_ID}. ', 'unread', 'Leave Request', 1, '$getLeaveID')";
            if(!($conn->query($notify_sql))){
                echo "Connection loss";
            }
        
        }elseif($status==1 && $remove==1){  //pending to cancel
            $sql = "DELETE FROM leave_table WHERE leave_num=$getLeaveID";
            $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status ) VALUES ('$emp_ID', 'Pended Leave has been cancelled by Employee-{$emp_name}-{$emp_ID}.', 'unread', 'Pended Leave Cancelled', 8)";
            if(!($conn->query($notify_sql))){
                echo "Connection loss";
            }
        
        }elseif($status==2 && $remove==0){  //approced to cancel
            $sql = "UPDATE leave_table SET status='$status' WHERE leave_num='$getLeaveID'";
            $notify_sql="INSERT INTO msg_info (from_ID, message, type, subject, status, leave_ID ) VALUES ('$emp_ID', 'The Approved Leave has been cancelled by Employee-{$emp_name}-{$emp_ID}.', 'unread', 'Approved Leave Cancelled', 2, '$getLeaveID')";
            if(!($conn->query($notify_sql))){
                echo "Connection loss";
            }
        }

        
        if ($conn->query($sql) === TRUE) {
            if($status==0 && $remove==1){
                echo "Leave Remove successfully";
            }elseif($status==1 && $remove==0){
                echo "Leave Apply successfully";
            }elseif($status==1 && $remove==1){
                echo "Leave Cancel successfully";
            }elseif($status==2 && $remove==0){
                echo "Approved Leave Cancelled successfully";
            }
            
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }     

?> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   <?php
    if($status==1 && $remove==0){
    ?>
        document.getElementById('theAnchor').click();

    <?php
    }
    ?>
        $('#view-content').load("leave_record.php");
});

(function() {
    $('.footer-bar').css('position', $(document).height() > $(window).height() ? "inherit" : "fixed");
})();
</script>  

