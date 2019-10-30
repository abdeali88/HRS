<?php include("user_connect.php") ?>

<!DOCTYPE html>
<html>

<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/user_page.css">

    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="first-image navbar-color">
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background:rgba(0,0,0,0.5);">
            <div class="container">
                <a class="navbar-brand navbar-img" href="home_page_1.php">
                    <img src="img/hotel.png"> &nbsp;Hostel Guru
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                            </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="home_page_1.php">HOME 
                                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hostel_page.php">HOSTELS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="user_page.php">USER
                                 <span class="sr-only">(current)</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manager_page.php">MANAGER</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!---------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="full-center">
        <h4 style="text-align:center;color:red;margin-bottom:50px; margin-top:-50px;">Kindly Login or Register Before Searching for Hostels!</h4>
            <div class="container ">
                <div class="row ">

                    <div class="col-md-1">
                    </div>

                    <div class="col-md-4">
                        <h3 class="mb15">Login</h3>
                        <form name="loginform" action="user_page.php" method="POST">
                            <div class="form-group "><i class="fa fa-user input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="email" name="user_email_login" class="form-control" placeholder="Enter Email" type="email" required>
                            </div>
                            <div class="form-group "><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="password" name="user_pass_login" class="form-control" type="password" placeholder="Enter Password" required>
                            </div>
                            <input class="btn btn-info" type="submit" value="Sign in" name="login_user">
                        </form>
                    </div>

                    <div class="col-md-1">
                    </div>
    
                    <div class="col-md-4">
                        <h3 class="mb15">New To Hostel Guru?</h3>
                        <form name="singupform" action="user_page.php" method="POST" onSubmit="return signupmethod()">
                            <div class="form-group "><i class="fa fa-user input-icon input-icon-show"></i>
                                <label>Full Name</label>
                                <input id="fullname" name="user_name_signup" class="form-control" placeholder="Enter Full Name" type="text" required>
                            </div>
                            <div class="form-group "><i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="c_email" name="user_email_signup" class="form-control" placeholder="Enter Email" type="email" required>
                            </div>
                            <div class="form-group "><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="pass" name="user_pass_signup" class="form-control" type="password" placeholder="Enter Password" required>
                                <div id="meter_wrapper">
                                    <div id="meter"></div>
                                </div>
                                <span id="pass_type"></span>
                            </div>
                            <input class="btn btn-info" type="submit" value="Sign up" name="register_user">
                            <input class="btn btn-info" type="reset" value="Clear" style="margin-left: 20px; padding: 6px 18px">
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
    <script type="text/javascript" src="js/custom/user.js"></script>



</body>

</html>
