
<?php
$db = require "administrator/dbConfig.php";
$employee_ID='$_SESSION['e_id']';
$sql = "SELECT * FROM msg_info WHERE to_ID = '$employee_ID' ORDER BY date_time DESC";

if ($result = mysqli_query($db, $sql)) {
    $str_echo="";
    while ($row = $result->fetch_assoc()) {
            $btn_echo="";
            if($row["status"]==3){
                $btn_echo.="<a href='viewForm.php?no={$row["leave_ID"]}'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
                
            }elseif($row["status"]==4){
                $btn_echo.="<a href='viewForm.php?no={$row["leave_ID"]}'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
                
            }elseif($row["status"]==10){
                $btn_echo.="<a href='Contact.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
                
            }elseif($row["status"]==12){
                $btn_echo.="<a href='Employee.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
                
            }elseif($row["status"]==14){
                $btn_echo.="<a href='Personal.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
                
            }elseif($row["status"]==15){
                $btn_echo.="<a href='view_doc.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
            }elseif($row["status"]==16){
                $btn_echo.="<a href='Contact.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
            }elseif($row["status"]==17){
                $btn_echo.="<a href='Employee.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
            }elseif($row["status"]==18){
                $btn_echo.="<a href='Personal.php'><button class='btn btn-inverse navbar-btn' style='width:100px;'>view</button></a>";
            }
         $str_echo=$str_echo."<tr style='width 100%; border-bottom: solid 1px #333;'><td style='text-align:left'><p style='word-wrap:break-word;max-width:150px;'>".$row["from_ID"]."</p></td><td style='text-align:left'><p style='word-wrap:break-word;max-width:150px;'>".$row["subject"]."</p></td><td style='text-align:left; max-width:300px;'><p style='word-wrap:break-word;'>".$row["message"]."</p></td><td style='text-align:center'>".$row["date_time"]."</td><td style='text-align:center; max-width: 50px;'>".$btn_echo."</td></tr>";
        
    }
}
?>