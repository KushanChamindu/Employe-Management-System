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
                width: 125px;
                
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


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div id="Contact_edit" class="edit_tabs">
        <table>
            <tr>
                <td  class="Lable">Address :  </td>
                <td><input id="Address_edit" type="text"></td>
                <td><p class="error-para" id="Address_error"></p></td>
            </tr>
            <tr>
                <td class="Lable">Country: </td>
                <td><input id="Country_edit" type="text"></td>
                <td><p class="error-para" id="Country_error"></p></td>
            </tr>
            <tr>
                <td class="Lable">Phone: </td>
                <td><input id="Phone_edit" type="text"></td>
                <td><p class="error-para" id="Phone_error"></p></td>
            </tr>
            <tr>
                <td class="Lable">Mobile: </td>
                <td><input id="Mobile_edit" type="text"></td>
                <td><p class="error-para" id="Mobile_error"></p></td>
            </tr>
            <tr>
                <td class="Lable">E-mail: </td>
                <td><input id="E_mail_edit" type="email"></td>
                <td><p class="error-para" id="E_mail_error"></p></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="button_container">
                        <button id="contact_edit_button" class="button">
                            <i class="fa fa fa-send-o fa-1x icon"></i>
                        </button>
                    <label for="person" class="button_para">Send Request to Admin</label>
                    </div><td>
            </tr>
            <tr><p style="font-size:20px;color:green" id="return_contact"></p></tr>
        </table>
</div>


        
        <?php require_once('codeblocks/footer.php'); ?>
<body>
</body>
</html>
<script>
    Edit_Contact();
</script>