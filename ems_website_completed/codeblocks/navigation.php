<?php
    $parts = Explode('/', $_SERVER["PHP_SELF"]);
    $name=$parts[count($parts) - 1];
    $page_name = Explode ('.', $name);

    switch ($page_name[0]) {
        case "upload_doc" :
            $page_name[0]="document";
            break;
        case "view_doc":
            $page_name[0]="document";
            break;     
    }
    switch($page_name[0]){
        case "Personal_edit":
            $page_name[0]="Personal";
            break;
    }
    switch($page_name[0]){
        case "Employee_edit":
            $page_name[0]="Employee";
            break;
    }
    switch($page_name[0]){
        case "Contact_edit":
            $page_name[0]="Contact";
            break;
    }
    switch($page_name[0]){
        case "schedule":
            $page_name[0]="leave";
            break;
        case "view_history":
            $page_name[0]="leave";
            break;
        case "leave_card":
            $page_name[0]="leave";
            break;
    }
?>

<div class="container">
    
    <div class="navbar-header navbar-header-custom">
        <nav>
            <ul>
                <li><a id="Personal" href="Personal.php">Personal</a></li>
                <li><a id="Employee" href="Employee.php">Employement</a></li>
                <li><a id="Contact" href="Contact.php">Contact</a></li>
                <li><a id="leave" href="leave.php">Leave</a></li>
                <li><a id="document" href="document.php">Document</a></li>
            </ul>
        </nav>
    </div>                
</div>

<script>
var element = document.getElementById("<?php echo $page_name[0] ?>");
 element.classList.add("current-link-nav");
</script>