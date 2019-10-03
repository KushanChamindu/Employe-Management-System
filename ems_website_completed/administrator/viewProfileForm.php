<?php session_start(); ?>
<?php if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
} ?>
<?php
    $conn = require_once("dbConfig.php");
    
    $url=$_SERVER['REQUEST_URI'];
    $str_arr = explode ("=", $url);
    $getTID=1;
    if (sizeof($str_arr)>1){      
        $getTID=$str_arr[1];
    }

    $sql = "SELECT * FROM employee WHERE employee_ID='$getTID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>

<?php require_once("includes/admin_home_header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>

    <head>
        <title>EMS - View Profile</title>
        <link rel="stylesheet" type="text/css" href="css/schedule.css">
    </head>

        <div class="bootstrap-overrides" id="bootstrap-overrides">

                <div class="container-2" id="result">

                    <div class="wrapper">

                        <form  method="post">
                            <div class="table-detail-view">
                                <h3 class="title">View Profile</h3>
                                <table>
                                    <col width="30">
                                    <col width="180">
                                    <col width="600">
                                    <tr>
                                        <td>01.</td>
                                        <td>Employee ID</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['employee_ID'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>02.</td>
                                        <td>Title</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Title'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>03.</td>
                                        <td>Name</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Full_Name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>04.</td>
                                        <td>Date_Of_Birth</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Date_Of_Birth']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>05.</td>
                                        <td >Gender</td>
                                        <td >:&nbsp;&nbsp;&nbsp; <?php echo $row['Gender']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>06.</td>
                                        <td>NIC</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['NIC'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>07.</td>
                                        <td>Marital Status</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Marital_Status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>08.</td>
                                        <td>Nationality</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Nationality']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>09.</td>
                                        <td>Religion</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Religion']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Date Of Joinning</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Date_Of_Joinning'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Designation</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Designation']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Employee type</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Employee_type']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Department</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Department']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Address</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td >Country</td>
                                        <td >:&nbsp;&nbsp;&nbsp; <?php echo $row['Country']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>16.</td>
                                        <td>Phone</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>17.</td>
                                        <td>Mobile</td>
                                        <td>:&nbsp;&nbsp;&nbsp; <?php echo $row['Mobile']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>18.</td>
                                        <td >E_mail</td>
                                        <td >:&nbsp;&nbsp;&nbsp; <?php echo $row['E_mail']; ?> </td>
                                    </tr>
                                </table>
                                    
                                
                                <div class="btn-view-view">
                                    <button class="btn btn-lg btn-primary btn-circle-a" type=button  onClick="window.history.back()">Back</button>
                                </div>


                            
                            </div>
                        </form>


                    </div>

                </div>
            
        </div>  
    
    </body>
</html> 

    






