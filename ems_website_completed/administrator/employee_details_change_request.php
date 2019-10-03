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
    <h3> Employee Details Change Request</h3>
    <div  id="Employee" class="tabcontain">
        <h4>Current Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Date Of Joinning</td>
                    <td id="Date_Of_Joinning"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Designation</td>
                    <td id="Designation"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Employee Type</td>
                    <td id="Employee_type"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Department</td>
                    <td id="Department"></td>
                </tr>
            </table>
        </div>
    <div  id="Personal_change" class="tabcontain-change">
        <h4>Change Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Date Of Joinning</td>
                    <td id="Date_Of_Joinning_change"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Designation</td>
                    <td id="Designation_change"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Employee Type</td>
                    <td id="Employee_type_change"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Department</td>
                    <td id="Department_change"></td>
                </tr>
            </table>
        </div>
    <div class="button_container_cancel">
        <button name="decline" id="employee_cancel" class="button"><i class="fa fa fa-times fa-1x icon"></i> Decline Request</button>
    </div>
    <div class="button_container_approve">
        <button name="appoved" id="employee_approve" class="button"><i class="fa fa fa-check fa-1x icon"></i> Approve Request</button>
    </div>
    <div class="button_container_back">
        <button name="back" id="employee_back" class="button" style="display:none" onclick="window.history.go(-1);"><i class="fa fa fa-arrow-left fa-1x icon"></i> Back</button>
    </div>
</html>
<script>
        var Data_array = <?php echo $code_array; ?>;
        var array_employee = ["Date_Of_Joinning", "Designation", "Employee_type", "Department"];
        var employee_detail = [Data_array.Date_Of_Joinning, Data_array.Designation, Data_array.Employee_type, Data_array.Department];
        for (i = 0; i < 4; i++) {
            document.getElementById(array_employee[i]).innerHTML = ":  "+employee_detail[i];
        }
    
        var Data_array_change = <?php echo $code_array_change; ?>;
        var array_employee_change = ["Date_Of_Joinning_change", "Designation_change", "Employee_type_change", "Department_change"];
        var employee_detail_change = [Data_array_change.Date_Of_Joinning, Data_array_change.Designation, Data_array_change.Employee_type, Data_array_change.Department];
        for (i = 0; i < 4; i++) {
            if((employee_detail_change[i])!=null){ 
                document.getElementById(array_employee_change[i]).setAttribute("Class","change");
                document.getElementById(array_employee[i]).setAttribute("Class","change");
                document.getElementById(array_employee_change[i]).innerHTML = ":  "+employee_detail_change[i];
            }else{
            document.getElementById(array_employee_change[i]).innerHTML = ":  "+employee_detail[i];
            }
        }
    $(document).ready(function () {
    $("#employee_approve").click(function() {
//        document.getElementById("return_contact").innerHTML="";
        var Date_Of_Joinning= $("#Date_Of_Joinning_change").text().slice(3);
        var Designation= $("#Designation_change").text().slice(3);
        var Employee_type= $("#Employee_type_change").text().slice(3);
        var Department= $("#Department_change").text().slice(3);
        var employee_ID='<?php echo $emp_ID?>';
        var change_num=<?php echo $change_num;?>;
//        console.log(Address);
        $.post("change_request_functions.php",{
            Date_Of_Joinning:Date_Of_Joinning,
            Designation:Designation,
            Employee_type:Employee_type,
            Department:Department,
            employee_ID:employee_ID,
            change_num:change_num,
        },function (data,status) {
            alert("Successfully upadte contact details");
            $("#employee_cancel").hide();
            $("#employee_approve").hide();
            $("#employee_back").show();
//           $("#return_contact").html(data);
        });
        });
        $("#employee_cancel").click(function(){
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
