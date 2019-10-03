<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
require ("dbConfig.php");
//$emp_ID=$_GET["no"];
$change_num=$_GET["no"]; //not string value

//$sql_change="SELECT MAX(`Num_Change`) FROM editemployee WHERE `employee_ID`='$emp_ID'";
$sql_change="SELECT * FROM editemployee WHERE `Num_Change`= '$change_num'";
$result_change = $db->query($sql_change);
$row_change = $result_change->fetch_assoc();

$code_array_change = json_encode($row_change); 

$emp_ID=$row_change["employee_ID"];
$sql = "SELECT * FROM employee WHERE `employee_ID`='$emp_ID'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

$code_array = json_encode($row);
?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
<style>
     .change{
        color: red;
    }
    .tabcontain{
        float: left;
        width: 50%;
        margin-left: 10%;
        margin-top: 2%;
    }
    .tabcontain-change{
        margin-top: 2%;
        
    }
    .button_container_back{
        margin-left: 30%;
    }
    h4{
        color: #245580; 
    }
    h3{
        margin-left: 30%;
        font-weight: bold;
        color: #245580;
    }
    .button_container_cancel{
        margin-left: 30%;
        float: left;
        margin-right: 1%;
            }
    .button_container_approve:after {
        content: "";
        display: table;
        clear: both;
        
    }
            .button{
  font-size:1.5rem;
  border-color: #245580;
  border-radius:45px;
  width:200px;
font-weight: bold;
color: white;
  background-color: #245580;
  height:42px;    
  transition: .5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
    .icon{
 position: relative;
  top: 2.5%;
  color: white;
  transform: translateX(0%);
  text-align:center;
    font-size: 22px;
}
</style>
<html>
    <h3>Personal Details Change  Request</h3>
    <div  id="Personal" class="tabcontain">
        <h4>Current Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Title</td>
                    <td id="Title"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Full Name</td>
                    <td id="Full_Name"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Date Of Birth</td>
                    <td id="Date_Of_Birth"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Gender</td>
                    <td id="Gender"></td>
                </tr>
                <tr>
                    <td class="Lable">5.NIC</td>
                    <td id="NIC"></td>
                </tr>
                <tr>
                    <td class="Lable">6.Marital status</td>
                    <td id="Marital_Status"></td>
                </tr>
                <tr>
                    <td class="Lable">7.Nationality</td>
                    <td id="Nationality"></td>
                </tr>
                <tr>
                    <td class="Lable">8.Religion</td>
                    <td id="Religion"></td>
                </tr>
            </table>
        </div>
    <div  id="Personal_change" class="tabcontain-cahnge">
        <h4>Change Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Title</td>
                    <td id="Title_change"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Full Name</td>
                    <td id="Full_Name_change"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Date Of Birth</td>
                    <td id="Date_Of_Birth_change"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Gender</td>
                    <td id="Gender_change"></td>
                </tr>
                <tr>
                    <td class="Lable">5.NIC</td>
                    <td id="NIC_change"></td>
                </tr>
                <tr>
                    <td class="Lable">6.Marital status</td>
                    <td id="Marital_Status_change"></td>
                </tr>
                <tr>
                    <td class="Lable">7.Nationality</td>
                    <td id="Nationality_change"></td>
                </tr>
                <tr>
                    <td class="Lable">8.Religion</td>
                    <td id="Religion_change"></td>
                </tr>
            </table>
        </div>
    <br>
    <br>
  <div class="button_container_cancel">
        <button name="decline" id="personal_cancel" class="button"><i class="fa fa fa-times fa-1x icon"></i> Decline Request</button>
    </div>
    <div class="button_container_approve">
        <button name="appoved" id="personal_approve" class="button"><i class="fa fa fa-check fa-1x icon"></i> Approve Request</button>
    </div>
    <div class="button_container_back">
        <button name="back" id="personal_back" class="button" style="display:none" onclick="window.history.go(-1);"><i class="fa fa fa-arrow-left fa-1x icon"></i> Back</button>
    </div>
</html>
<script>
        var Data_array = <?php echo $code_array; ?>;
        var array_personal = ["Title", "Full_Name", "Date_Of_Birth", "Gender", "NIC", "Marital_Status", "Nationality", "Religion"];
        var personal_detail = [Data_array.Title, Data_array.Full_Name, Data_array.Date_Of_Birth, Data_array.Gender, Data_array.NIC, Data_array.Marital_Status, Data_array.Nationality, Data_array.Religion];
        for (i = 0; i < 8; i++) {
            document.getElementById(array_personal[i]).innerHTML = ":  "+personal_detail[i];
        }
    
        var Data_array_change = <?php echo $code_array_change; ?>;
        var array_personal_change = ["Title_change", "Full_Name_change", "Date_Of_Birth_change", "Gender_change", "NIC_change", "Marital_Status_change", "Nationality_change", "Religion_change"];
        var personal_detail_change = [Data_array_change.Title, Data_array_change.Full_Name, Data_array_change.Date_Of_Birth, Data_array_change.Gender, Data_array_change.NIC, Data_array_change.Marital_Status, Data_array_change.Nationality, Data_array_change.Religion];
    
        for (i = 0; i < 8; i++) {
            console.log(personal_detail_change[i]);
            if((personal_detail_change[i]) != null){ 
               
//                   console.log(Data_array_change.Gender);
                
 document.getElementById(array_personal_change[i]).setAttribute("Class","change");
                document.getElementById(array_personal[i]).setAttribute("Class","change");
                 document.getElementById(array_personal_change[i]).innerHTML = ":  "+personal_detail_change[i];
            }else{
            document.getElementById(array_personal_change[i]).innerHTML = ":  "+personal_detail[i];
            }
        }
    $(document).ready(function () {
    $("#personal_approve").click(function() {
//        document.getElementById("return_contact").innerHTML="";
        var Title= $("#Title_change").text().slice(3);
        var Full_Name= $("#Full_Name_change").text().slice(3);
        var Date_Of_Birth= $("#Date_Of_Birth_change").text().slice(3);
        var Gender= $("#Gender_change").text().slice(3);
        var NIC= $("#NIC_change").text().slice(3);
        var Marital_Status= $("#Marital_Status_change").text().slice(3);
        var Nationality= $("#Nationality_change").text().slice(3);
        var Religion= $("#Religion_change").text().slice(3);
        var employee_ID='<?php echo $emp_ID?>';
        var change_num=<?php echo $change_num;?>;
//        console.log(Address);
        $.post("change_request_functions.php",{
            Title:Title,
            Full_Name:Full_Name,
            Date_Of_Birth:Date_Of_Birth,
            Gender:Gender,
            NIC:NIC,
            Marital_Status:Marital_Status,
            Nationality:Nationality,
            Religion:Religion,
            employee_ID:employee_ID,
            change_num:change_num,
        },function (data,status) {
            alert("Successfully upadte contact details");
            $("#personal_cancel").hide();
            $("#personal_approve").hide();
            $("#personal_back").show();
//           $("#return_contact").html(data);
        });
        });
        $("#personal_cancel").click(function(){
            var cancel=true;
            var change_num=<?php echo $change_num;?>;
            $.post("change_request_functions.php",{
                cancel:cancel,
                change_num:change_num,
            },function(data,status){
                if(status=="success"){
                    window.history.back();
                }
            });
        });
         });
</script>
