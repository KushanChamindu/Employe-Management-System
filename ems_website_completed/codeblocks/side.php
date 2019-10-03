<?php
if(!isset($_SESSION['username'])){
    header("Location :login.php");
}?>
<aside>
    <div class="content">
        <br>
        <h5><?php echo $_SESSION['mobile']; ?></h5>
        <h5><?php echo $_SESSION['lanline']; ?></h5>
        <br>
        <h5><?php echo $_SESSION['email']; ?></h5>
        <br>
        <h5><span style="font-weight: bold; color: #285e8e;">Hire Date :</span></h5>
        <h5><?php echo $_SESSION['hireDate']; ?></h5>
        <br>
        <h5><?php echo $_SESSION['emp_type']; ?></h5>
        <h5><?php echo $_SESSION['emp_department']; ?></h5>

    </div>
</aside>