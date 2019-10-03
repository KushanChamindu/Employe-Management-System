<?php session_start();?>
<?php
require "leave_card_function.php";
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - Leave Card</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/pec.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
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

        .btn-1{
            margin-left: 26%;
            margin-top: 20px;
        }
            
        </style>
    <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div  id="Contact" class="tabcontain">
            <div style="color: dodgerblue;font-size: 30px; margin-left:30%" ><p>Leave Card</p></div>
            <table id="leave_utilized_table">
            <table id="leave_utilized_table">
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
                    <td class="<?php if($CL<0){echo "warning";}else{echo row; }?>">CL</td>
                    <td class="<?php if($CL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$CL?></td>
                    <td class="<?php if($CL<0){echo "warning";}else{echo row; }?>"><?php echo $CL?></td>
                    <td class="<?php if($SPL<0){echo "warning";}else{echo row; }?>">SPL</td>
                    <td class="<?php if($SPL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$SPL?></td>
                    <td class="<?php if($SPL<0){echo "warning";}else{echo row; }?>"><?php echo $SPL?></td>
                    <td class="<?php if($SHTL<0){echo "warning";}else{echo row; }?>">SHTL</td>
                    <td class="<?php if($SHTL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$SHTL?></td>
                    <td class="<?php if($SHTL<0){echo "warning";}else{echo row; }?>"><?php echo $SHTL?></td>
                </tr>
                <tr>
                    <td class="<?php if($AL<0){echo "warning";}else{echo row; }?>">AL</td>
                    <td class="<?php if($AL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$AL?></td>
                    <td class="<?php if($AL<0){echo "warning";}else{echo row; }?>"><?php echo $AL?></td>
                    <td class="<?php if($HL<0){echo "warning";}else{echo row; }?>">HL</td>
                    <td class="<?php if($HL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$HL?></td>
                    <td class="<?php if($HL<0){echo "warning";}else{echo row; }?>"><?php echo $HL?></td>
                    <td class="<?php if($LL<0){echo "warning";}else{echo row; }?>">LL</td>
                    <td class="<?php if($LL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$LL?></td>
                    <td class="<?php if($LL<0){echo "warning";}else{echo row; }?>"><?php echo $LL?></td>
                </tr>
                <tr>
                    <td class="<?php if($SL<0){echo "warning";}else{echo row; }?>">SL</td>
                    <td class="<?php if($SL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$SL?></td>
                    <td class="<?php if($SL<0){echo "warning";}else{echo row; }?>"><?php echo $SL?></td>
                    <td class="<?php if($DL<0){echo "warning";}else{echo row; }?>">DL</td>
                    <td class="<?php if($DL<0){echo "warning";}else{echo row; }?>"><?php echo 10-$DL?></td>
                    <td class="<?php if($DL<0){echo "warning";}else{echo row; }?>"><?php echo $DL?></td>
                    <td class="<?php if($ANP<0){echo "warning";}else{echo row; }?>">ANP</td>
                    <td class="<?php if($ANP<0){echo "warning";}else{echo row; }?>"><?php echo 10-$ANP?></td>
                    <td class="<?php if($ANP<0){echo "warning";}else{echo row; }?>"><?php echo $ANP?></td>
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
                <?php echo $str_echo;?>
            </table>
                <div style="margin-left:17%;margin-bottom:1%;">
                    <a href="leave.php">
                        <button class="btn-1 btn-lg btn-primary btn-circle"><i class="fa fa-arrow-left" id="reset" onclick="window.location.href='/leave.php'"></i></button>
                    </a>
                </div> 
            <p class="xs-font-size13" style="margin-left: 30%;margin-top:10px;">Copyright &copy; <?php echo date('Y'); ?>.All Rights Reserved.</p>
        </div>
    </div>

</html>

<script>
    
</script>