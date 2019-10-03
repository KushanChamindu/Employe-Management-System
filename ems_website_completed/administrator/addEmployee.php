<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
        
        <style>
        td{
            height: 35px;
        }
            .error-para{
                font-size: 12px;
                color: red;
            }
            .error{ 
                border:1px solid red;
            }
            .table-personal{
                float:left;
                width:50%;
                margin-left: 4%;
            }
            .table-contact{
                margin-bottom: 150px;
            }
            .table-employee{
                
                margin-left: 4%;
            }
            input{
                width: 280px;
            }
            .buttondiv{
                margin-left: 10%;
            }
        </style>  
        <div id="Personal_edit" class="edit_tabs"><br><br>
        <h2 style="color:rgb(3, 177, 180);font-weight: bold;">Add Employee</h2><br><br>
            <div class="table-personal">
        <h4 style="color:rgb(3, 177, 180);font-weight: bold;">Personal Detail</h4><br>
            <table >
                <tr>
                    <td>Title :  </td>
                    <td><input id="Title_edit" type="text" name="Title" ></td>
                    <td><p class="error-para" id="Title_error"></p></td>
                </tr>
                <tr>
                    <td>Full Name: </td>
                    <td><input id="Full_Name_edit" type="text" name="Full_Name" ></td>
                    <td><p class="error-para" id="Full_Name_error"></p></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input id="User_Name_edit" type="text" name="User_Name" ></td>
                    <td><p class="error-para" id="User_Name_error"></p></td>
                </tr>
                <tr>
                    <td>Date Of Birth: </td>
                    <td><input id="Date_Of_Birth_edit" type="date" name="Date_Of_Birth" ></td>
                    <td><p class="error-para" id="Date_Of_Birth_error"></p></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td><select id="Gender_edit" name="Gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select></td>
                </tr>
                <tr>
                    <td>NIC: </td>
                    <td><input id="NIC_edit" type="text" name="NIC" ></td>
                    <td><p class="error-para" id="NIC_error"></p></td>
                </tr>
                <tr>
                    <td>Marital status: </td>
                    <td><select id="Marital_Status_edit" name="Marital_Status" >
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Nationality: </td>
                    <td><input id="Nationality_edit" type="text" name="Nationality" ></td>
                    <td><p class="error-para" id="Nationality_error"></p></td>
                </tr>
                <tr>
                    <td>Religion: </td>
                    <td><input id="Religion_edit" type="text" name="Religion" ></td>
                    <td><p class="error-para" id="Religion_error"></p></td>
                </tr>
                </table>
                </div>
            <div class="table-contact">
                <br><h4 style="color:rgb(3, 177, 180);font-weight: bold;">Contact Detail</h4><br>
                <table>
                <tr>
                    <td>Address :  </td>
                    <td><input id="Address_edit" type="text" name="Address" ></td>
                    <td><p class="error-para" id="Address_error"></p></td>
                </tr>
                <tr>
                    <td>Country: </td>
                    <td><input id="Country_edit" type="text" name="Country" ></td>
                    <td><p class="error-para" id="Country_error"></p></td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td><input id="Phone_edit" type="text" name="Phone" ></td>
                    <td><p class="error-para" id="Phone_error"></p></td>
                </tr>
                <tr>
                    <td>Mobile: </td>
                    <td><input id="Mobile_edit" type="text" name="Mobile"></td>
                    <td><p class="error-para" id="Mobile_error"></p></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input id="E_mail_edit" type="email" name="E_mail"></td>
                    <td><p class="error-para" id="E_mail_error"></p></td>
                </tr>
                </table>
                </div>
            <div class="table-employee">
                <br><h4 style="color:rgb(3, 177, 180);font-weight: bold;">Employee Detail</h4><br>
                <table>
                    <tr>
                    <td>Employee ID :  </td>
                    <td><input id="employee_ID_edit" type="text " name="employee_ID"></td>
                    <td><p class="error-para" id="employee_ID_error"></p></td>
                </tr>
                <tr>
                    <td>Date Of Joinning :  </td>
                    <td><input id="Date_Of_Joinning_edit" type="date" name="Date_Of_Joinning"></td>
                    <td><p class="error-para" id="Date_Of_Joinning_error"></p></td>
                </tr>
                <tr>
                    <td>Designation: </td>
                    <td><input id="Designation_edit" type="text" name="Designation"></td>
                    <td><p class="error-para" id="Designation_error"></p></td>
                </tr>
                <tr>
                    <td>Employee type: </td>
                    <td><select id="Employee_type_edit" name="Employee_type">
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Department: </td>
                    <td><input id="Department_edit" type="text" name="Department"></td>
                    <td><p class="error-para" id="Department_error"></p></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input id="password" type="password" name="password"></td>
                    <td><p class="error-para" id="password_error"></p></td>
                </tr>
            </table>
                <p id="return_message" style="color:green;font-size:20px;"></p>
                </div>
            <div class="buttondiv">
                <a href="addEmployee.php">
                    <button class="btn btn-lg btn-primary btn-circle"><i class="fa fa-times" id="reset" onclick="window.location.href='/addEmployee.php'"></i> Cancel</button>
                </a>
                <button id="submitbutton" type="submit" class="btn btn-lg btn-primary btn-circle"><i class="fa fa-send-o" id="reset"></i> Submit</button>
            </div>
    </div>

