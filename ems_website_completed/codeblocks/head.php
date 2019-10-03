<?php
if(!isset($_SESSION['username'])){
    header("Location :login.php");
}?>
<header>

    <div class="introduction">

        <div class="name"><?php echo $_SESSION['username']; ?></div>
        <div class="position"><?php echo $_SESSION['designation']; ?></div>

    </div>
</header>