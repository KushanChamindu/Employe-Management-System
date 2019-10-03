<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
$db=require_once('dbConfig.php');
$output = '';
$sql = "SELECT * FROM employee";

$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
    $output .= '<h4 align ="center" style="font-size:32px; font-weight: bold;">Employee Details</h4>';
    $output .= '<br><br>';
    $output .= '<div class= "table-responsive">
                <table class="table table bordered">
                <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>Employee Type</th>
                    <th>Department</th>
                    <th>Email</th>
                </tr>';
    while($row =mysqli_fetch_array($result))
    {
        $output .= '
            <tr class="clickableRaw">
                <td>'.$row['employee_ID'].'</td><td>'.$row['Full_Name'].'</td><td>'.$row['Designation'].'</td><td>'.$row['Employee_type'].'</td><td>'.$row['Department'].'</td><td>'.$row['E_mail'].'</td>
                <td>
                <a href="editProfileForm.php?no='.$row['employee_ID'].'"><span class="label label-warning">Edit</span></a>
                &nbsp;
                <a href="viewProfileForm.php?no='.$row['employee_ID'].'"><span class="label label-info">Profile</span></a>
                &nbsp;
                <a href="employee_manage.php?no='.$row['employee_ID'].'=2=0" onclick="return confirm(/      Are You Sure ?      /)"><span class="label label-danger">Delete</span></a></td>
            
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