<?php session_start();?>
<?php
$conn = require_once("administrator/dbConfig.php");
$e_id_ses=$_SESSION["e_id"];
//$sql = "SELECT * FROM employee WHERE Num_Employee=1";
$sql = "SELECT * FROM employee WHERE employee_ID='$e_id_ses'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$admin_sql="SELECT * FROM admin";
$admin_result=mysqli_query($conn,$admin_sql);

$status='<font color="red">' . 'Pending' . '</font>';
?>
<style>
    .error_para{
        font-size:"10px";
        color:red;
    }
    .error{
        border: 1px red solid;
    }
</style>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - Schedule</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/schedule.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-clockpicker.min.css">
        <link rel="stylesheet" type="text/css" href="css/github.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-clockpicker.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/notification_script.js"></script>
    </head>
    <?php require_once('codeblocks/notification.php'); ?>
    
<body>
	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>

        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
<!--
        <div class="profile">
            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />
        </div>
-->

        <form action="view_leaveForm.php" method="post">
            <div class="table-detail">

                <h3 class="title">Schedule Leave</h3>

                <table>
                    <col width="30">
                    <col width="180">
                    <col width="600">
                    <tr>
                        <td>01.</td>
                        <td>Date of Request</td>
                        <td>: <?php echo date("Y-m-d"); ?></td>
                    </tr>
                    <tr>
                        <td>02.</td>
                        <td>Employee ID</td>
                        <td >: <span id="eid" name="eid"><?php echo $row['employee_ID'] ?></span> </td>
                    </tr>
                    <tr>
                        <td>03.</td>
                        <td>Name</td>
                        <td id="name">: <?php echo $row['Full_Name'] ?></td>
                    </tr>
                    <tr>
                        <td>04.</td>
                        <td>Department</td>
                        <td id="department">: <?php echo $row['Department'] ?></td>
                    </tr>
                    <tr>
                        <td>05.</td>
                        <td >Leave Type</td>
                    </tr>
                </table>
                <div class="select"> 
                    <div  id="select-radio">

                        <table>
                            <tr>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio1" name="radio1" value="Casual" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio1" id="Rlabel">Casual</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio2" name="radio1" value="Annual" onClick="validateRadio();"name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio2" id="Rlabel">Annual</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio3" name="radio1" value="Study" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio3" id="Rlabel">Study</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio4" name="radio1" value="Special" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio4" id="Rlabel">Special</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio5" name="radio1" value="Health" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio5" id="Rlabel">Health</label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio6" name="radio1" value="Duty" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio6" id="Rlabel">Duty</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio7" name="radio1" value="Short" onClick="validateRadio();"name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio7" id="Rlabel">Short</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio8" name="radio1" value="Leave" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio8" id="Rlabel">Leave</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio9" name="radio1" value="Authorized" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio9" id="Rlabel">Authorized</label>
                                </td>
                                <td>
                                    <input class="opacity" type="radio" id="inlineRadio10" name="radio1" value=" Nopay" onClick="validateRadio();" name="radio_input" required>
                                    <label class="form-check-label" for="inlineRadio10" id="Rlabel">Nopay</label>
                                </td>
                            </tr>
                        </table>                   
                        
                    </div>
                    <div>
                        <p style="font-size:12px;" id="error_leave_type">Should select leave type</p>    
                    </div>
                </div>
                <br><br>
                        
                <table class="table-below">
                    <col width="30">
                    <col width="180">
                    <col width="550">
                    <tr>
                        <td style="width: 25%; hight=25px; font-size: 16px">06.Leave date :</td>
                        <td style="width: 25%; hight=25px; font-size: 16px">From  <input class="date" id="date-from" type="date" name="date-from" ></td>
                        <td style="width: 20%; hight=25px; font-size: 16px"> To <input class="date" id="date-to" type="date" name="date-to" > </td>
                        <td><p id="error_message_date" style="color:red; font-size:12px"></p></td>
                    </tr>
                    <tr>
                        <td>07.No of Date</td>
                        <td>: <input type="text" id="date-no" name="date-no" onchange="myFunction();" readonly></td>
                        <td id="error_message_date_num" style="color:red; font-size:12px"></td>
                    </tr>
                    <tr>
                        <td>08.Time</td>
                        <td class="clock">: From &nbsp;   <div class="input-group clockpicker"  data-autoclose="true">
                                    <input type="text" id="time-from" name="time-from" class="form-control" value="12.00" readonly>                            
                                </div>             
                                &nbsp; To &nbsp; 
                        </td>
                        <td>
                                <div class="input-group clockpicker"  data-autoclose="true">
                                    <input type="text" id="time-to" name="time-to" class="form-control" value="12.00" readonly>
                                </div>
                                &nbsp;&nbsp;&nbsp;(Only for Short Leaves)
                        </td>
                        <td id="error_message_time" style="color:red; font-size:12px"></td>

                    </tr>
                    <tr>
                        <td>09.Leave Reason</td>
                        <td>: <input id="reason" type="text" name="reason"></td>
                        <td id="error_message_reason" style="color:red; font-size:12px"></td>
                    </tr>
                    
                </table>

                <table class="last-raw">
                <tr>
                        <td width="100">Assed by</td>
                        <td width="160">:&nbsp;
                            <select name="assign" id="assign" required>
                                <option value="">None</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($admin_result)){
                                ?>
                                    <option value="<?php echo $row['a_id'] ;?>"><?php echo $row['a_username'] ;?></option>
                                <?php
                                    }
                                ?>    
                            </select>
                        
                        </td>
                        <td id="error_message_assign" style="width:400px; color:red; font-size:12px"></td>
                        <td id="status" width="200">Status: <?php echo $status; ?> </td>
                    </tr>
                </table>

                <div class="btn">
                    <button class="btn btn-lg btn-primary btn-circle" type=button  onClick="window.history.back()"><i class="fa fa-times"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="submit" class="btn btn-lg btn-primary btn-circle"><i class="fa fa-arrow-right"></i></button>
                </div>
                           
                
            </div>
            
        </form>

        

	</div>
        <div style="margin-left:45%">
            <p class="xs-font-size13">Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved.</p>
        </div>
    </body>
