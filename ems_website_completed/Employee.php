<?php session_start();?>
<?php
require "JsFunction.php";
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - Document</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/pec.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        .Lable{
                font-size:17px;
                color: black; 
                font-weight: bold; 
                font-family:Times-New_Roamen;
                
            }
        .button_para{
                font-weight: bold;
                
            }
            .button_container{
                margin-left: 1%;
            }
            .button{
  font-size:1.5rem;
  border-color: #245580;
  border-radius:100px;
  width:45px;
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
/*//Hover*/
/*//-----------------------*/
.button:hover{  
  width:125px;
  background-color: #245580;
  border-color:#245580;
  box-shadow: 0px 5px 5px rgba(0,0,0,0.2);
  color: blue;
  transition:.3s;
}

.button:active{
  box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
  transition: .05s
}
        </style>
    <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php');
        require_once ('codeblocks/image_insert.php');?>

        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div  id="Employee" class="tabcontain">
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
            <div class="button_container">
                <button id="personal" class="button" onclick="window.location.href='Employee_edit.php'">
                    <i class="fa fa fa-edit fa-1x icon"></i>
                </button>
                <label for="person" class="button_para">Request to Change</label>
            </div>
        </div>
    </div>

    <?php require_once('codeblocks/footer.php'); ?>

</html>

<script>Open("Employee");</script>