<script>
    $(document).ready(function () {
    //Personal validate
//        $("#Title_error").hide();
//        $("#Full_Name_error").hide();
//        $("#Date_Of_Birth_error").hide();
//        $("#NIC_error").hide();
//        $("#Nationality_error").hide();
//        $("#Religion_error").hide();
        
        var Title_error=false;
        var Full_Name_error=false;
        var User_Name_error=false;
        var Date_Of_Birth_error=false;
        var NIC_error=false;
        var Nationality_error=false;
        var Religion_error=false;
        
        $('#Title_edit').focusout(function(){
            check_Title();
        });
        $('#Full_Name_edit').focusout(function(){
            check_Full_Name();
        });
        $('#User_Name_edit').focusout(function(){
            check_User_Name();
        });
        $('#Date_Of_Birth_edit').focusout(function(){
            check_Date_Of_Birth();
        });
        $('#NIC_edit').focusout(function(){
            check_NIC();
        });
        $('#Nationality_edit').focusout(function(){
            check_Nationality();
        });
         $('#Religion_edit').focusout(function(){
            check_Religion();
        });
        
    //Employee validate
//        $("#Designation_error").hide();
//        $("#Department_error").hide();
        
        var Department_error=false;
        var Designation_error=false;
        var employee_ID_error=false;
        var password_error=false;
        var Date_Of_Joinning_error=false;
        
        $('#Designation_edit').focusout(function(){
            check_Designation();
        });
        $('#Date_Of_Joinning_edit').focusout(function(){
            check_Date_Of_Joinning();
        });
        $('#Department_edit').focusout(function(){
            check_Department();
        });
        $('#employee_ID_edit').focusout(function(){
            check_employee_ID();
        });
        $('#password').focusout(function(){
            check_password();
        });
        
    //Contact validate
//        $("#Address_error").hide();
//        $("#Country_error").hide();
//        $("#Phone_error").hide();
//        $("#Mobile_error").hide();
//        $("#E_mail_error").hide();
    
        var Address_error=false;
        var Country_error=false;
        var Phone_error=false;
        var Mobile_error=false;
        var E_mail_error=false;
    
        $('#Address_edit').focusout(function(){
            check_Address();
        });
        $('#Country_edit').focusout(function(){
            check_Country();
        });
        $('#Phone_edit').focusout(function(){
            check_Phone();
        });
        $('#Mobile_edit').focusout(function(){
            check_Mobile();
        });
        $('#E_mail_edit').focusout(function(){
            check_E_mail();
        });
    //personal validate function
        function check_Title(){
            var array_title=['Miss','Mr','Mrs','Ms','Brother','Captain','Doctor','Father','Honourable','Lady','Mada','Major','Master','Pastor','Professor','Reverend','Sir','Sister','Abbott','Ableseaman','Admiral','Air Chief Marshal','Air Commodore','Air Marshall','Air Vice' ,'Marshall','Aircraftman','Aircraftwoman','Alderman','Ambassador','Archbishop','Archdeacon','Associate Professor','Baron','Baroness','Bishop','Bombardier','Brigadier','Cadet','Canon','Cardinal','Chaplain','Chief Petty Officer','Colonel','Commander','Commissioner','Commodore','Constable','Consul','Corporal','Count','Countess','Dame','Deacon','Deaconess','Dean','Deputy Superintendent','Director','Earl','Engineer','Flight Lieutenant','Flight Sergeant','Flying Officer','General','Governor','Group Captain','Honourable Judge','Honourable Justice','Judge','Justice','Lance Bombardier','Lance Corporal','Leading Aircraftman','Leading Aircraftwoman','Leading Seaman','Lieutenant (Army)','Lieutenant (Navy)','Lieutenant Colonel','Lieutenant Commander','Lieutenant General','Lieutenant Governor','Lord','Madame','Major General','Manager','Mayor','Mayoress','Midshipman','Monsignor','Most Reverend','Mother','Nurse','Office Cadet','Petty Officer','Pilot Officer','Private','Rabbi','Rear Admiral','Rector','Regimental Sergeant Major of the Army','Reverend Doctor','Right Honourable','Right Reverend','Seaman','Second Lieutenant','Senator','Senior','Senior Constable','Sergeant','Sister Superior','Squadron Leader','Staff Cadet','Staff Sergeant','Station Master','Sub Lieutenant','Superintendent','Swami','Very Reverend','Vice Admiral','Vice Commander','Viscount','Warrant Officer (Air Force)','Warrant Officer (Navy)','Warrant Officer Class 1','Warrant Officer Class 2','Wing Commander']; 
            for(var i=0;i<=array_title.length;i++){
                if(array_title[i]==$("#Title_edit").val()){
//                    $("#Title_error").hide();
                    $("#Title_error").html("");
                    Title_error=false;
                    $("#Title_edit").removeClass("error");  
                    break;
                }else if(i==array_title.length){
                     $("#Title_error").html("Input valide title");
                    $("#Title_error").show();
                    $("#Title_error").css("color","#F90A0A");
                    $("#Title_edit").addClass("error");
                    Title_error=true;
                }
            }
        
        }
    
        function check_Full_Name(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var name=$('#Full_Name_edit').val();
            if (pattern.test(name)){
//                $("#Full_Name_error").hide();
                $("#Full_Name_error").html("");
                 Full_Name_error=false;
                $("#Full_Name_edit").removeClass("error");  
            }
            else{
                $("#Full_Name_error").html("Should contain only characters");
                $("#Full_Name_error").show();
                $("#Full_Name_error").css("color","#F90A0A");
                Full_Name_error=true;
                $("#Full_Name_edit").addClass("error");
            }
         }
        
        function check_User_Name(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var name=$('#User_Name_edit').val();
            if (pattern.test(name)){
//                $("#Full_Name_error").hide();
                $("#User_Name_error").html("");
                 User_Name_error=false;
                $("#User_Name_edit").removeClass("error");  
            }
            else{
                $("#User_Name_error").html("Should contain only characters");
                $("#User_Name_error").show();
                $("#User_Name_error").css("color","#F90A0A");
                User_Name_error=true;
                $("#User_Name_edit").addClass("error");
            }
         }
        
         
        function check_Date_Of_Birth(){
             var employee_ID_val=$('#Date_Of_Birth_edit').val();
            if(employee_ID_val==""){
                $("#Date_Of_Birth_error").html("Enter Birthday");
                $("#Date_Of_Birth_error").show();
                $("#Date_Of_Birth_error").css("color","#F90A0A");
                Date_Of_Birth_error=true;
                $("#Date_Of_Birth_edit").addClass("error");
            }else{
//                $("#employee_ID_error").hide();
                $("#Date_Of_Birth_error").html("");
                Date_Of_Birth_error=false;
                $("#Date_Of_Birth_edit").removeClass("error");
            }
         }
         
        function check_NIC(){
            var pattern=/^[0-9]{9}[vV]$/;
            var NIC_val=$("#NIC_edit").val();
            if(pattern.test(NIC_val)){
//                $("#NIC_error").hide();
                $("#NIC_error").html("");
                NIC_error=false;
                $("#NIC_edit").removeClass("error");
            }
            else{
                $("#NIC_error").html("Enter valide NIC");
                $("#NIC_error").show();
                $("#NIC_error").css("color","#F90A0A");
                NIC_error=true;
                $("#NIC_edit").addClass("error");
            }
        }
         
        function check_Nationality(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Nationality_val=$('#Nationality_edit').val();
            if (pattern.test(Nationality_val)){
//                $("#Nationality_error").hide();
                $("#Nationality_error").html("");
                Nationality_error=false;
                $("#Nationality_edit").removeClass("error");
            }
            else{
                $("#Nationality_error").html("Should contain only characters");
                $("#Nationality_error").show();
                $("#Nationality_error").css("color","#F90A0A");
                Nationality_error=true;
                $("#Nationality_edit").addClass("error");
            }
         }
         
        function check_Religion(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Religion_val=$('#Religion_edit').val();
            if (pattern.test(Religion_val)){
//                $("#Religion_error").hide();
                $("#Religion_error").html("");
                Religion_error=false;
                $("#Religion_edit").removeClass("error");
                
            }
            else{
                $("#Religion_error").html("Should contain only characters");
                $("#Religion_error").show();
                $("#Religion_error").css("color","#F90A0A");
                Religion_error=true;
                $("#Religion_edit").addClass("error");
            }
         }
        
    //Employee validate function
        function check_Designation(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Designation_val=$('#Designation_edit').val();
            if (pattern.test(Designation_val)){
//                $("#Designation_error").hide();
                $("#Designation_error").html("");
                Designation_error=false;
                $("#Designation_edit").removeClass("error");
            }
            else{
                $("#Designation_error").html("Enter valide Designation");
                $("#Designation_error").show();
                $("#Designation_error").css("color","#F90A0A");
                Designation_error=true;
                $("#Designation_edit").addClass("error");
            }
         }    
        
        function check_Date_Of_Joinning(){
             var Date_Of_Joinning_val=$('#Date_Of_Joinning_edit').val();
            if(Date_Of_Joinning_val==""){
                $("#Date_Of_Joinning_error").html("Enter Joinning day");
                $("#Date_Of_Joinning_error").show();
                $("#Date_Of_Joinning_error").css("color","#F90A0A");
                Date_Of_Joinning_error=true;
                $("#Date_Of_Joinning_edit").addClass("error");
            }else{
//                $("#employee_ID_error").hide();
                $("#Date_Of_Joinning_error").html("");
                Date_Of_Joinning_error=false;
                $("#Date_Of_Joinning_edit").removeClass("error");
            }
         }
        
        function check_Department(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Department_val=$('#Department_edit').val();
            if (pattern.test(Department_val)){
//                $("#Department_error").hide();
                $("#Department_error").html("");
                Department_error=false;
                $("#Department_edit").removeClass("error");
            }
            else{
                $("#Department_error").html("Enter valide Depaertment");
                $("#Department_error").show();
                $("#Department_error").css("color","#F90A0A");
                Department_error=true;
                $("#Department_edit").addClass("error");
            }
         }
        
        function check_employee_ID(){
            var employee_ID_val=$('#employee_ID_edit').val();
            if(employee_ID_val==""){
                $("#employee_ID_error").html("Enter Employee ID");
                $("#employee_ID_error").show();
                $("#employee_ID_error").css("color","#F90A0A");
                employee_ID_error=true;
                $("#employee_ID_edit").addClass("error");
            }else{
//                $("#employee_ID_error").hide();
                $("#employee_ID_error").html("");
                employee_ID_error=false;
                $("#employee_ID_edit").removeClass("error");
            }
        }
        
        function check_password(){
            var password_val=$('#password').val();
            if(password_val==""){
                $("#password_error").html("Enter Employee password");
                $("#password_error").show();
                $("#password_error").css("color","#F90A0A");
                password_error=true;
                $("#password").addClass("error");
            }else{
//                $("#employee_ID_error").hide();
                $("#password_error").html("");
                password_error=false;
                $("#password").removeClass("error");
            }
        }
        
    //Contact validate function
        function check_Address(){
            var pattern= /^[a-zA-Z0-9]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Address_val=$('#Address_edit').val();
            if (pattern.test(Address_val)){
//                $("#Address_error").hide();
                 $("#Address_error").html("");
                Address_error=false;
                $("#Address_edit").removeClass("error");
            }
            else{
                $("#Address_error").html("Enter valide  Address");
                $("#Address_error").show();
                $("#Address_error").css("color","#F90A0A");
                Address_error=true;
                $("#Address_edit").addClass("error");
            }
         }
        
        function check_Country(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Country_val=$('#Country_edit').val();
            if (pattern.test(Country_val)){
//                $("#Country_error").hide();
                $("#Country_error").html("");
                Country_error=false;
                $("#Country_edit").removeClass("error");
            }
            else{
                $("#Country_error").html("Enter valide Country");
                $("#Country_error").show();
                $("#Country_error").css("color","#F90A0A");
                Country_error=true;
                $("#Country_edit").addClass("error");
            }
         }
        
        function check_Phone(){
            var pattern= /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            var Phone_val=$('#Phone_edit').val();
            if (pattern.test(Phone_val)){
//                $("#Phone_error").hide();
                $("#Phone_error").html("");
                Phone_error=false;
                $("#Phone_edit").removeClass("error");
            }
            else{
                $("#Phone_error").html("Enter valide Phone number");
                $("#Phone_error").show();
                $("#Phone_error").css("color","#F90A0A");
                Phone_error=true;
                $("#Phone_edit").addClass("error");
            }
         }
        
        function check_Mobile(){
            var pattern= /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            var Mobile_val=$('#Mobile_edit').val();
            if (pattern.test(Mobile_val)){
//                $("#Mobile_error").hide();
                $("#Mobile_error").html("");
                Mobile_error=false;
                $("#Mobile_edit").removeClass("error");
            }
            else{
                $("#Mobile_error").html("Enter valide Mobile number");
                $("#Mobile_error").show();
                $("#Mobile_error").css("color","#F90A0A");
                Mobile_error=true;
                $("#Mobile_edit").addClass("error");
            }
         }
        
        function check_E_mail(){
            var pattern= /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            var E_mail_val=$('#E_mail_edit').val();
            if (pattern.test(E_mail_val)){
//                $("#E_mail_error").hide();
                 $("#E_mail_error").html("");
                E_mail_error=false;
                $("#E_mail_edit").removeClass("error");
            }
            else{
                $("#E_mail_error").html("Enter valide email address");
                $("#E_mail_error").show();
                $("#E_mail_error").css("color","#F90A0A");
                E_mail_error=true;
                $("#E_mail_edit").addClass("error");
            }
         }
        
        $("#submitbutton").click(function() {
        check_Title();
            check_Full_Name(); 
            check_User_Name();
            check_Date_Of_Birth();
            check_NIC();
            check_Nationality();
            check_Religion();
            check_Designation();
            check_Date_Of_Joinning();
            check_Department();
            check_employee_ID();
            check_password();
            check_Address();
            check_Country();
            check_Phone();
            check_Mobile();
            check_E_mail();
        document.getElementById("return_message").innerHTML="";
        var Title= $("#Title_edit").val();
        var Full_Name= $("#Full_Name_edit").val();
        var User_Name=$("#User_Name_edit").val();
        var Date_Of_Birth= $("#Date_Of_Birth_edit").val();
        var Gender= $("#Gender_edit").val();
        var NIC= $("#NIC_edit").val();
        var Marital_Status= $("#Marital_Status_edit").val();
        var Nationality= $("#Nationality_edit").val();
        var Religion= $("#Religion_edit").val();
        var employeeID=$('#employee_ID_edit').val();
        var Date_Of_Joinning= $("#Date_Of_Joinning_edit").val();
        var Designation= $("#Designation_edit").val();
        var Employee_type= $("#Employee_type_edit").val();
        var Department= $("#Department_edit").val();
        var password=$("#password").val();
        var Address= $("#Address_edit").val();
        var Country= $("#Country_edit").val();
        var Phone= $("#Phone_edit").val();
        var Mobile= $("#Mobile_edit").val();
        var E_mail= $("#E_mail_edit").val();
        if((Title_error==false) && (Full_Name_error==false) && (Date_Of_Birth_error==false) && (NIC_error==false) &&(Nationality_error==false) && (Religion_error==false) && Designation_error==false && Department_error==false && Address_error==false && Country_error==false && Phone_error==false && Mobile_error==false && E_mail_error==false && User_Name_error==false && employee_ID_error==false && password_error==false && Date_Of_Joinning_error==false){
            $.post("addEmployeephp.php",{
            Title:Title,
            Full_Name:Full_Name,
            User_Name:User_Name,
            Date_Of_Birth:Date_Of_Birth,
            Gender: Gender,
            NIC:NIC,
            Marital_Status:Marital_Status,
            Nationality:Nationality,
            Religion:Religion,
            Date_Of_Joinning:Date_Of_Joinning,
            Designation:Designation,
            Employee_type:Employee_type,
            Department: Department,
            Address:Address,
            Country:Country,
            Phone:Phone,
            Mobile: Mobile,
            E_mail:E_mail,
            password:password,
            employeeID:employeeID,
        },function (data,status) {
            $("#return_message").html(data);
        });
        }
    });   
    });
</script>