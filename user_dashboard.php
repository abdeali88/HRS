<?php
session_start();
if(!isset($_SESSION['success'])){
    $_SESSION['msg']="You must log in to view this page";
    header('location:user_page.php');
}?>


<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/user_dashboard.css">
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
</head>
<body>
<div class="navbar-color">
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
                            if(isset($_SESSION['success']))
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
    </div>

    <br>

    <?php
        // code for checking if the user is a registered user or not.
    ?>
    <div class="row" style="text-align: center" >
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="text-center image-title">
                    <div class="text-title col-md-12">
                        <h4 class="animated fadeInUp">Dear User<br>You haven't registered for any hostels yet &#128559</h4>
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
    <br><br>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/custom/home.js" type="text/javascript">
    </script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
