<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $parts = Explode('/', $_SERVER["PHP_SELF"]);
    $name=$parts[count($parts) - 1];
    $page_name = Explode ('.', $name);

    switch ($page_name[0]) {
        case "admin_upload_doc" :
            $page_name[0]="documentManage";
            break;
        case "admin_view_doc":
            $page_name[0]="documentManage";
            break;
        case "editProfileForm" :
            $page_name[0]="employee_manage";
            break;
        case "viewProfileForm":
            $page_name[0]="employee_manage";
            break;     
    }
?>
<link rel="stylesheet" type="text/css" href="CSS/pec.css">
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">EMS-website</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="admin_home_search"><a  href="admin_home_search.php">Home</a></li>
      <li id="employee_manage"><a  href="employee_manage.php">Employee Manage</a></li>
        <li id="leave_manage"><a  href="leave_manage.php">Leave Manage</a></li>
        <li id="documentManage"><a  href="documentManage.php">Document Manage</a></li>
      <li id="admin_changePassword" ><a  href="admin_changePassword.php">Change Password</a></li>
      </ul>
      <ul class="nav navbar-nav notification-icon">
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"></span></a>
				<ul class="dropdown-menu dropdown-menu-right" style="width:400px; max-height: 500px; overflow:auto;"></ul>
        </li>
        </ul>
      <a style="text-decoration: none;" href="admin_logout.php"><button class="navbar-right btn btn-inverse navbar-btn ">LogOut</button></a>

  </div>
</nav>

</div>
<script src="js/admin_notification_script.js"></script>
<script>
var element = document.getElementById("<?php echo $page_name[0] ?>");
element.classList.add("active");
</script>
