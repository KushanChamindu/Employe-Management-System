<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $conn = require_once("dbConfig.php");
    $output = '';
    $getTID=$_POST["getID"];


    $sql = "SELECT * FROM employee WHERE employee_ID='$getTID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $output .='  
        <div style="margin-left:40%;" id="Employee_edit" class="edit_tabs"><br><br><br>
        <table>
            <tr>
                <td class="Label">Date Of Joinning :  </td>
                <td><input id="Date_Of_Joinning_edit" name="Date_Of_Joinning_edit" type="date" value="'.$row['Date_Of_Joinning'].'"></td>
            </tr>
            <tr>
                <td class="Label">Designation: </td>
                <td><input id="Designation_edit" name="Designation_edit" type="text" value="'.$row['Designation'].'"></td>
                <td><p class="error-para" id="Designation_error"></p></td>
            </tr>
            <tr>
                <td class="Label">Employee type: </td>
                <td><select id="Employee_type_edit" name="Employee_type_edit" >';
                $default = $row['Employee_type'];
                if($default=="Part Time"){
                    $output .= '<option value="Part Time" selected=\"selected\">Part Time</option>
                                <option value="Full Time" >Full Time</option>';
                }
                else{
                    $output .= '<option value="Full Time" selected=\"selected\">Full Time</option>
                                <option value="Part Time" >Part Time</option>';
                }
        $output .='</select></td>
            </tr>
            <tr>
                <td class="Label">Department: </td>
                <td><input id="Department_edit" name="Department_edit" type="text" value="'.$row['Department'].'"></td>
                <td><p class="error-para" id="Department_error"></p></td>
            </tr>

            <tr><p class="success" id="return_employee"></p></tr>
        </table>
            <div class="button_container">
                <button id="personal" class="button" onclick="goBack();">
                    <i class="fa fa fa-times fa-1x icon"></i>
                 Cancel</button></div>
                 <div class="button_container_Submit">
                    <button id="employee_edit_button" name="employee_edit_button" class="button">
                    <i class="fa fa fa-check fa-1x icon"></i>
                 Submit</button></div>
        </div>';
        echo $output;

?>   