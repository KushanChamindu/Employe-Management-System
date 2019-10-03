<?php session_start();
$e_id_ses=$_SESSION["e_id"];
?>
<?php
    $conn =require_once("administrator/dbConfig.php");
    $sql = "SELECT file_type FROM document WHERE employee_ID='$e_id_ses'";
    $result = mysqli_query($conn, $sql);
    $types_ext = array("");
    while($row = mysqli_fetch_assoc($result)){
        array_push($types_ext,$row['file_type']); 
    }
    $dup_type=array_unique($types_ext);
    $allow_type = array_values($dup_type);
    //$types_ext = array('','pdf', 'doc', 'docx','odp','ods','odt','ppt','pptx','txt','xls','xlsx'); 
    $types = array('','pdf'=>'PDF', 'doc'=>'Microsoft Word', 'docx'=>'Microsoft Word (OpenXML)','odp'=>'Open Document presentation','ods'=>'Open Document spreadsheet','odt'=>'Open Document text','ppt'=>'Microsoft PowerPoint','pptx'=>'Microsoft PowerPoint (OpenXML)','txt'=>'Text','xls'=>'Microsoft Excel','xlsx'=>'Microsoft Excel (OpenXML)');
    $pages=sizeof($allow_type);
    $getType='';
    $current=1;
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);

    if (sizeof($str_arr)>1){      
        $getType=$str_arr[1];
        $current = array_search($getType, $allow_type);
    }
    
    $sql = "SELECT * FROM document  WHERE file_type='$getType' AND employee_ID='$e_id_ses'  ORDER BY doc_id DESC";
    $docs = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EMS - View Document</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link rel="stylesheet" type="text/css" href="CSS/view_doc.css">
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
<!--        </div>  -->
        
        <div class="view-content">
            <h3 class="title">View Document</h3>    
        
            <div class="no-margin" <?php if($pages == 0){ echo 'hidden';}?>>
                <div class="pagination text-small text-uppercase text-extra-dark-gray">
                    <ul class="no-margin">
                        <?php 
                            if($pages>1){
                                if($current>1){
                                    echo '<li ><a  href="view_doc.php?type='.$allow_type[($current-1)].'"><i class="fa fa-angle-double-left" style="font-size:25px;font-weight:bolder;"></i> </a></li>';
                                }else{
                                    echo '<li ><a  href="javascript:void(0)"><i class="fa fa-angle-double-left" style="font-size:25px;font-weight:bolder;"></i> </a></li>';
                                }
                            }else{
                                echo '<p style="margin-left:40px">No upload file here</p>';
                        } ?>


                    
                        <?php   
                       
                            if($pages>4 ){      
                                if($current==1 || $current==2){
                                    for ($x = 1; $x <4; $x++) {
                                        echo '<li ><a id="'.$allow_type[$x].'" href="view_doc.php?type='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }elseif ($current==($pages-2) || $current==$pages-1) {
                                    for ($x = $pages-3; $x <($pages); $x++) {
                                        echo '<li ><a id="'.$allow_type[$x].'" href="view_doc.php?type='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }else{
                                    for ($x = ($current-1); $x <($current+2); $x++) {
                                        echo '<li ><a id="'.$allow_type[$x].'" href="view_doc.php?type='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }
                            }else{
                                for ($x = 1; $x <$pages; $x++) {
                                    echo '<li ><a id="'.$allow_type[$x].'" href="view_doc.php?type='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                }
                            }
                            
                        ?>
                        <?php 
                            if($pages>1){
                                if($current<$pages-1){
                                    echo '<li ><a  href="view_doc.php?type='.$allow_type[($current+1)].'"><i class="fa fa-angle-double-right" style="font-size:25px;font-weight:bolder;"></i></a></li>';
                                }else{
                                    echo '<li ><a  href="javascript:void(0)"><i class="fa fa-angle-double-right" style="font-size:25px;font-weight:bolder;"></i> </a></li>';
                                }
                            } ?>


                    </ul>
                </div>
            </div>


            
            <?php
                while($row = mysqli_fetch_assoc($docs)){
            ?>
                    <div class="container-file">
                        <div class="AAA">
                            <a href="<?php echo 'uploads/'. $row['file_name'] ;?>"><img src="<?php echo 'img/icon/'.$getType.'.png' ;?>" width="90" height="100"></a>
                            <br><a class="name" href= "<?php echo 'uploads/'. $row['file_name'];?>" > <?php echo $row['file_name'];?> </a>
                        </div>
                                                       
                    </div>
            <?php
                }
            ?>
            
        </div>
        
        <?php //require_once('codeblocks/footer.php');?>

	</div>
<body>
</body>
</html>

<script>
var element = document.getElementById("<?php echo $getType ?>");
element.classList.add("current-link");
</script>