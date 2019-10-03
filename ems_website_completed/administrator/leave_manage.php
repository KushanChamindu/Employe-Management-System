<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>

<style>
    .formatForButton {
        background:#4f4b4c;
        color:white;
        padding:0.45%;
        width:7%
    }

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
        <div class="butn_group">
            <button type="button" id="approved" onclick="changeColorApprove();" class="btn btn-default">Approved</button>
            <button type="button" id="new" onclick="changeColorNew();" class="btn btn-default">New</button>
        </div>
        <div class="container-2" id="result"></div>
            
    </div>  
</body>
</html> 



<?php
    $conn = require_once("dbConfig.php");
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getLeaveID=1;
    $call=0;
    
    if (sizeof($str_arr)>1){
        $getLeaveID=$str_arr[1];
        $status=$str_arr[2];
        $call=$str_arr[3];
        $date=date("Y-m-d");
        $sql = "UPDATE leave_table SET status=$status,assesd_date='$date' WHERE leave_num=$getLeaveID";
        
        if ($conn->query($sql) === TRUE) {
            if($status==2){
                echo "Decline Leave successfully";
                $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status, leave_ID)
VALUES ('$getLeaveID', 'Your Leave has been declined on {$date} by admin.', 'unread', 'Leave Declined ', '4', '$getLeaveID')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
            }else{
                echo "Approve Leave successfully";
                $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status, leave_ID)
VALUES ('$getLeaveID', 'Your Leave has been Approved on {$date} by admin.', 'unread', 'Leave Approved ', '3', '$getLeaveID')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }

?>   

<script>
  function changeColorApprove(){
    document.getElementById('approved').className = 'formatForButton';
    document.getElementById('new').classList.remove("formatForButton");
    document.getElementById('new').className = 'btn btn-default';
  }
  function changeColorNew(){
    document.getElementById('new').className = 'formatForButton';
    document.getElementById('approved').classList.remove("formatForButton");
    document.getElementById('approved').className = 'btn btn-default';
  }
</script>

<script>
    $(document).ready(function(){
    var txt=$('#search_text').val();
    if(txt =='' && <?php echo $call;?>==0){
        $('#result').html('');
            $.ajax({
                url:"fetch_approved.php",
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
                url:"not_approved.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
    }
    })

    }

    $('#search_text').keyup(function(){
    txt = $(this).val();
    if(txt =='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch_approved.php",
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
                url:"approved_search.php",
                method:"post",
                data:{search:txt},
                dataType: "text" ,
                success: function(data){
                    $('#result').html(data);
                }
            });
        }
    });

    $('#new').click(function(){
    $('#result').html('');
        $.ajax({
            url:"not_approved.php",
            method:"post",
            success: function(data){
                $('#result').html(data);
            }
        });
        $('#search_text').keyup(function(){
        if(txt =='')
        {
            $('#result').html('');
            $.ajax({
                url:"not_approved.php",
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
                url:"new_request_search.php",
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

    $('#approved').click(function(){
    $('#result').html('');
        $.ajax({
            url:"fetch_approved.php",
            method:"post",
            success: function(data){
                $('#result').html(data);
            }
        });

    $('#search_text').keyup(function(){
    txt = $(this).val();
    if(txt =='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch_approved.php",
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
                url:"approved_search.php",
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

    $('#decline').click(function(){
    $('#result').html('');
        $.ajax({
            url:"includes/decline.php",
            method:"post",
            success: function(data){
                $('#result').html(data);
            }
        });
   
    });
   
});



</script>