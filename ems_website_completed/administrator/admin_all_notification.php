<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>

<style>
    .clickableRaw:hover{
        background: #dadada ;
    }

</style>

<div id="bootstrap-overrides">
        <br>
        <br>
        <div class="container-2" style="white-space: normal;" id="result"></div>
            
    </div>  
</body>
</html> 

<script>
    $(document).ready(function(){
    var txt='';
   
    if(txt ==''){
        $('#result').html('');
            $.ajax({
                url:"fetch_admin_all_notification_not_search.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
    }
    });
    }

});
</script>

