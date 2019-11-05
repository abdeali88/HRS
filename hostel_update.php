<?php
session_start();
if(!isset($_SESSION['manager_email'])){
    $_SESSION['msg']="You must log in to view this page";
    header('location:manager_page.php');
}
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "hrs";
	$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

	if(isset($_POST['register_manager']))
{
    $man_name =  $_SESSION['manager_name'];
    $man_email =$_SESSION['manager_email'];
    $reg_no = $_SESSION['reg_no'];

    $hostel_contact = mysqli_real_escape_string($conn, $_POST['hostel_contact']); 
    $fees = mysqli_real_escape_string($conn, (int)$_POST['fees']); 
    $floors = mysqli_real_escape_string($conn,(int)$_POST['floors']); 
    $rooms = mysqli_real_escape_string($conn, (int)$_POST['rooms']); 
    $capacity = mysqli_real_escape_string($conn, (int)$_POST['capacity']); 

    $mess = isset($_POST['mess']) ? 1 : 0;
    $gym = isset($_POST['gym']) ? 1 : 0;
    $wifi = isset($_POST['wifi']) ? 1 : 0;
    $bank = isset($_POST['bank']) ? 1 : 0;
    $medical = isset($_POST['medical']) ? 1 : 0;
    $telephone = isset($_POST['telephone']) ? 1 : 0;
    $amphi = isset($_POST['amphi']) ? 1 : 0;
    $transport = isset($_POST['transport']) ? 1 : 0;
    $laundry = isset($_POST['laundry']) ? 1 : 0;
    $reading = isset($_POST['reading']) ? 1 : 0;

    $other_facilities = mysqli_real_escape_string($conn, $_POST['other_facilities']); 
    
    $errors=array();

    if(mysqli_connect_error()){
        die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
        $mul_hostel_contact = "SELECT * FROM hostel WHERE hostel_contact='$hostel_contact'";

        $results_2 = mysqli_query($conn,$mul_hostel_contact);

        if(mysqli_num_rows($results_1)>0)
        {
            array_push($errors,"Registration Number is already taken");
            ?> <script> alert("Hostel Registration Number is already Registered!");</script> <?php   
        }
    

        $targetDir = "uploads/";
        $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';


    if(!empty(array_filter($_FILES['files']['name']))){
        if(count($errors)==0){
    
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                }else{
                    array_push($errors,"Error in uploading Image");
                    ?><script>alert("Error in uploading Image!");</script><?php
                    // $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                array_push($errors,"FileType is invalid");
                ?><script>alert("INVALID Image Type!");</script><?php
                // $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
    }
        
        if(!empty($insertValuesSQL) && count($errors)==0){
            // Insert image file name into database
            $insertValuesSQL = trim($insertValuesSQL,',');
            $insert = $conn->query("UPDATE images set file_name='$fileName' , uploaded_on=NOW() where reg_no=$reg_no");
            if($insert){
                // $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                // $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                // $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                // $statusMsg = "Files are uploaded successfully.".$errorMsg;
              
                    $insert_hostel = "UPDATE hostel SET hostel_contact='$hostel_contact',floors='$floors',capacity='$capacity',no_of_rooms='$rooms',fees='$fees',mess='$mess',wifi='$wifi',gym='$gym',bank='$bank',medical='$medical',telephone='$telephone',amphi='$amphi',transport='$transport',laundry='$laundry',study='$reading',facilities='$other_facilities'";
                    mysqli_query($conn,$insert_hostel);
                    header('location:manager_dashboard.php');
            }else{
                // $statusMsg = "Sorry, there was an error uploading your file.";
                array_push($errors,"ERROR in uploading file");
                ?><script>alert("There was an error uploading your file!");</script><?php    
            }
        }
    }else{
        // $statusMsg = 'Please select a file to upload.';
        array_push($errors,"No file selected");
        ?><script>alert("Please select a file to upload!");</script><?php
    }
    
    }
}
	
?>

<!DOCTYPE html>
<html>

