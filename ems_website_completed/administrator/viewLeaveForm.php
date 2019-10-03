<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $conn = require_once("dbConfig.php");
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getTID=1;
    if (sizeof($str_arr)>1){      
        $getTID=$str_arr[1];
    }

    $sql="SELECT * FROM leave_table WHERE leave_num=$getTID";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $status='<font color="red">' . 'Pending' . '</font>';
?>

<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>

    <head>
        <title>EMS - View Leave Form</title>
        <link rel="stylesheet" type="text/css" href="css/schedule.css">
        <style>
        .Lable{
                font-size:17px;
                color: black; 
                font-weight: bold; 
                font-family:Times-New_Roamen;
                border: 1px solid black;
                width: 11.6%;
                text-align: center;
            }
            .row{
                font-size: 14px;
                color: black;
                height: 10%;
                font-family: Times-New-Roamen;
                border: 1px solid black;
                text-align: center;
            }
            .warning{
                text-align: center;
                font-size: 14px;
                font-weight: bold;
                width: 11.6%;
                border: 2px solid red;
                color: red; 
            }
        .btn-circle, .btn-circle-3d{
            border-radius: 50% !important;
        }

        .btn-primary.btn-circle{
            -webkit-box-shadow: 0px 0px 3px 1px #245580;
            -moz-box-shadow:    0px 0px 3px 1px #245580;
            box-shadow:         0px 0px 3px 1px #245580;
        }

        .btn{
            margin-left: 26%;
            margin-top: 20px;
        }

        .tabcontain{
            margin-top:100px;
            margin-left: 350px;
        }
            
        </style>

    </head>

        <div class="bootstrap-overrides" id="bootstrap-overrides">

                <div class="container-2" id="result">

                    <div class="wrapper">

                    <div  id="Contact" class="tabcontain">
            <div style="color: dodgerblue;font-size: 30px; margin-left:30% " ><p>Leave Card</p></div>

            <table id="leave_utilized_table" style="align:center;">
                <tr>
                    <th class="Lable"></th> 
                    <th class="Lable">Utilized</th>
                    <th class="Lable">Balance</th>
                    <th class="Lable"></th>
                    <th class="Lable">Utilized</th>
                    <th class="Lable">Balance</th>
                    <th class="Lable"></th>
                    <th class="Lable">Utilized</th>
                    <th class="Lable">Balance</th>
                </tr>
                <tr>
                    <td class="Lable">CL</td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable"><?php echo '2.0'?></td>
                    <td class="Lable">SPL</td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable"><?php echo '0.0'?></td>
                    <td class="Lable">SHTL</td>
                    <td class="Lable"><?php echo '3.0'?></td>
                    <td class="Lable"><?php echo '1.0'?></td>
                </tr>
                <tr>
                    <td class="Lable">AL</td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable"><?php echo '2.0'?></td>
                    <td class="Lable">HL</td>
                    <td class="Lable"><?php echo '3.0'?></td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable">LL</td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable"><?php echo '2.0'?></td>
                </tr>
                <tr>
                    <td class="Lable">SL</td>
                    <td class="Lable"><?php echo '2.0'?></td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable">DL</td>
                    <td class="Lable"><?php echo '1.0'?></td>
                    <td class="Lable"><?php echo '2.0'?></td>
                    <td class="Lable">ANP</td>
                    <td class="Lable"><?php echo '3.0'?></td>
                    <td class="Lable"><?php echo '2.0'?></td>
                </tr>
            </table>
                <br><br>
            <table id="leave_table">
                <tr>
            <th style="width: 18%;text-align:left" class="table_head">Leave Type</th>
            <th style="width: 15%;text-align:center" class="table_head">No of days</th>
            <th style="width: 18%;text-align:center" class="table_head">From Date</th>
            <th style="width: 18%;text-align:center" class="table_head">To Date</th>
            <th style="width: 18%;text-align:center" class="table_head">Date Requested</th>
            <th style="width: 20%;text-align:center" class="table_head">Date Approved</th>
                </tr>
                <tr>
            <td style="width: 18%;text-align:left" class="table_head">Short Leave</td>
            <td style="width: 15%;text-align:center" class="table_head">2</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-20</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-23</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-18</td>
            <td style="width: 20%;text-align:center" class="table_head">2019-09-19</td>
                </tr>
                <tr>
            <td style="width: 18%;text-align:left" class="table_head">Special Leave</td>
            <td style="width: 15%;text-align:center" class="table_head">5</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-10</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-15</td>
            <td style="width: 18%;text-align:center" class="table_head">2019-09-7</td>
            <td style="width: 20%;text-align:center" class="table_head">2019-09-8</td>
                </tr>

            </table>
                <div style="margin-left:17%;margin-bottom:1%;">
                    <a href="leave.php">
                        <button class="btn btn-lg btn-primary btn-circle"><i class="fa fa-arrow-left" id="reset" onclick="window.location.href='/leave.php'"></i></button>
                    </a>
                </div> 
            <p class="xs-font-size13" style="margin-left: 30%;margin-top:10px;">Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved.</p>
        </div>


                    </div>

                </div>
            
        </div>  
    
    </body>
</html> 

    






