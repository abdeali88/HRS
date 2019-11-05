<?php
session_start();
if(!isset($_SESSION['user_email'])){
    $_SESSION['msg']="You must log in to view this page";
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
?>


<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/user_dashboard.css"> -->
    <!-- <link href="css/googleapis1.css" type="text/css" rel="stylesheet">
    <link href="css/googleapis2.css" type="text/css" rel="stylesheet">
    <link href="css/googleapis3.css" type="text/css" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link href="css/googleapis4.css" type="text/css" rel="stylesheet">
    <link href="css/googleapis5.css" type="text/css" rel="stylesheet">
    <link href="css/fam.css" type="text/css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->

    <style>
.first-image {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background: url('img/log.jpg');
    z-index: 1;
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
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel-item{
    text-align: center;
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.bs-example{
	margin: 20px;
}
table { border-collapse: separate; border-spacing: 20px; }


</style>

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
                        <li class="nav-item">
                            <a class="nav-link" href="hostel_page.php">HOSTELS</a>
                        </li>
                        
                        <?php
                            if(isset($_SESSION['user_email']))
                            {
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

    <?php
        $email = $_SESSION['user_email'];
        
        $query = "SELECT * from student_regd WHERE email='$email'" ;
        $results = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($results)>0)
        {
            //if user has already registered for a hostel
            if(isset($_SESSION['already_registered'])){
                ?> 
                <div class="container">
                <h3 style="color:red;">Dear User You have Already Registered for a Hostel!</h3>
                </div>
                <?php
               unset($_SESSION['already_registered']);
                
            }
            $user_rows = $results->fetch_array();
            $user_name = $_SESSION['user_name'];
            $contact = $user_rows['contact'];
            $aadhaar = $user_rows['aadhaar'];
            $address = $user_rows['address'];
            $institute = $user_rows['institute'];
            $degree = $user_rows['degree'];
            $course = $user_rows['course'];
            $year = $user_rows['year'];
            $reg_no = $user_rows['reg_no'];

            $query_1 = "SELECT * from hostel WHERE reg_no='$reg_no'" ;
            $results_1 = mysqli_query($conn,$query_1);
            $hostel_rows = $results_1->fetch_array();

            $hostel_name = $hostel_rows['hostel_name'];
            $hostel_address = $hostel_rows['address'];
            $city = $hostel_rows['city'];
            $hostel_contact = $hostel_rows['hostel_contact'];
            $manager_email = $hostel_rows['man_email'];
            $check_in = $user_rows['check_in'];
            $check_out = $user_rows['check_out'];
            
            $d1 = new DateTime($check_in);
            $d2 = new DateTime($check_out);
            $diff = $d2->diff($d1);

            $fees = $hostel_rows['fees'];
            $total = ((int)$fees*(int)$diff->y) + (((int)$fees/12)*(int)$diff->m);
            $total = (int)$total;



            ?>
            <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <h1>Personal Detalils</h1>
                    <table style="font-family: 'Acme', sans-serif; font-size:20px;border-collapse: separate; border-spacing: 20px;">
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $user_name?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['user_email']?></strong></td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td><?php echo $contact?></td>
                    </tr>
                    <tr>
                        <td>Aadhaar:</td>
                        <td><?php echo $aadhaar?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $address?></td>
                    </tr>
                    <tr>
                        <td>Institue:</td>
                        <td><?php echo $institute?></strong></td>
                    </tr>
                    <tr>
                        <td>Degree:</td>
                        <td><?php echo $degree?></td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td><?php echo $course?></td>
                    </tr>
                </table>

                </div>

                <div class='col-md-2'></div>

                <div class='col-md-6'>
                    <h1>Hostel Details</h1>
                    <table style="font-family: 'Acme', sans-serif; font-size:20px;border-collapse: separate; border-spacing: 20px;">
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $hostel_name?></td>
                    </tr>
                    <tr>
                        <td>Manager Email:</td>
                        <td><?php echo $manager_email?></strong></td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td><?php echo $hostel_contact?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $hostel_address?></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><?php echo $city?></strong></td>
                    </tr>
                    <tr>
                        <td>Check In:</td>
                        <td><?php echo $check_in?></td>
                    </tr>
                    <tr>
                        <td>Check Out:</td>
                        <td><?php echo $check_out?></td>
                    </tr>
                    <tr>
                        <td>Fees Paid:</td>
                        <td><i class="fa fa-rupee"></i><?php echo $total?></td>
                    </tr>
                </table>

                </div>

            </div>
            </div>
            <?php
        }
        else{
    ?>
    <div class="row" style="text-align: center" >
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="text-center image-title">
                    <div class="text-title col-md-12">
                        <h4 class="animated fadeInUp">Dear <?php echo $_SESSION['user_name']?><br>You haven't registered for any hostels yet &#128559</h4>
                    </div>
                </div>
            </div>
        </div>
<br>
    </div>
    <br>
    <div class="row" style="text-align: center" >
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="text-center image-title">
                <div class="text-title col-md-12">
                    <h4>100s of hostels completely based on your preferences &#128522</h4>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div style="text-align: center" position='absolute'>
        <button type="button" class="btn btn-warning btn-lg button" style="align" onclick="window.location.href = 'hostel_page.php'">Search Now</button>
    </div>

    <div></div>
    <br><br><br><br><br><br>

    <?php
        }
    ?>
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
                        <p class=""><small>*We Never Send Spam</small></p>
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
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/custom/home.js" type="text/javascript">
    </script>
    <script src="js/bootstrap.js"></script>
</body>
</html>