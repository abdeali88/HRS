
<?php
session_start();
if(isset($_SESSION['manager_email'])){
    echo "<script>alert('Managers cannot reserve hostels')";
    header('location:hostel_page.php');
}
if(!isset($_SESSION['user_email'])){
    header('location:user_page.php');
}
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}


$id=$_GET['id'];
$email = $_SESSION['user_email'];
// echo "$id";
 
$qu = "SELECT * from student_regd where email='$email'";
$res = mysqli_query($conn,$qu);
$rows = mysqli_fetch_assoc($res);
if(!empty($rows)){
    echo "<script> alert('You have already Registered for a hostel')</script>";
    
}


    if(isset($_POST['register_student'])){
        $aadhaar = $_POST['aadhaar'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $institute = $_POST['institute'];
        $degree = $_POST['degree'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $targetDir = "uploads/";
        $allowTypes = array('jpg','png','jpeg','gif');


    if(!empty($_FILES['files']['name'])){
    
            $fileName = basename($_FILES['files']['name']);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)){
                    $url = array( 
                        'id' => $id, 
                        'aadhaar' => $aadhaar, 
                        'contact' => $contact, 
                        'address' => $address,
                        'institute'=> $institute,
                        'degree'=> $degree,
                        'course'=> $course,
                        'year'=> $year,
                        'start'=> $start,
                        'end'=> $end,
                        'file_name'=> $fileName,
                    ); 
                    $url=http_build_query($url);
                    header("location:payment_page.php?$url");
                   
                }else{

                    ?><script>alert("Error in uploading Image!");</script><?php
                    // $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
            
                ?><script>alert("INVALID Image Type!");</script><?php
                // $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
    }else{
        // $statusMsg = 'Please select a file to upload.';
        ?><script>alert("Please select a file to upload!");</script><?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hostel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style>
.first-image {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background: url('img/logg.jpg');
    z-index: 1;
}
.full-center {
    color: rgb(233, 176, 61);
    padding-bottom: 100px;
    padding-top: 70px;
}

.navbar-img {
    text-shadow: 0.5px 0.5px #D79E30;
    font-size: 30px;
    font-family: 'Lobster', cursive;
    color: rgb(209, 171, 96) !important;
}

.navbar-img img {
    float: left;
    height: 45px;
    width: 50px;
}

.navbar-color li a {
    font-family: 'Acme', sans-serif;
    font-size: 20px;
    color: #D79E30 !important;
}

footer#main-footer {
    background: #262626;
    padding: 60px 0 30px 0;
    color: #e6e6e6;
    font-size: 11px;
    line-height: 1.4em;
}

.text-4 {
    font-family: 'Lobster', cursive;
    text-decoration: none;
    font-size: 28px;
}

.text-3 {
    padding-top: 20px;
    color: #FAFAFA;
    font-size: 13px;
}

.icon-list {
    list-style-type: none;
    text-decoration: none;
}

.icon-color {
    color: #FF8F00;
}

.icon-list li {
    float: left;
    padding: 10px;
}




</style>
</head>

<body>
<div class="first-image navbar-color">
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background:rgba(0,0,0,0.7);">
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
                                elseif(isset($_SESSION['user_email'])){
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='user_dashboard.php'>DASHBOARD</a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' id='logout' value='Logout' name='logout_user' href='logout_user.php'>LOGOUT</a>";
                                echo "<script type='text/javascript'>";
                                echo "document.getElementById('logout').onclick = function ()";
                                {
                                    echo 'location.href = "logout_user.php"';
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
   
    <br>
<br>

<!-------------------------------CONTENT---------------------------------------->
<div class="full-center">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12">
                        <h3 class="mb15">Personal Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Details</h3>
                        <form method="POST" action="register_user.php?id=<?php echo $id?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5"><i class="fa fa-address-card input-icon input-icon-show"></i>
                                <label>Aadhaar Card Number</label>
                                <input id="aadhaar" name="aadhaar" pattern="[0-9]{12}" class="form-control" placeholder="Aadhaar Number" type="text" required>
                            </div>

                            <div class="col-md-2"></div>

                            <div class="col-md-5"><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>Institue Name</label>
                                <input id="institute" name="institute" class="form-control" placeholder="School or College Name" type="text" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5"><i class="fa fa-phone input-icon input-icon-show"></i>
                                <label>Contact</label>
                                <input id="user_contact" name="contact" class="form-control" type="text" pattern="[7-9][0-9]{9}" placeholder="Contact Number" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"><i class="fa fa-graduation-cap input-icon input-icon-show"></i>
                                <label>Degree</label>
                                <input id="degree" name="degree" class="form-control" type="text" placeholder="Degree name" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-5"><i class="fa fa-map-marker input-icon input-icon-show"></i>
                                <label>Address</label>
                                <input id="address" name="address" class="form-control" type="text" placeholder="Residential Address" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"><i class="fa fa-graduation-cap input-icon input-icon-show"></i>
                                <label>Course</label>
                                <input id="course" name="course" class="form-control" type="text" placeholder="Course name" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <br>
                            <div class="col-md-5">
                                <i class="fa fa-picture-o input-icon input-icon-show"></i>
                                <label style="font-weight: bold">Student Photo</label>
                                <div class="custom-file" id="customFile">
                                    <input type="file" name="files" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
                                    <label class="custom-file-label" for="exampleInputFile">
                                           Select file...
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5"><i class="fa fa-graduation-cap input-icon input-icon-show"></i>
                                <label>Year</label>
                                <input id="year" name="year" class="form-control" type="text" placeholder="Year of study" required>
                            </div>
                        </div><br>
                        <div class="row">
                        <div class="col-md-5">
                                    <i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label>Check in year</label>
                                    <input id="Check_in"  class="form-control " name="start" type="date" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                            <i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                            <label>Check out year</label>
                                    <input id="Check_out"  class="form-control" name="end" type="date" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-5">
                                <br>
                                <div class="form-group">
                                    <input class="btn btn-info" name="register_student" type="submit" value="Proceed to Pay">
                                    <input class="btn btn-info" type="reset" value="Clear" style="margin-left: 20px; padding: 6px 18px">
                                </div>
                            </div>
                        </div>

                        </form>              
                    </div>
                </div>
            </div>
    </div>
<!-------------------------------CONTENT END---------------------------------------->

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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/custom/home.js" type="text/javascript">
    </script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
