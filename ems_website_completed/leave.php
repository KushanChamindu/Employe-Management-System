<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - Leave</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/leave.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        
   <?php require_once('codeblocks/notification.php'); ?>


	<div class="wrapper">
        <?php require_once('codeblocks/head.php'); ?>
        <?php require_once ('codeblocks/image_insert.php'); ?>
        <?php require_once('codeblocks/navigation.php'); ?>
        
        <?php require_once('codeblocks/side.php'); ?>

<!--        <div class="profile">-->
<!--            <img src="img/profile_img/img1.png" class="w3-circle"  style="width:13%" />-->
<!--        </div>-->

        <div class="links">
            <ul>
                <li><a href="schedule.php">Schedule Leave</a></li><Br>
                <li><a href="view_history.php">View History</a></li><Br>
                <li><a href="apply_cancel.php">Apply/Cancel Leave</a></li><Br>
                <li><a href="leave_card.php">View Leave Card</a></li><Br>
            </ul>
        </div>
        
        
        <?php require_once('codeblocks/footer.php'); ?>

	</div>
<body>
</body>
</html>
