<?php include('manager_connect.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>MANAGER Page</title>
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
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background: rgba(0,0,0,0.5);">
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
                            <a class="nav-link" href="home_page_1.php">HOME </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hostel_page.php">HOSTELS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_page.php">USER</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="manager_page.php">MANAGER
                                        <span class="sr-only">(current)</span>
                                </a>
                        </li>
                    
                    </ul>
                </div>
            </div>
        </nav>
        <!---------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="full-center">


            <div class="container ">
                <div class="row ">

                    <div class="col-md-6">
                        <h3 class="mb15">Already have an Account!</h3>
                        <h5>Login</h5>
                        <form name="loginform" action="manager_page.php" method="POST">
                            <div class="form-group " style="width:400px"><i class="fa fa-user input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="email" name="email" class="form-control" placeholder="Enter Email" type="email" required>
                            </div>
                            <div class="form-group " style="width:400px"><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="password" name="pass" class="form-control" type="password" placeholder="Enter Password" required>
                            </div>
                            <input class="btn btn-info" name="login_manager" type="submit" value="Sign in">
                        </form>
                    </div>



                    <div class="col-md-6">
                        <h3 class="mb15">New To Hostel Guru! Sign Up Here </h3>
                        <form name="singupform" action="manager_page.php" method="POST" onSubmit="return signupmethod()">
                        	<h5>Personal Details</h5>
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-user input-icon input-icon-show"></i>
                            	<label>Full Name</label>
                                <input id="fullname" name="man_name" class="form-control" placeholder="Enter Full Name" type="text" required>
                            </div>
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="c_email" name="email_signup" class="form-control" placeholder="Enter Email" type="text" required>
                            </div>
                            
                            
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-phone input-icon input-icon-show"></i>
                                <label>Contact</label>
                                <input id="man_contact" name="man_contact" class="form-control" type="text" pattern="[7-9][0-9]{9}" placeholder="Enter Contact Number" required>
                            </div>
                            <br>
                            <h5>Bank Details</h5>
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>Bank Name</label>
                                <input id="bank_name" name="bank_name" class="form-control" type="text" placeholder="Enter Bank Name" >
                            </div>
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-university input-icon input-icon-show"></i>
                            	<label>Branch Name</label>
                                <input id="branch_name" name="branch_name" class="form-control" type="text" placeholder="Enter Branch Name" >
                            </div>
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-university input-icon input-icon-show"></i>
                            	<label>Account Number</label>
                                <input id="account_no" name="acc_no" class="form-control" type="text" pattern="[0-9a-zA-Z]{10,16}" placeholder="Enter Account Number" >
                            </div>
                            
                            <div class="form-group" style="width:400px;padding-left:0px;"><i class="fa fa-university input-icon input-icon-show"></i>
                            	<label>IFSC Code</label>
                                <input id="ifsc_code" name="ifsc_code" class="form-control" type="text" pattern="[A-Z]{4}[0-9]{7}" placeholder="Enter IFSC Code" >
                            </div>
                            
                            
                            <div class="form-group"style="width:400px;padding-left:0px;"><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="pass" name="pass_signup" class="form-control" type="password" placeholder="Enter Password" required>
                                <div id="meter_wrapper">
                                    <div id="meter"></div>
                                </div>
                                <span id="pass_type" style = "column-width:500px;"></span>
                            </div>

                            <div class="form-group">
                            	<input class="btn btn-info" name="proceed" type="submit" value="Proceed to Enter Hostel Details">
                            	<input class="btn btn-info" type="reset" value="Clear" style="margin-left: 20px; padding: 6px 18px">
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