<?php session_start();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>EMS - view history</title>
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/pec.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <style>
        .date {
            background-color: transparent;
            border: 0px solid;
            height: 25px;
            width: 200px;
            color: #080808;
            font-size: 15px;
        }
        .error{
            border-bottom: 1px solid;
            border-bottom-color: red;
            
        }
        .bolt-table{
            margin-left: 30%;
            font-weight: bold;
        }
        .leave_type{
            width: 20px;
        }
        .btn-circle, .btn-circle-3d{
            border-radius: 50% !important;
        }

        .btn-primary.btn-circle{
            -webkit-box-shadow: 0px 0px 3px 1px #245580;
            -moz-box-shadow:    0px 0px 3px 1px #245580;
            box-shadow:         0px 0px 3px 1px #245580;
        }

        .btn-1{
            margin-left: 26%;
            margin-top: 20px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php require_once('codeblocks/notification.php'); ?>
<div class="wrapper">
    <?php require_once('codeblocks/head.php'); ?>
    <?php require_once ('codeblocks/image_insert.php'); ?>
    <?php require_once('codeblocks/navigation.php'); ?>

    <?php require_once('codeblocks/side.php'); ?>

<!--    <div class="profile">-->
<!--        <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--    </div>-->

    <div style=" margin-left : 30%; color: dodgerblue;font-size: 30px" ><p>History</p></div>
    <table class="bolt-table">
        <tr>
            <td style=" width: 100px; hight=25px; font-size: 16px"><b>Date :</b></td>
            <td >From :<input type="date" id="From_date" class="date"></td>
            <td>To :<input  type="date"  id="To_date" class="date"></td>
            <td><p id="error_message" style="color:red; font-size:12px"></p></td>
        </tr>
    </table>
    <table class="bolt-table">
        <tr>
            <td style="font-size: 16px; width: 20%; hight=25px;">Select leave type:</td>
        </tr>
        <tr>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Casual_leave" value="Casual leave"><label for="Casual_leave">Casual leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Annual_leave" value="Annual leave"><label for="Annual_leave">Annual leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Study_leave" value="Study leave"><label for="Study_leave">Study leave</label>
            </td>
            <td style="width:25%">
                <input type="radio" class="leave_type" name="leave_type" id="Special_leave" value="Special leave"><label for="Special_leave">Special leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Health_leave" value="Health leave"><label for="Health_leave">Health leave</label>
            </td>
            
        </tr>
        <tr>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Duty_leave" value="Duty leave"><label for="Duty_leave">Duty leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Short_leave" value="Short leave"><label for="Short_leave">Short leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Lieu_leave" value="Lieu leave"><label for="Lieu_leave">Lieu leave</label>
            </td>
            <td style="width:25%">
                <input type="radio" class="leave_type" name="leave_type" id="Authorized_leave" value="Authorized leave"><label for="Authorized_leave">Authorized leave</label>
            </td>
            <td style="width:20%">
                <input type="radio" class="leave_type" name="leave_type" id="Nopay_leave" value="Nopay leave"><label for="Nopay_leave">No-pay leave</label>
        </tr>
    </table>
    <table style="margin-left : 25%;">
        <col width="50">
        <col width=150>
        <tr>
            <td><button style="margin-left:350px" class="btn-1 btn-lg btn-primary btn-circle" id="filter"><i class="fa fa-arrow-right"></i></button></td>
            <td><button class="btn-1 btn-lg btn-primary btn-circle" onclick="reset()"><i class="fa fa-times" id="reset" ></i></button></td>
        </tr>
    </table>
    <br>
    <div id="history_table_div" style="height:auto">
    <table id="history_table" style="margin-left : 30%;height:100px">
        <tr>
            <th style="width: 21%" class="table_head">Leave Type</th>
            <th style="width: 18%" class="table_head">From Date</th>
            <th style="width: 15%" class="table_head">To Date</th>
            <th style="width: 18%;text-align:center" class="table_head">No of days</th>
            <th style="width: 18%" class="table_head">Status</th>
            <th style="width: 18%" class="table_head">Assed Date</th>
        </tr>
    </table>
        <div style="margin-left:35%;margin-bottom:1%;">
        <a href="leave.php">
        <button class="btn-1 btn-lg btn-primary btn-circle"><i class="fa fa-arrow-left" id="reset" onclick="window.location.href='/leave.php'"></i></button>
    </a>
    </div> 
         <p class="xs-font-size13" style="margin-left: 46%;">Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved.</p>
      
    </div>
</div>

</html>
<script>
    reset();
    function reset(){
        var date= new Date();
        var datestr=date.toISOString().slice(0,10);
        document.getElementById("From_date").value=datestr;
        document.getElementById("To_date").value=datestr;
        var radio_input=document.getElementsByClassName("leave_type");
        for(var i=0;i<10;i++){
            radio_input[i].checked=false;
        }
        check_date();
    }
    function check_date(){
            var from_date= $("#From_date").val();
            var to_date=$("#To_date").val();
            from_date = from_date.split("-");
            to_date = to_date.split("-");
            from_date = new Date(from_date[0], from_date[1] - 1, from_date[2]).getTime();
            to_date = new Date(to_date[0], to_date[1] - 1, to_date[2]).getTime();
            if((to_date - from_date)<0){
                console.log(to_date - from_date);
                $("#error_message").show();
                $("#error_message").html("To date should above to the from date");
                $("#To_date").addClass("error");
                return false;
            }else{
                $("#error_message").hide();
                $("#To_date").removeClass("error");
                return true;
            }
        }
    
        $("#To_date").focusout(function () {
                check_date();
            });
        $("#From_date").focusout(function () {
                check_date();
            });
        $(document).ready(function () { 
            $("#reset").click(function () {
                if(check_date()){
                    var from_date= $("#From_date").val();
                    var to_date=$("#To_date").val();
                    var leave_type=$("input[name=leave_type]:checked").val();
                    $("#history_table").load("view_historyphp.php",{
                        from_date:from_date,
                        to_date:to_date,
                        leave_type:leave_type
                    });
                    
                }
            });
            $("#filter").click(function () {
//                $(".show").hide();
                if(check_date()){
                    var from_date= $("#From_date").val();
                    var to_date=$("#To_date").val();
                    var leave_type=$("input[name=leave_type]:checked").val();
                    $("#history_table").load("view_historyphp.php",{
                        from_date:from_date,
                        to_date:to_date,
                        leave_type:leave_type
                    });
                    
                }
            });
        });
</script>