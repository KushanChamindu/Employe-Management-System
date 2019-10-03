<?php
require "database.php";
$e_id=$_SESSION['e_id'];
$sql = "SELECT * FROM employee WHERE `employee_ID`='$e_id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$code_array = json_encode($row);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script>
    var Data_array = <?php echo $code_array; ?>;
    $(document).ready(function () {
    //Personal validate
        $("#Title_error").hide();
        $("#Full_Name_error").hide();
        $("#Date_Of_Birth_error").hide();
        $("#NIC_error").hide();
        $("#Nationality_error").hide();
        $("#Religion_error").hide();
        
        var Title_error=false;
        var Full_Name_error=false;
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
        $("#Designation_error").hide();
        $("#Department_error").hide();
        
        var Department_error=false;
        var Designation_error=false;
        
        $('#Designation_edit').focusout(function(){
            check_Designation();
        });
        $('#Department_edit').focusout(function(){
            check_Department();
        });
    //Contact validate
        $("#Address_error").hide();
        $("#Country_error").hide();
        $("#Phone_error").hide();
        $("#Mobile_error").hide();
        $("#E_mail_error").hide();
    
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
                    $("#Title_error").hide();
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
                $("#Full_Name_error").hide();
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
         
        function check_Date_Of_Birth(){
             var pattern="/([0][1-9]|[12][0-9]|3[0-1])\/([0][1-9]|1[0-2])\/(\d{4}) (0[0-9]|1[0-2]):([0-5][0-9]) (am|pm)/";
             var Birth_Date=$("Date_Of_Birth_edit").val();
             if(pattern.test(Birth_Date)){
                $("#Date_Of_Birth_error").hide();
                 Date_Of_Birth_error=false;
                 $("#Date_Of_Birth_edit").removeClass("error");
            }
            else{
                $("#Date_Of_Birth_error").html("Enter valide date");
                $("#Date_Of_Birth_error").show();
                $("#Date_Of_Birth_errorr").css("color","#F90A0A");
                Date_Of_Birth_error=true;
                $("#Date_Of_Birth_edit").addClass("error");
            }
         }
         
        function check_NIC(){
            var pattern=/^[0-9]{9}[vV]$/;
            var NIC_val=$("#NIC_edit").val();
            if(pattern.test(NIC_val)){
                $("#NIC_error").hide();
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
                $("#Nationality_error").hide();
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
                $("#Religion_error").hide();
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
                $("#Designation_error").hide();
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
    
        function check_Department(){
            var pattern= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Department_val=$('#Department_edit').val();
            if (pattern.test(Department_val)){
                $("#Department_error").hide();
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
        
    //Contact validate function
        function check_Address(){
            var pattern= /^[a-zA-Z0-9]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            var Address_val=$('#Address_edit').val();
            if (pattern.test(Address_val)){
                $("#Address_error").hide();
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
                $("#Country_error").hide();
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
                $("#Phone_error").hide();
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
                $("#Mobile_error").hide();
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
                $("#E_mail_error").hide();
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
        
    $("#personal_edit_button").click(function() {
        document.getElementById("return_personal").innerHTML="";
        var Title= $("#Title_edit").val();
        var Full_Name= $("#Full_Name_edit").val();
        var Date_Of_Birth= $("#Date_Of_Birth_edit").val();
        var Gender= $("#Gender_edit").val();
        var NIC= $("#NIC_edit").val();
        var Marital_Status= $("#Marital_Status_edit").val();
        var Nationality= $("#Nationality_edit").val();
        var Religion= $("#Religion_edit").val();
        if((Title_error==false) && (Full_Name_error==false) && (Date_Of_Birth_error==false) && (NIC_error==false) &&(Nationality_error==false) && (Religion_error==false)){
            $.post("edit.php",{
            Title:Title,
            Full_Name:Full_Name,
            Date_Of_Birth:Date_Of_Birth,
            Gender: Gender,
            NIC:NIC,
            Marital_Status:Marital_Status,
            Nationality:Nationality,
            Religion:Religion,
        },function (data,status) {
            $("#return_personal").html(data);
        });
        }
    });
    $("#employee_edit_button").click(function() {
        document.getElementById("return_employee").innerHTML="";
            if(Designation_error==false && Department_error==false){
            var Date_Of_Joinning= $("#Date_Of_Joinning_edit").val();
            var Designation= $("#Designation_edit").val();
            var Employee_type= $("#Employee_type_edit").val();
            var Department= $("#Department_edit").val();
            $.post("edit.php",{
                Date_Of_Joinning:Date_Of_Joinning,
                Designation:Designation,
                Employee_type:Employee_type,
                Department: Department,
            },function (data,status) {
                $("#return_employee").html(data);
            });
            }
        });
    $("#contact_edit_button").click(function() {
        document.getElementById("return_contact").innerHTML="";
        if(Address_error==false && Country_error==false && Phone_error==false && Mobile_error==false && E_mail_error==false){
        var Address= $("#Address_edit").val();
        var Country= $("#Country_edit").val();
        var Phone= $("#Phone_edit").val();
        var Mobile= $("#Mobile_edit").val();
        var E_mail= $("#E_mail_edit").val();
        $.post("edit.php",{
            Address:Address,
            Country:Country,
            Phone:Phone,
            Mobile: Mobile,
            E_mail:E_mail,
        },function (data,status) {
           $("#return_contact").html(data);
        });
    }
        });
    });
    
    function Open(type) {
        if(type=='Personal') {
            var array_personal = ["Title", "Full_Name", "Date_Of_Birth", "Gender", "NIC", "Marital_Status", "Nationality", "Religion"];
            var personal_detail = [Data_array.Title, Data_array.Full_Name, Data_array.Date_Of_Birth, Data_array.Gender, Data_array.NIC, Data_array.Marital_Status, Data_array.Nationality, Data_array.Religion];
            for (i = 0; i < 8; i++) {
                document.getElementById(array_personal[i]).innerHTML = ":  "+personal_detail[i];
            }
        }else if(type=='Employee') {
            var array_employee = ["Date_Of_Joinning", "Designation", "Employee_type", "Department"];
            var employee_detail = [Data_array.Date_Of_Joinning, Data_array.Designation, Data_array.Employee_type, Data_array.Department];
            for (i = 0; i < 4; i++) {
                document.getElementById(array_employee[i]).innerHTML = ":  "+employee_detail[i];
            }
        }else if (type=='Contact') {
            var array_contact = ["Address", "Country", "Phone", "Mobile", "E_mail"];
            var contact_detail = [Data_array.Address, Data_array.Country, Data_array.Phone, Data_array.Mobile, Data_array.E_mail];
            for (i = 0; i < 5; i++) {
                document.getElementById(array_contact[i]).innerHTML = ":  "+contact_detail[i];
            }
        }
    }
    function Edit_Personal() {
        document.getElementById("return_personal").innerHTML='';
        var array_personal_edit = ["Title_edit", "Full_Name_edit", "Date_Of_Birth_edit", "Gender_edit", "NIC_edit", "Marital_Status_edit", "Nationality_edit", "Religion_edit"];
        var personal_detail = [Data_array.Title, Data_array.Full_Name, Data_array.Date_Of_Birth, Data_array.Gender, Data_array.NIC, Data_array.Marital_Status, Data_array.Nationality, Data_array.Religion];
        for (var i=0;i<8;i++){
            if(i==3){
                if("Male"==personal_detail[i]){var index='0';}else if ("Female"==personal_detail[i]){var index='1'}else{var index='2';}
                document.getElementById(array_personal_edit[i]).selectedIndex=index;
            }else if(i==5){
                if("Married"==personal_detail[i]){var index='0';}else{var index='1';}
                document.getElementById(array_personal_edit[i]).selectedIndex=index;
            }else {
                document.getElementById(array_personal_edit[i]).value= personal_detail[i];
            }
        }
    }
    function Edit_Employee() {
        document.getElementById("return_employee").innerHTML='';
        var array_employee_edit = ["Date_Of_Joinning_edit", "Designation_edit", "Employee_type_edit", "Department_edit"];
        var employee_detail = [Data_array.Date_Of_Joinning, Data_array.Designation, Data_array.Employee_type, Data_array.Department];
        for (var i=0;i<4;i++){
            if(i==2){
                if("Part Time"==employee_detail[i]){var index='0';}else{var index='1';}
                document.getElementById(array_employee_edit[i]).selectedIndex=index;
            }else {
                document.getElementById(array_employee_edit[i]).value= employee_detail[i];
            }
        }

    }
    function Edit_Contact() {
        document.getElementById("return_contact").innerHTML='';
        var array_contact_edit = ["Address_edit", "Country_edit", "Phone_edit", "Mobile_edit", "E_mail_edit"];
        var contact_detail = [Data_array.Address, Data_array.Country, Data_array.Phone, Data_array.Mobile, Data_array.E_mail];
        for (var i=0;i<5;i++){
            document.getElementById(array_contact_edit[i]).value= contact_detail[i];
        }
    }
    function change_Personal() {
        console.log(change_value_personal);
        for (var i=0;i<8;i++){
            var array_personal_edit = ["Title_edit", "Full_Name_edit", "Date_Of_Birth_edit", "Gender_edit", "NIC_edit", "Marital_status_edit", "Nationality_edit", "Religion_edit"];
            var personal_detail = [Data_array.Title, Data_array.Full_Name, Data_array.Date_Of_Birth, Data_array.Gender, Data_array.NIC, Data_array.Marital_Status, Data_array.Nationality, Data_array.Religion];
            if(document.getElementById(array_personal_edit[i]).value!=personal_detail[i]){
                change_personal_array.push(array_personal_edit[i].slice(0,array_personal_edit[i].length-5)+":"+document.getElementById(array_personal_edit[i]).value);
            }
        }
        var json_personal=  JSON.stringify(change_personal_array);

        Open('Personal');
    }  
            
</script>
