
<?php
if(!isset($_SESSION['e_id'])){
    header('Location: login.php');
}
if (isset($_POST['submit'])) {

    if(isset($_FILES['image']['name'])){
        if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
            echo "<script>alert('Error')</script>";
        }else{
            $name=addslashes($_FILES['image']['name']);
            $image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
            saveImage($name,$image);
            display();
        }
    }
    else{
        echo "<script>window.alert('Please Select a Picture From the Storage')</script>";
    }

}

function saveImage($name,$image){
    $e_id=$_SESSION['e_id'];
    $db=mysqli_connect('localhost','root','','ems_database');
    $query="UPDATE employee set image_name='$name',image='$image' where employee_ID='$e_id'";
    $result=mysqli_query($db,$query);
    mysqli_close($db);
}


function display(){
    $e_id=$_SESSION['e_id'];
    $db=mysqli_connect('localhost','root','','ems_database');
    $query= " select * from employee where employee_ID='$e_id'";
    $result=mysqli_query($db,$query);
    if( mysqli_num_rows($result) >0 ){
        $final=mysqli_fetch_array($result);
        $img=$final['image'];
        $_SESSION["image"]=$img;
        //
    }else{

    }

    mysqli_close($db);

}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    [type="file"] {
    height: 0;
    overflow: hidden;
    width: 0;
    }
    .input_label{
        background-color: #245580;
        color: white;
        font-weight: bold;
    }
    .submit_button{
        position: absolute;
        
    }
    .input_label:hover{
        background-color:#245581;
        color: white;
        font-weight: bold;
    }
    .submit_button:hover{
        position: absolute;
    }
    a.selected {
  background-color:#1F75CC;
  color:white;
  z-index:100;
}

.messagepop {
  cursor:default;
  display:none;
  margin-top: 10px;
  position:absolute;
  margin-top:28%;
  margin-left:30%;
}
</style>
<div class="insert_image"
     style="position: absolute; top: 75px; left: 50px; height: 250px; width: 200px;float: left;">
    <p class="messagepop pop"><i class="fa fa-camera" style="font-size:80px;color:rgb(102, 102, 170); border:1px black solid;"></i></p>
    <form method="post" enctype="multipart/form-data">
        <?php
        if(isset($_SESSION['image'])){
            echo '<img id="image_div" style="width:200px; height:200px;border-radius:50%; margin-bottom:5px;" src="data:image;base64,'.$_SESSION['image'].'" />';
        }else{
            echo '<img id="image_div" src="../img/profile_img/img1.png" style="width:200px; height:200px; border-radius:50%;" />';
        }
//        echo '<img style="width:200px; height:200px; border-radius:50%;" src="data:image;base64,'.$_SESSION['image'].'">';

        ?>
        
        <div style="margin-left: 30px;" id="button_div">
            <span class="input_label btn" id="span_input" onclick="browserclick();"><i class="fa fa-image" style="font-size:17px"> Select Image</i></span>
            <input  type="file" name="image" id="image" style="display:block">
            <button class="input_label btn btn-inverse navbar-btn submit_button" type="submit" name="submit" id="submit" style="display:none"><i class="fa fa-cloud-upload" style="font-size:17px"></i> Upload</button>
        </div>
    </form>
</div>
<script>
    function browserclick(){
        document.getElementById("image").click();
        document.getElementById("submit").style.display="block";
        document.getElementById("span_input").style.display="none";
    }
$(document).ready(function () {
    $('#submit').click(function () {
        var image_name= $('#image').val();
        if (image_name ==''){
            alert("Please Select Image");
            return false;
        }else{
            var extention = $('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extention,['gif','png','jpg','jpeg']) == -1){
                alert('Invalid Image File');
                $('#image').val('');
                return false;
            }
        }
    });
    
    $('#image_div').hover(function () { // Or bind to any other event you like, or call manually

    var $t = $('#image_div');
    var $div=$("#span_input");

    if ($t.is(':hover')) {
        $div.css('background', 'green');
        // Other stuff to do on slideUp
    } else {
        $div.css('background',"#245581");
        // Other stuff to down on slideDown
    }
  });   
    
    function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });    
}

    $(function() {
  $('#image_div').hover(function() {
    if($(this).hasClass('selected')) {
      deselect($(this));               
    } 
          else {
          $(this).addClass('selected');
          $('.pop').slideFadeToggle();
        }
    return false;
  });
});

    $.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};
});
</script>
