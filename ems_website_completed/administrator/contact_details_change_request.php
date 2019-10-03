<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
require ("dbConfig.php");
//$emp_ID=$_GET["no"];
//$emp_ID='IT005145';
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
    <h3> Contact Details Change Request</h3>
    <div  id="Contact" class="tabcontain">
        <h4>Current Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Address</td>
                    <td id="Address"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Country</td>
                    <td id="Country"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Phone</td>
                    <td id="Phone"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Mobile</td>
                    <td id="Mobile"></td>
                </tr>
                <tr>
                    <td class="Lable">5.E-mail</td>
                    <td id="E_mail"></td>
                </tr>
            </table>
        </div>
    <div  id="Personal_change" class="tabcontain-change">
        <h4>Change Data</h4>
            <table>
                <tr>
                    <td class="Lable">1.Address</td>
                    <td id="Address_change"></td>
                </tr>
                <tr>
                    <td class="Lable">2.Country</td>
                    <td id="Country_change"></td>
                </tr>
                <tr>
                    <td class="Lable">3.Phone</td>
                    <td id="Phone_change"></td>
                </tr>
                <tr>
                    <td class="Lable">4.Mobile</td>
                    <td id="Mobile_change"></td>
                </tr>
                <tr>
                    <td class="Lable">5.E-mail</td>
                    <td id="E_mail_change"></td>
                </tr>
            </table>
        </div>
<!--    <p id="return_contact"></p>-->
     <div class="button_container_cancel">
        <button name="decline" id="contact_cancel" class="button"><i class="fa fa fa-times fa-1x icon"></i> Decline Request</button>
    </div>
    <div class="button_container_approve">
        <button name="appoved" id="contact_approve" class="button"><i class="fa fa fa-check fa-1x icon"></i> Approve Request</button>
    </div>
    <div class="button_container_back">
        <button name="back" id="contact_back" class="button" style="display:none" onclick="window.history.go(-1);"><i class="fa fa fa-arrow-left fa-1x icon"></i> Back</button>
    </div>
    
</html>
<script>
        var Data_array = <?php echo $code_array; ?>;
         var array_contact = ["Address", "Country", "Phone", "Mobile", "E_mail"];
            var contact_detail = [Data_array.Address, Data_array.Country, Data_array.Phone, Data_array.Mobile, Data_array.E_mail];
            for (i = 0; i < 5; i++) {
                document.getElementById(array_contact[i]).innerHTML = ":  "+contact_detail[i];
            }
    
        var Data_array_change = <?php echo $code_array_change; ?>;
        var array_contact_change = ["Address_change", "Country_change", "Phone_change", "Mobile_change", "E_mail_change"];
        var contact_detail_change = [Data_array_change.Address, Data_array_change.Country, Data_array_change.Phone, Data_array_change.Mobile, Data_array_change.E_mail];
        for (i = 0; i < 5; i++) {
            if((contact_detail_change[i])!=null){ 
                document.getElementById(array_contact_change[i]).setAttribute("Class","change");
                document.getElementById(array_contact[i]).setAttribute("Class","change");
                document.getElementById(array_contact_change[i]).innerHTML = ":  "+contact_detail_change[i];
            }else{
            document.getElementById(array_contact_change[i]).innerHTML = ":  "+contact_detail[i];
            }    
        }
    $(document).ready(function () {
    $("#contact_approve").click(function() {
//        document.getElementById("return_contact").innerHTML="";
        var Address= $("#Address_change").text().slice(3);
        var Country= $("#Country_change").text().slice(3);
        var Phone= $("#Phone_change").text().slice(3);
        var Mobile= $("#Mobile_change").text().slice(3);
        var E_mail= $("#E_mail_change").text().slice(3);
        var employee_ID='<?php echo $emp_ID?>';
        var change_num=<?php echo $change_num;?>;
//        console.log(Address);
        $.post("change_request_functions.php",{
            employee_ID:employee_ID,
            Address:Address,
            Country:Country,
            Phone:Phone,
            Mobile: Mobile,
            E_mail:E_mail,
            change_num:change_num,
        },function (data,status) {
            alert("Successfully upadte contact details");
            $("#contact_cancel").hide();
            $("#contact_approve").hide();
            $("#contact_back").show();
//           $("#return_contact").html(data);
        });
        });
        $("#contact_cancel").click(function(){
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
