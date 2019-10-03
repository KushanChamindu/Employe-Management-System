<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
<?php

    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getID=1;
    if (sizeof($str_arr)>1){      
        $getID=$str_arr[1];
    }

    $conn=require_once('dbConfig.php');
    $sql = "SELECT * FROM employee WHERE employee_ID='$getID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" type="text/css" href="CSS/upload_doc.css">

<div class="detail">
            <form id="fupForm" enctype="multipart/form-data">
                <h3 class="title">Upload Document</h3><br>
                <div class="table-detail">
                    <table>
                        <col width="30">
                        <col width="180">
                        <col width="500">
                        <tr>
                            <td>01.</td>
                            <td>Employee ID</td>
                            <td><?php echo ': '.$row['employee_ID']; ?></td>
                        </tr>
                        <tr>
                            <td>02.</td>
                            <td>Employee Name</td>
                            <td><?php echo ': '.$row['Full_Name']; ?></td>
                        </tr><tr>
                            <td>03.</td>
                            <td>Destination</td>
                            <td><?php echo ': '.$row['Designation']; ?></td>
                        </tr><tr>
                            <td>04.</td>
                            <td>Department</td>
                            <td><?php echo ': '.$row['Department']; ?></td>
                        </tr><tr>
                            <td>05.</td>
                            <td>Added Date</td>
                            <td><?php echo ":  " . date("Y-m-d"); ?></td>
                        </tr><tr>
                            <td>06.</td>
                            <td>Type of Document</td>
                            <td>
                                <div class="form-group">
                                    <span id="type-file">:</span>
                                    <input type="file" id="file" name="file" style="display:none;" required />
                                </div>
                            </td>
                        </tr>
                    </table> 
                    <input type="hidden" id="eid" name="eid" value="<?php echo $getID;?>">
                </div>

            <div class="btn">
                <div class="add">
                    <button class="btn btn-lg btn-primary btn-circle"  onclick="thisBrowes();" ><i class="fa fa-plus"></i></button>
                </div>
                <br>
                <table class="btn-table">
                    <col width="70">
                    <col width="70">
                    <tr>
                        <td><button class="btn btn-lg btn-primary btn-circle" onClick="window.history.back()"><i class="fa fa-times"></i></button></td>
                        <td><button class="btn btn-lg btn-primary btn-circle" type="submit" id="submitBtn" name="submit" value="SUBMIT" onclick="thisFileUpload();"><i class="fa fa-arrow-right"></i></button></td>
                    </tr>
                </table>
            </div>
            </form>
        </div>

<script>
        function thisBrowes() {
            document.getElementById("file").click();
        };

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e){
        // Submit form data via Ajax
        $("#fupForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'includes/submit.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#submitBtn').attr("disabled","disabled");
                    $('#fupForm').css("opacity",".5");
                },
                success: function(response){ //console.log(response);
                    $('.statusMsg').html('');
                    if(response.status == 1){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                        location.href='documentManage.php';
                    }else{
                        $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    }
                    $('#fupForm').css("opacity","");
                    $("#submitBtn").removeAttr("disabled");
                }
            });
        });
    });
    $("#file").change(function() {
        var file = this.files[0];
        var fileType = file.type;
        document.getElementById("type-file").innerHTML  =": "+fileType;
    });

    // File type validation
    $("#file").change(function() {
        var file = this.files[0];
        var fileType = file.type;
        var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.oasis.opendocument.presentation', 'application/vnd.oasis.opendocument.spreadsheet','application/vnd.oasis.opendocument.text','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation','text/plain','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5])|| (fileType == match[6]) ||(fileType == match[7]) ||(fileType == match[8]) ||(fileType == match[9]) ||(fileType == match[10]) ||(fileType == match[11]) )){
            alert('Sorry, only PDF, DOC, Microsoft Word (OpenXML), OpenDocument presentation document, OpenDocument spreadsheet document, OpenDocument text document, Microsoft PowerPoint, Microsoft PowerPoint(OpenXML), Text files, Microsoft Excel, Microsoft Excel(OpenXML) are allowed to upload.');
            $("#file").val('');
            return false;
        }
    });
</script>
