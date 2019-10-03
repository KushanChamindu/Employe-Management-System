<!doctype html>
<html>
<head>
    <title>contact Form Design</title>
    <link rel="stylesheet" type="text/css" href="../css/contact_style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/ionicons.css" rel="stylesheet">
</head>
<body>
<div class="form-area">
    <div class="contact-title">
        <h1>Register</h1>

    </div>

    <div class="contact-form">
        <form id="contact-form">
<!--            <input name="empid" id="empid" type="text" class="form-control"-->
<!--                   placeholder="Employee ID" required>-->
<!--            <span class="error_form" id="empid_error_msg"></span>-->
<!--            <br>-->

            <input name="firstname" id="firstname" type="text" class="form-control"
                   placeholder="User Name" required>
            <span class="error_form" id="fname_error_msg"></span>
            <br>

<!--            <input name="lastname" id="lastname" type="text" class="form-control"-->
<!--                   placeholder="Last Name" required>-->
<!--            <span class="error_form" id="lname_error_msg"></span>-->
<!--            <br>-->

            <input name="email" id="email" type="email" class="form-control"
                   placeholder="email" required>
            <span class="error_form" id="email_error_msg"></span>
            <br>

            <input name="password" id="password" type="password" class="form-control"
                   placeholder="Password" required>
            <span class="error_form" id="password_error_msg"></span>
            <br>

            <input name="confirmpassword" id="confirmpassword" type="password" class="form-control"
                   placeholder="Confirm Password" required>
            <span class="error_form" id="confirmp_error_msg"></span>
            <br>

            <input id=register type="submit" class="submit" value="Register">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(function () {

                    $("#fname_error_msg").hide();
                    $("#empid_error_msg").hide();
                    $("#lname_error_msg").hide();
                    $("#email_error_msg").hide();
                    $("#password_error_msg").hide();
                    $("#confirmp_error_msg").hide();

                    var error_fname = false;
                    var error_empid = false;
                    var error_lname = false;
                    var error_email = false;
                    var error_password = false;
                    var error_confirmp = false;

                    $('#firstname').focusout(function () {
                        check_fname();
                    });
                    // $('#empid').focusout(function () {
                    //     check_empid();
                    // });
                    // $('#lastname').focusout(function () {
                    //     check_lname();
                    // });
                    $('#email').focusout(function () {
                        check_email();
                    });
                    $('#password').focusout(function () {
                        check_password();
                    });
                    $('#confirmpassword').focusout(function () {
                        check_confirmp();
                    });

                    function check_empid() {
                        var empid = $('#empid').val().trim().length;
                        if( empid>0){
                            $("#empid_error_msg").hide();
                        }
                        else{
                            $("#empid_error_msg").html("Empty Data");
                            $("#empid_error_msg").show();
                            $("#empid_error_msg").css("color", "#F90A0A");
                            error_empid = true;
                        }
                    }

                    function check_fname() {
                        var pattern = /^[a-zA-Z]*$/;
                        var firstname = $('#firstname').val();
                        if (pattern.test(firstname)) {
                            $("#fname_error_msg").hide();
                        } else {
                            $("#fname_error_msg").html("Should contain only characters");
                            $("#fname_error_msg").show();
                            $("#fname_error_msg").css("color", "#F90A0A");
                            error_fname = true;
                        }
                    }

                    function check_lname() {
                        var pattern = /^[a-zA-Z]*$/;
                        var lastname = $('#lastname').val();
                        if (pattern.test(lastname)) {
                            $("#lname_error_msg").hide();
                        } else {
                            $("#lname_error_msg").html("Should contain only characters");
                            $("#lname_error_msg").show();
                            $("#lname_error_msg").css("color", "#F90A0A");
                            error_lname = true;
                        }
                    }

                    function check_email() {
                        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        var email = $('#email').val();
                        if (pattern.test(email)) {
                            $("#email_error_msg").hide();
                        } else {
                            $("#email_error_msg").html("Invalid Email");
                            $("#email_error_msg").show();
                            $("#email_error_msg").css("color", "#F90A0A");
                            error_email = true;
                        }
                    }

                    function check_password() {
                        var password_length = $('#password').val().length;
                        if (password_length < 8) {
                            $("#password_error_msg").html("Password should contain atleast 8 characters");
                            $("#password_error_msg").show();
                            $("#password_error_msg").css("color", "#F90A0A");
                            error_password = true;
                        } else {
                            $("#password_error_msg").hide();
                        }
                    }

                    function check_confirmp() {
                        var password = $('#password').val();
                        var confirmp = $('#confirmpassword').val();
                        if (password !== confirmp) {
                            $("#confirmp_error_msg").html("Password did not match");
                            $("#confirmp_error_msg").show();
                            $("#confirmp_error_msg").css("color", "#F90A0A");
                            error_confirmp = true;
                        } else {
                            $("#confirmp_error_msg").hide();
                            error_confirmp = false;
                        }
                    }

                    $('#register').click(function (e) {
                       /* var empid = $('#empid').val();*/
                        var firstname = $('#firstname').val();
                        /*var lastname = $('#lastname').val();*/
                        var email = $('#email').val();
                        var password = $('#password').val();
                        var confirmpassword = $('#confirmpassword').val();
                        if ( error_fname == false &&  error_email == false && error_password == false && error_confirmp == false  && firstname !== ''  && email != '' && password != '' && confirmpassword != '') {

                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'register_form_handler_emp.php',
                                data: {
                                    // empid : empid,
                                    firstname: firstname,
                                    // lastname: lastname,
                                    email: email,
                                    password: password,
                                    confirmpassword: confirmpassword
                                },
                                success: function (data) {
                                    alert('Registration Successfull');
                                    window.location = 'home.php'
                                },
                                error: function (data) {
                                    alert('There was errors while saving data');
                                }

                            });
                        } else {
                            alert("Please fill the information correctly");
                        }
                    });

                });
            </script>


        </form>
    </div>
</div>
</body>

</html>
