<?php
session_start();
if(!isset($_SESSION['manager_email']) && !isset($_SESSION['user_email']) ){
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
    <title>Hostel Management</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/trevo.css">
    
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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

/* div.stars {
    width: 270px;
    display: inline-block;
    margin-top: -10px;
    padding-right: 60px;
    margin-left: -10px;
    padding-bottom: 5px;
}

input.star {
    display: none;
}

label.star {
    float: right;
    padding: 7px;
    font-size: 30px;
    color: rgb(144, 143, 143);
    transition: all .2s;
}

input.star:checked~label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
}

input.star-5:checked~label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
}

input.star-1:checked~label.star:before {
    color: #F62;
}

label.star:hover {
    transform: rotate(-15deg) scale(1.3);
}

label.star:before {
    content: '\f006';
    font-family: FontAwesome;
} */

.labell {
    font-weight: bold;
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
    
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <br>
    <div class="container">
        <h1 class="h-text">Search for Hostels</h1>
        <br>
    </div>
    <div class="container">
        <form method="POST" action="hostel_page.php">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group "><i class="fa fa-map-marker input-icon "></i>
                        <label class="labell">Where</label> 
                                <input id="hostel_city" required name="city" class="form-control " placeholder="City, Hostel Name" type="text" style="position: relative; vertical-align: top; background-color: transparent;">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group "><i class="fa fa-inr input-icon "></i>
                        <label class="labell">Fees</label>
                        <input id="Hotel_location" required name="fees" class="form-control" placeholder="Budget" type="text" style="position: relative; vertical-align: top; background-color: transparent;">
                    </div>
                </div>

                <!-- <div class="col-md-3">
                    <div class="form-group "><i class="fa fa-star input-icon "></i>
                        <label class="labell">Rating</label>   
                            <div class="stars">
        
                                  <input class="star star-5" name="five" id="star-5" type="radio" />
                              
                                  <label class="star star-5" for="star-5"></label>
                              
                                    <input class="star star-4 " name="four" id="star-4" type="radio" />
                              
                                  <label class="star star-4" for="star-4"></label>
                              
                                  <input class="star star-3" name="three" id="star-3" type="radio"/>
                              
                                  <label class="star star-3" for="star-3"></label>
                              
                                  <input class="star star-2" name="two" id="star-2" type="radio"/>
                              
                                  <label class="star star-2" for="star-2"></label>
                              
                                  <input class="star star-1" name="one" id="star-1" type="radio"/>
                          
                                  <label class="star star-1" for="star-1"></label>
                
                              </div>
                    </div>
                </div> -->


                <div class="col-md-5">
                    <div class="" data-date-format="MM d, D">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label class="labell">Check in</label>
                                    <input id="Check_in"  class="form-control " name="start" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label class="labell">Check out</label>
                                    <input id="Check_out"  class="form-control" name="end" type="date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-info" type="submit" value="Search" name="search">
        </form>
        <div class="gap gap-small"></div>
    </div>


    <?php include('hostel_display.php');?>
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>


</body>

</html>
