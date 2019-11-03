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
$aadhaar = $_GET['aadhaar'];
$contact = $_GET['contact'];
$address = $_GET['address'];
$institute = $_GET['institute'];
$degree = $_GET['degree'];
$course = $_GET['course'];
$year = $_GET['year'];
$file_name = $_GET['file_name'];

$hostel = $conn->query("SELECT * from hostel where reg_no=$id");
$row_hostel = $hostel->fetch_assoc();

$image = $conn->query("SELECT * from images where reg_no=$id limit 1");
$row_image = $image->fetch_assoc();
$imageURL = 'uploads/'.$row_image["file_name"];

$start = $_GET['start'];
$end = $_GET['end'];
$d1 = new DateTime($start);
$d2 = new DateTime($end);
$diff = $d2->diff($d1);

$fees = $row_hostel['fees'];
$total = ((int)$fees*(int)$diff->y) + (((int)$fees/12)*(int)$diff->m);
$total = (int)$total;

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
    'file_name'=> $file_name,
); 
$url=http_build_query($url);

// $users = $conn->query("SELECT * from users where e_mail=$email");
// $row_user = $users->fetch_assoc();





if(isset($_POST['pay'])){
    
    $query = "INSERT INTO student_regd(aadhaar,email,address,contact,institute,degree,course,amount,year,file_name,reg_no,check_in,check_out) values('$aadhaar','$email','$address','$contact','$institute','$degree','$course','$total','$year','$file_name','$id','$start','$end')";
    $conn->query($query);
    echo "<script>alert('Payment Successful!')</script>";
    header('location:user_dashboard.php');
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
    background: url('img/log3.jpg');
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

.btn-mr {
    margin-left: 14px;
}

.paybox {
    box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.15);
    margin-top: 30px;
}

.paybox1 {
    box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.15);
}

.paybox2 {
    box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
    border-top: 1px solid #FF6D00;
}

.paybox3 {
    box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid #FF6D00;
}

.search {
    border: 1px solid #FF6D00;
}

.margin-botom {
    margin-bottom: 20px;
    margin-top: 50px;
}

.pay-head {
    background-color: #E0E0E0;
    padding: 3px 0px 3px 0px;
}

.img-sz {
    width: 30%;
    height: 100px;
    float: left;
    margin-left: 5px;
}

.img-sz1 {
    width: 45%;
    height: 100px;
    float: left;
    margin-left: 5px;
}

.payment-title {
    float: left;
    margin-left: 15px;
    text-decoration: none;
}

.star1 {
    float: left;
    color: #333333;
    margin-left: -25px;
}

.list-list {
    margin: 15px;
}

.float {
    float: left;
    display: block;
    margin-right: 15px;
}

.arrow-position {
    margin-top: 5px;
}

.day {
    font-size: 12px;
    margin-bottom: 2px;
    line-height: 1em;
    color: #7a7a7a;
    margin-bottom: 15px;
}

.day1 {
    font-size: 12px;
    line-height: 1em;
    color: #7a7a7a;
    margin-bottom: 15px;
    margin-left: 95px;
}



.mony-mr {
    margin-left: 100px;
}

.x {
    position: absolute;
    bottom: 2px;
    left: 0;
    display: block;
    text-align: center;
    font-size: 10px;
    line-height: 1em;
    width: 100%;
}

.item-box {
    box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding-bottom: 10px;
}

.icon-box {
    width: 15%;
}

.mhd {
    margin-right: 10px;
}

.flit-search {
    margin-top: 35px;
    border: 1px solid #FF6D00;
    box-shadow: 0 2px 1px rgba(2, 3, 3, 0.4);
    padding-bottom: 20px;
    border-radius: 10px;
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
        <!---------------------------------------------------------------------------------------------------------------------------------------------->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <img class="paypal" src="img/paypal.png" width="100%" height="45%" alt="Image Alternative text" title="Image Title">
                            <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p><input class="btn btn-info" name="paypal" type="submit" value="Checout via Paypal">
                        </div>

                        <div class="col-md-6">
                            <h4>Pay via Credit/Debit Card</h4>
                            

                            <form name="paymentform1" action="payment_page.php?<?php echo $url?>" method="POST">
                                <div class="clearfix">
                                    <div class="form-group col-md-7">
                                        <label>Card Number</label>
                                        <input id="cardnumber" class="form-control"  pattern="[0-9]{12}" placeholder="xxxx xxxx xxxx xxxx" type="text" required>
                                        <span class=""></span>  
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>CVV</label>
                                        <input id="cvv" class="form-control" pattern="[0-9]{3}" placeholder="xxx" type="text" required>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="form-group col-md-7">
                                        <label>Cardholder Name</label>
                                        <input id="cardholdnum"  class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label> Expiry</label>
                                        <input id="valid" class="form-control" placeholder="mm/yy" type="text" required>
                                    </div>
                                </div>

                                <input class="btn btn-info btn-mr" name="pay" type="submit" value="Proceed Payment">
                            </form>
                        </div>
                    </div>
                </div>



                <div class="col-md-4" >
                    <div class="paybox">
                        <div class=" clearfix pay-head">
                            <a class="" href="#">
                                <img class="img-responsive img-thumbnail img-sz" src="<?php echo $imageURL?>" alt="Image Alternative text">
                            </a>
                            <h5 style="margin-top:29px;" class="payment-title"><a href="hostel.php?id=<?php echo $id?>"><?php echo $row_hostel['hostel_name']?></a></h5>
                            <!-- <div class="" >
                                
                                <ul class=" main-ul   icon-list   star1">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                        <div class="col-md-12 paybox1" >

                            <h5 style="margin-top:10px">Booking for <?php echo $diff->y?> year and <?php echo $diff->m?> month</h5>
                            <div class="float">
                                <p class=""><?php echo $start?></p>
                            </div><i class="fa fa-arrow-right float arrow-position"></i>
                            <div class="">
                                <p class=""><?php echo $start?></p>
                            </div>

                        </div>
                        <!-- <div class="col-md-12 paybox1" >
                            <div>
                                <h3>Room</h3>
                                <h5>Club LVL Water View Dbl/Dbl Premier Room</h5>
                                <div class="">

                                    <p class="float">7 Nights</p>
                                    <p class="mony-mr">$150<small>/per day</small>
                                    </p>


                                    <div class="">
                                        <p class="float">Taxes</p>
                                        <p class="mony-mr">$15<small>/per day</small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                        <div class="col-md-12 paybox1">
                            <h4 class=""><small>Total Cost: <i class="fa fa-rupee"></i><?php echo $total?> </small>  </h4>
                        </div>
                    </div>

                </div>
            </div>

            <div class="gap"></div>
        </div>
        <br>
</div>





        <footer id="main-footer" >
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
