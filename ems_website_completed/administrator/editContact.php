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
        <div style="margin-left: 40%;" id="Contact_edit" class="edit_tabs"><br><br><br>

            <table>
                <tr>
                    <td class="Label">Address :  </td>
                    <td><input id="Address_edit" name="Address_edit" type="text" size="45" value="'.$row['Address'].'"></td>
                    <td><p class="error-para" id="Address_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Country: </td>
                    <td><input id="Country_edit" name="Country_edit" type="text" value="'.$row['Country'].'"></td>
                    <td><p class="error-para" id="Country_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Phone: </td>
                    <td><input id="Phone_edit" name="Phone_edit" type="text" value="'.$row['Phone'].'"></td>
                    <td><p class="error-para" id="Phone_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Mobile: </td>
                    <td><input id="Mobile_edit" name="Mobile_edit" type="text" value="'.$row['Mobile'].'"></td>
                    <td><p class="error-para" id="Mobile_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">E-mail: </td>
                    <td><input id="E_mail_edit" name="E_mail_edit" type="email" size="30" value="'.$row['E_mail'].'"></td>
                    <td><p class="error-para" id="E_mail_error"></p></td>
                </tr>

                <tr><p class="success" id="return_contact"></p></tr>
            </table>
            <div class="button_container">
                <button id="personal" class="button" onclick="goBack();">
                    <i class="fa fa fa-times fa-1x icon"></i>
                 Cancel</button></div>
                 <div class="button_container_Submit">
                    <button id="contact_edit_button" name="contact_edit_button" class="button">
                    <i class="fa fa fa-check fa-1x icon"></i>
                 Submit</button></div>
        </div>';
        echo $output;

?>   