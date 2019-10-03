<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
<?php
    $conn =require_once("dbConfig.php");

    $getID=1;
    $getType='';
    $current=1;
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);

    if (sizeof($str_arr)==2){      
        $getID=$str_arr[1];

    }elseif(sizeof($str_arr)==3){
        $getID=$str_arr[1];      
        $getType=$str_arr[2];
    }

    $sql = "SELECT file_type FROM document WHERE employee_ID='$getID'";
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
    

    if(sizeof($str_arr)==3){
        $current = array_search($getType, $allow_type);
    }
    
    $sql = "SELECT * FROM document  WHERE file_type='$getType' AND employee_ID='$getID' ORDER BY doc_id DESC";
    $docs = mysqli_query($conn, $sql);
?>


<head>
<link rel="stylesheet" type="text/css" href="CSS/view_doc.css">
</head>


	<div class="wrapper">

        <div class="view-content">
            <h3 class="title">View Document</h3>    
        
            <div class="no-margin" <?php if($pages == 0){ echo 'hidden';}?>>
                <div class="pagination text-small text-uppercase text-extra-dark-gray">
                    <ul class="no-margin">
                        <?php 
                            if($pages>1){
                                if($current>1){
                                    echo '<li ><a  href="admin_view_doc.php?type='.$getID.'='.$allow_type[($current-1)].'"><i class="fa fa-angle-double-left" style="font-size:25px;font-weight:bolder;"></i> </a></li>';
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
                                        echo '<li ><a id="'.$allow_type[$x].'" href="admin_view_doc.php?type='.$getID.'='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }elseif ($current==($pages-2) || $current==$pages-1) {
                                    for ($x = $pages-3; $x <($pages); $x++) {
                                        echo '<li ><a id="'.$allow_type[$x].'" href="admin_view_doc.php?type='.$getID.'='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }else{
                                    for ($x = ($current-1); $x <($current+2); $x++) {
                                        echo '<li ><a id="'.$allow_type[$x].'" href="admin_view_doc.php?type='.$getID.'='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                    }
                                }
                            }else{
                                for ($x = 1; $x <$pages; $x++) {
                                    echo '<li ><a id="'.$allow_type[$x].'" href="admin_view_doc.php?type='.$getID.'='.$allow_type[$x].'">' . $types[$allow_type[$x]] . '</a></li>';                                   
                                }
                            }
                            
                        ?>
                        <?php 
                            if($pages>1){
                                if($current<$pages-1){
                                    echo '<li ><a  href="admin_view_doc.php?type='.$getID.'='.$allow_type[($current+1)].'"><i class="fa fa-angle-double-right" style="font-size:25px;font-weight:bolder;"></i> </a></li>';
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
                            <a href="<?php echo '../uploads/'. $row['file_name'] ;?>"><img src="<?php echo '../img/icon/'.$getType.'.png' ;?>" width="90" height="100"></a>
                            <br><a class="name" href= "<?php echo '../uploads/'. $row['file_name'];?>" > <?php echo $row['file_name'];?> </a>
                        </div>
                                                       
                    </div>
            <?php
                }
            ?>
            
        </div>
        

	</div>

<script>
var element = document.getElementById("<?php echo $getType ?>");
element.classList.add("current-link");
</script>