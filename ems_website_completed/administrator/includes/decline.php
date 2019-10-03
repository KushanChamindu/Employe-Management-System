<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $conn = require_once("../dbConfig.php");
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getLeaveID=1;
    if (sizeof($str_arr)>1){      
        $getLeaveID=$str_arr[1];
    }


    $sql = "UPDATE leave_table SET status=2 WHERE leave_num=$getLeaveID";
    
    if ($conn->query($sql) === TRUE) {
        //echo "Decline Leave successfully";
    } else {
        //echo "Error updating record: " . $conn->error;
    }
       

?>   