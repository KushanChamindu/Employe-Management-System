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
        <div style="margin-left: 40%;" id="Personal_edit" class="edit_tabs"><br><br>
        
            <table>
                <tr>
                    <td class="Label">Title :  </td>
                    <td><input id="Title_edit" type="text" name="Title" value="'.$row['Title'].'"></td>
                    <td><p class="error-para" id="Title_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Full Name: </td>
                    <td><input id="Full_Name_edit" type="text" size="50" name="Full_Name" value="'.$row['Full_Name'].'"></td>
                    <td><p class="error-para" id="Full_Name_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Date Of Birth: </td>
                    <td><input id="Date_Of_Birth_edit" type="date" name="Date_Of_Birth" value="'.$row['Date_Of_Birth'].'"></td>
                </tr>
                <tr>
                    <td class="Label">Gender: </td>
                    <td><select id="Gender_edit" name="Gender" >';
                        $default = $row['Gender'];

                            if($default=="Male"){
                                $output .= '<option value="Male" selected=\"selected\">Male</option>
                                      <option value="Female" >Female</option>';
                            }
                            else{
                                $output .= '<option value="Female" selected=\"selected\">Female</option>
                                      <option value="Male" >Male</option>';
                            }
                        $output .='<option value="Other">Other</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="Label">NIC: </td>
                    <td><input id="NIC_edit" type="text" name="NIC" value="'.$row['NIC'].'"></td>
                    <td><p class="error-para" id="NIC_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Marital status: </td>
                    <td><select id="Marital_Status_edit" name="Marital_Status">';
                    $default = $row['Marital_Status'];

                            if($default=="Married"){
                                $output .= '<option value="Married" selected=\"selected\">Married</option>
                                      <option value="Single" >Single</option>';
                            }
                            else{
                                $output .= '<option value="Single" selected=\"selected\">Single</option>
                                      <option value="Married" >Married</option>';
                            }
                        $output .='<option value="Other">Other</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="Label">Nationality: </td>
                    <td><input id="Nationality_edit" type="text" name="Nationality" value="'.$row['Nationality'].'"></td>
                    <td><p class="error-para" id="Nationality_error"></p></td>
                </tr>
                <tr>
                    <td class="Label">Religion: </td>
                    <td><input id="Religion_edit" type="text" name="Religion" value="'.$row['Religion'].'"></td>
                    <td><p class="error-para" id="Religion_error"></p></td>
                </tr>
                <tr><p class="success" id="return_personal"></p></tr>
            </table>
            <div class="button_container">
                <button id="personal" class="button" onclick="goBack();">
                    <i class="fa fa fa-times fa-1x icon"></i>
                 Cancel</button></div>
                 <div class="button_container_Submit">
                    <button id="personal_edit_button" name="personal_edit_button" class="button">
                    <i class="fa fa fa-check fa-1x icon"></i>
                 Submit</button></div>
        </div>';
        echo $output;


//        <button style="margin-left: 60px;">Cancle</button>
//<input style="margin-left: 20px;" type="submit" id="personal_edit_button" name="personal_edit_button" value="Submit" />

?>   