</html>                
 

<script type="text/javascript">
    $(document).ready(function(){
        //validations/////////////////////////////////////////////////////////////////////////////
        $("#error_leave_type").hide();
        $("#error_message_date").hide();
        $("#error_message_date_num").hide();
        $("#error_message_time").hide();
        $("#error_message_reason").hide();
            var error_leave_type=false;
            var error_date=false;
            var error_date_num=false;
            var error_time=false;
            var error_reason=false;
            var error_assign=false;
       $("#select-radio").focusout(function(){
               check_leave_type();
       });
        $("#date-to").focusout(function () {
                check_date(); 
            });
        $("#date-from").focusout(function () {
                check_date(); 
        });
        $("#date-no").focusout(function () {
                check_date_no();
        });
        $("#time-from").focusout(function () {
                check_time();
        });
        $("#time-to").focusout(function () {
                check_time();
        });
        $("#reason").focusout(function () {
                check_reason();
        });
        $("#reason").focusout(function () {
                check_reason();
        });
        $("#assign").focusout(function () {
                check_assign();
        });
        function check_assign(){
            console.log($("#assign").val());
            if($("#assign").val()==""){
                    $("#error_message_assign").html("Input assed person");
                     $("#error_message_assign").show();
                    $("#error_message_assign").addClass("error_para");
                    error_assign=true;
                    $("#assign").addClass("error");
                }else{
                $("#error_message_assign").html("");
//                $("#error_message_assign").hide();
                error_assign=false;
                $("#assign").removeClass("error");
                }
        }
        function check_date_no(){
            var pattern=/^[0-9]+(\.[5]{1})?$/;
            var num_of_days=$("#date-no").val();
            if(pattern.test(num_of_days)){
                $("#error_message_date_num").hide();
                error_date_num=false;
                $("#date-no").removeClass("error");
            }else{
                $("#error_message_date_num").html("Enter valide Number of days above");
                $("#error_message_date_num").show();
                $("#error_message_date_num").addClass("error_para");
                error_date_num=false;
                $("#date-no").addClass("error");
            }
        }
        function check_date(){
            var from_date= $("#date-from").val();
            var to_date=$("#date-to").val();
            from_date = from_date.split("-");
            to_date = to_date.split("-");
            var num_of_days=((new Date(to_date[0], to_date[1] - 1, to_date[2])-new Date(from_date[0], from_date[1] - 1, from_date[2]))/(1000 * 3600 * 24));
            from_date = new Date(from_date[0], from_date[1] - 1, from_date[2]).getTime();
            to_date = new Date(to_date[0], to_date[1] - 1, to_date[2]).getTime();
//            console.log(to_date - from_date);
            if((to_date - from_date)<0){
                $("#error_message_date").show();
                $("#error_message_date").html("To date should above to the from date");
                $("#date-to").addClass("error");
                document.getElementById("date-no").value=num_of_days;
                document.getElementById("time-from").readonly = true;
                document.getElementById("time-to").readonly = true;
                check_date_no();
                error_date_num=false;
            }else if((to_date - from_date)>=0){
                if(num_of_days==0){
                    document.getElementById("date-no").value=0.5;
                    document.getElementById("time-from").readonly = false;
                    document.getElementById("time-to").readonly = false;
                }else if(num_of_days>0){
                    document.getElementById("date-no").value=num_of_days;
                    document.getElementById("time-from").readonly = true;
                    document.getElementById("time-to").readonly = true;
                }
                $("#error_message_date").hide();
                $("#date-to").removeClass("error");
                check_date_no();
                error_date_num=true;
            }else{
                $("#error_message_date").show();
                $("#error_message_date").html("To date should above to the from date");
                $("#date-to").addClass("error");
                document.getElementById("time-from").readonly = true;
                document.getElementById("time-to").readonly = true;
//                document.getElementById("date-no").value=num_of_days;
                check_date_no();
                error_date_num=false;
            }
        }
        function check_time(){
            var from_time= $("#time-from").val();
            var to_time=$("#time-to").val();
            from_time = from_time.split(":");
            to_time = to_time.split(":");
            from_time=(from_time[0]*1*60)+(from_time[1]*1);
            to_time= (to_time[0]*1*60)+(to_time[1]*1);
            console.log(to_time - from_time);
            if((to_time - from_time)<0){
                $("#error_message_time").show();
                $("#error_message_time").html("To time should above to the from time");
                $("#time-to").addClass("error");
                error_time=false;
            }else{
                $("#error_message_time").hide();
                $("#time_to").removeClass("error");
                error_time=true;
            }
        }
        function check_reason(){
            var pattern=/^[a-zA-Z0-9]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var reason= $("#reason").val();
            if (pattern.test(reason)){
                $("#error_message_reason").hide();
                Address_error=false;
                $("#reason").removeClass("error");
                error_reason=false;
            }
            else{
                $("#error_message_reason").html("Enter characters only");
                $("#error_message_reason").show();
                $("#error_message_reason").addClass("error_para");
                Address_error=true;
                $("#reason").addClass("error");
                error_reason=true;
            }
            
        }
        function check_leave_type(){
            if (document.getElementById("inlineRadio1").checked == false && document.getElementById("inlineRadio2").checked == false && document.getElementById("inlineRadio3").checked == false && document.getElementById("inlineRadio4").checked == false && document.getElementById("inlineRadio5").checked == false && document.getElementById("inlineRadio6").checked == false && document.getElementById("inlineRadio7").checked == false && document.getElementById("inlineRadio8").checked == false && document.getElementById("inlineRadio9").checked == false && document.getElementById("inlineRadio10").checked == false) {          
            var element = document.getElementById("select-radio");
            element.setAttribute("class", "current-R");
            document.getElementById("error_leave_type").setAttribute("class", "error_para");
            document.getElementById("error_leave_type").style.display = "block";
                error_leave_type=true;
        }else{
            error_leave_type=false;
            document.getElementById("error_leave_type").style.display="none";
            var element = document.getElementById("select-radio");
            element.classList.remove("current-R");
        }
        }
        
////////////////////////////////////////////////////////////////////////////////////////////////
        $("#submit").click(function(){
        check_date_no();
        check_date();
        check_assign();
        check_time();
        check_reason();
        check_leave_type();
        if(error_leave_type==false && error_date==false && error_date_num==false && error_time==false && error_reason==false && error_assign==false){
                console.log("Kushan");
                window.location.href = "/view_leaveForm.php";  
           }
        });
    });
    $('.clockpicker').clockpicker().find('input').change(function(){
//            console.log(this.value);
        });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
                .clockpicker('toggleView', 'minutes');
    });

</script>

<script type="text/javascript">
    function validateRadio(){
        var element = document.getElementById("select-radio");
        element.classList.remove("current-R");
    }

</script>

