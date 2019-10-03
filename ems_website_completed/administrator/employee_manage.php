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
        <div class="container-1 grouping">
            <br>
            <div class="form-group">
                <div class="input-group search-bar">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search..." class="form-control" />
                </div>
            </div>
            <br>
        </div>
        <div class="">
            <button type="button" id="add" class="btn btn-default" onclick="window.location.href='addEmployee.php'">Add</button><br><br><br>
        </div>

        <div class="container-2" id="result"></div>

            
    </div>  
</body>
</html>

<?php
    $conn = require_once("dbConfig.php");
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getID=1;
    
    if (sizeof($str_arr)>1){
        $getID=$str_arr[1];
        $sql = "DELETE FROM employee WHERE Num_Employee=$getID";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();

    }

?>  

<script>
    $(document).ready(function(){
    var txt=$('#search_text').val();
    if(txt ==''){
        $('#result').html('');
            $.ajax({
                url:"fetch_admin_home_not_search.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
    }
    });
    }

    $('#search_text').keyup(function(){
    txt = $(this).val();
    if(txt =='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch_admin_home_not_search.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
                }
            });
        }else{
            $('#result').html('');
            $.ajax({
                url:"fetch_admin_home.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
                }
            });
        }
    });
    
});
</script>

