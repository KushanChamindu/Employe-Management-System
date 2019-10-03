<?php
session_start();
if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php

$eid=$_POST["eid"];
//echo $eid; 
$uploadDir = '../../uploads/'; 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
if(true || isset($_POST['file'])){  
    $uploadStatus = 1;              
    $uploadedFile = ''; 
    if(!empty($_FILES["file"]["name"])){ 
                 
        // File path config 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $uploadDir . $fileName; 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
        // Allow certain file formats 
        $allowTypes = array('pdf', 'doc', 'docx','odp','ods','odt','ppt','pptx','txt','xls','xlsx'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to the server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                $uploadedFile = $fileName; 
            }else{ 
                $uploadStatus = 0; 
                $response['message'] = 'Sorry, there was an error uploading your file.'; 
            } 
        }else{ 
            $uploadStatus = 0; 
            $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
        } 
    } 
             
    if($uploadStatus == 1){ 
        // Include the database config file 
        include_once '../dbConfig.php'; 
                 
        // Insert form data in the database 
        $insert = $db->query("INSERT INTO document (employee_ID,file_name,file_type) VALUES ('".$eid."','".$uploadedFile."','".$fileType."')"); 
        
        $notify_sql="INSERT INTO msg_info (to_ID, message, type, subject, status) VALUES ('".$eid."', 'Admin has added a file-{$uploadedFile}.', 'unread', 'Admin has added a file.', '15')";
            if(!($db->query($notify_sql))){echo "Connection loss";}
        if($insert){ 
            $response['status'] = 1; 
            $response['message'] = 'Form data submitted successfully!';
        } 
    } 
         
     
}else{
    echo "fail";
} 
 
// Return response 
echo json_encode($response);