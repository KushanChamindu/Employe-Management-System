
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/contact_style.css">
</head>
<body>
<div class="form-area">
    <div class="contact-title">
        <h1>Login</h1>

    </div>

    <div class="contact-form">
        <form id="contact-form" method="post" action="login_form_handler.php">
            <input name="username" type="text" class="form-control"
                   placeholder="User Name / Email" required>
            <br>

            <input name="password" type="password" class="form-control"
                   placeholder="Password" required>
            <br>
            <input type="submit" class="submit" name="submit" value="Login">
        </form>
        <?php if(isset($_GET['logout'])){
            echo "<p style='background-color: #2b542c;color: white; padding: 10px;'> You have successfully Logout";
        } ?>
    </div>
</div>
</body>


</html>