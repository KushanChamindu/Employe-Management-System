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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            .Lable{
                font-size:17px;
                color: black; 
                font-weight: bold; 
                font-family:Times-New_Roamen;
                width: 150px;
            }
            .error-para{
                font-size: 12px;
                color: red;
            }
            .error{
                border:1px solid red;
            }
            input:hover{
	           border: 2px solid #0C0;
            }
            select:hover{
	           border: 2px solid #0C0;
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
  transform: translateX(-3%);
  text-align:center;
    font-size: 22px;
}
/*//Hover*/
/*//-----------------------*/
.button:hover{  
  width:100px;
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

<body>
	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div id="Personal_edit" class="edit_tabs">
            <table>
                <tr>
                    <td class="Lable">Title :  </td>
                    <td><input id="Title_edit" type="text" name="Title"></td>
                    <td><p class="error-para" id="Title_error"></p></td>
                </tr>
                <tr>
                    <td class="Lable">Full Name: </td>
                    <td><input id="Full_Name_edit" type="text" name="Full_Name"></td>
                    <td><p class="error-para" id="Full_Name_error"></p></td>
                </tr>
                <tr>
                    <td class="Lable">Date Of Birth: </td>
                    <td><input id="Date_Of_Birth_edit" type="date" name="Date_Of_Birth"></td>
                    <td><p class="error-para" id="Date_Of_Birth_error"></p></td>
                </tr>
                <tr>
                    <td class="Lable">Gender: </td>
                    <td><select id="Gender_edit" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="Lable">NIC: </td>
                    <td><input id="NIC_edit" type="text" name="NIC"></td>
                    <td><p class="error-para" id="NIC_error"></p></td>

                </tr>
                <tr>
                    <td class="Lable">Marital status: </td>
                    <td><select id="Marital_Status_edit" name="Marital_Status">
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="Lable">Nationality: </td>
                    <td><input id="Nationality_edit" type="text" name="Nationality"></td>
                    <td><p class="error-para" id="Nationality_error"></p></td>
                </tr>
                <tr>
                    <td class="Lable">Religion: </td>
                    <td><input id="Religion_edit" type="text" name="Religion"></td>
                    <td><p class="error-para" id="Religion_error"></p></td>
                </tr>
                <tr>
                    <td colspan="2"><div class="button_container">
                <button id="personal_edit_button" class="button">
                    <i class="fa fa fa-send-o fa-1x icon"></i>
                </button>
                <label for="person" class="button_para">Send Request to Admin</label>
            </div>
                    </td>
                </tr>
                <tr><p id="return_personal" style="font-size:20px;color:green" ></p></tr>
                
            </table>
        </div>
        <?php require_once('codeblocks/footer.php'); ?>
</body>
    
</html>
<script>
    Edit_Personal();
</script>