<head>
    <title>HOSTEL Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/manager_page.css">

    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="CSS/font-awesome.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="first-image navbar-color">
    <nav class="navbar navbar-expand-lg navbar-light static-top" style="background: rgba(0,0,0,0.7);">
            <div class="container">
                <a class="navbar-brand navbar-img" href="home_page_1.php">
                    <img src="img/hotel.png">&nbsp; Hostel Guru
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home_page_1.php">HOME</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="hostel_page.php">HOSTELS
                                    <span class="sr-only">(current)</span>
                            </a>
                        </li>
                     
                        <?php
                            if(isset($_SESSION['manager_email']))
                            {
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='manager_dashboard.php'>DASHBOARD</a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' id='logout' value='Logout' name='logout_manager' href='logout_manager.php'>LOGOUT</a>";
                                echo "<script type='text/javascript'>";
                                echo "document.getElementById('logout').onclick = function ()";
                                {
                                    echo 'location.href = "logout_manager.php"';
                                }
                                echo "</script>";
                                echo "</li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='user_page.php'>USER</a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link' href='manager_page.php'>MANAGER</a>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!---------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="full-center">


            <div class="container ">
                <div class="row ">
                    <div class="col-md-12">
                        <h3 class="mb15" style="font-family:'Acme';">Hostel Details</h3>
                        <form method="POST" action="single_hostel.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5"><i class="fa fa-phone input-icon input-icon-show"></i>
                                <label>Contact</label>
                                <input id="contact" name="hostel_contact" class="form-control" type="text" pattern="[7-9][0-9]{9}" placeholder="Hostel Contact Number" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"><i class="fa fa-users input-icon input-icon-show"></i>
                                <label>Capacity</label>
                                <input id="capacity" name="capacity" class="form-control" type="text"  placeholder="Hostel Capacity" required>
                            </div>
                    	</div>
                    	<br>
                        <div class="row">
                            <div class="col-md-5"><i class="fa fa-rupee input-icon input-icon-show"></i>
                                <label>Fees</label>
                                <input id="fees" name="fees" class="form-control" type="text" placeholder="Hostel Fees (Annual)" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"><i class="fa fa-building-o input-icon input-icon-show"></i>
                                <label>Floors</label>
                                <input id="floors" name="floors" class="form-control" type="number" placeholder="Number of Floors" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5"><i class="fa fa-building-o input-icon input-icon-show"></i>
                                <label>Rooms</label>
                                <input id="rooms" name="rooms" class="form-control" type="number" placeholder="Number of Rooms" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"></div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-5" style="margin-top: 20px; margin-left: -11px">
                            <table>
                                <th style="color:rgb(235, 171, 44); font-size: 16px;">
                                    <i class="fa fa-bed input-icon input-icon-show"></i>
                                    <label>Facilities</label>
                                </th>
                                <tr>
                                    <td>
                                        <label class="container-checkbox">Mess/Canteen
                                        <input id="mess" name="mess" type="checkbox" class="custom-control-input">
                                        <span class="checkmark"></span>
                                        </label>

                                    </td>
                                    <td></td>
                                    <td>
                                        <label class="container-checkbox">Gym and Fitness Center
                                        <input id="gym" name="gym" type="checkbox" class="custom-control-input">
                                        <span class="checkmark"></span>
                                        </label>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container-checkbox">WiFi
                                        <input id="wifi" name="wifi" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td></td>
                                    <td>
                                        <label class="container-checkbox">Bank and ATM
                                        <input id="bank" name="bank" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container-checkbox">Medical Room
                                        <input id="medical" name="medical" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td></td>
                                    <td>
                                        <label class="container-checkbox"> STD/ISD Telephone
                                        <input id="telephone" name="telephone" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container-checkbox">Amphitheatre
                                        <input id="amphi" name="amphi" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td></td>
                                    <td>
                                        <label class="container-checkbox">Transportation
                                        <input id="transport" name="transport" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container-checkbox">Laundry Room
                                        <input id="laundry" name="laundry" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td><pre>___________</pre></td>
                                    <td>
                                        <label class="container-checkbox">Study/Reading Room
                                        <input id="study" name="reading" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>

                            <div class="col-md-2"></div>
                                <div class="col-md-5" style="margin-left: 10px;">
                                    <br><br><br>
                                    <textarea class="form-control" name="other_facilities" id="other_facilities" rows="8" placeholder="Other Facilities"></textarea>
                                </div>
                            </div>
                        

                        <div class="row">
                            <br>
                            <div class="col-md-5">
                                <i class="fa fa-picture-o input-icon input-icon-show"></i>
                                <label style="font-weight: bold">Hostel Images</label>
                                <div class="custom-file" id="customFile">
                                    <input type="file" name="files[]" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">
                                           Select file...
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-5">
                                <br>
                                <div class="form-group">
                                    <input class="btn btn-info" name="register_manager" type="submit" value="Update">
                                    <input class="btn btn-info" type="reset" value="Clear" style="margin-left: 20px; padding: 6px 18px">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer id="main-footer">
        <div class="container">
            <div class="row ">
                <div class="col-md-3">

                    <p class="text-3">Booking, reviews and advices on hostels and lots more!</p>
                    <ul class="icon-list icon-color">
                        <li>
                            <a class="fa fa-facebook fa-lg icon-color" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-twitter fa-lg icon-color" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-google-plus fa-lg icon-color" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-linkedin fa-lg icon-color" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-pinterest fa-lg icon-color" href="#"></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4 class="text-4">Newsletter</h4>
                    <form>
                        <label>Enter your E-mail Address</label>
                        <input type="text" class="form-control">
                        <p class=""><small>*We Never Send Spam</small>
                        </p>
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
                <div class="col-md-2">
                    <ul class="icon-list text-3">
                        <li><a href="#">About US</a>
                        </li>
                        <li><a href="#">Press Centre</a>
                        </li>
                        <li><a href="#">Travel News</a>
                        </li>
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                        <li><a href="#">Feedback</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 ">
                    <h4 class="text-4">Have Questions?</h4>
                    <h4 class="text-4">+91-8237252000</h4>
                    <h4><a href="#" class="text-4">support@hostelguru.com</a></h4>
                    <p>24/7 Dedicated Customer Support</p>
                </div>

            </div>
        </div>
    </footer>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/custom/manager.js"></script>

</body>

</html>