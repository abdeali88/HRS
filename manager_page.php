<?php include("manager_connect.php") ?>
<!DOCTYPE html>
<html>

<head>
    <title>MANAGER Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/manager_page.css">

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
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background: rgba(0,0,0,0.5);">
            <div class="container">
                <a class="navbar-brand navbar-img" href="home_page_1.html">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!---------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="full-center">


            <div class="container ">
                <div class="row ">

                    <div class="col-md-3">
                        <h3 class="mb15">Login</h3>
                        <form name="loginform" action="manager_page.php" method="POST">
                            <div class="form-group "><i class="fa fa-user input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="email" class="form-control" placeholder="Enter Email" type="email" required>
                            </div>
                            <div class="form-group "><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="password" class="form-control" type="password" placeholder="Enter Password" required>
                            </div>
                            <input class="btn btn-info" type="submit" value="Sign in">
                        </form>
                    </div>

                    <div class="col-md-1">
                    </div>

                    <div class="col-md-4">
                        <h3 class="mb15">Personal Details</h3>
                        <form name="singupform" action="manager_page.php" method="POST" enctype="multipart/form-data" onSubmit="return signupmethod()">
                            <div class="form-group "><i class="fa fa-user input-icon input-icon-show"></i>
                                <label>Full Name</label>
                                <input id="man_fullname" name="man_name" class="form-control" placeholder="Enter Full Name" type="text" required>
                            </div>
                            <div class="form-group "><i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label>Email</label>
                                <input id="c_email" name="email_signup" class="form-control" placeholder="Enter Email" type="text" required>
                            </div>
                            <div class="form-group "><i class="fa fa-phone input-icon input-icon-show"></i>
                                <label>Contact</label>
                                <input id="man_contact" name="man_contact" class="form-control" type="text" pattern="[7-9][0-9]{9}" placeholder="Enter Contact Number" required>
                            </div>
                            <div class="form-group "><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>Bank Name</label>
                                <input id="bank_name" name="bank_name" class="form-control" type="text" placeholder="Enter Bank Name" required>

                            </div>
                            <div class="form-group "><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>Branch Name</label>
                                <input id="branch_name" name="branch_name" class="form-control" type="text" placeholder="Enter Branch Name" required>
                            </div>
                            <div class="form-group "><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>Account Number</label>
                                <input id="account_no" name="acc_no" class="form-control" type="text" pattern="[0-9a-zA-Z]{10,16}" placeholder="Enter Account Number" required>
                            </div>
                            <div class="form-group "><i class="fa fa-university input-icon input-icon-show"></i>
                                <label>IFSC Code</label>
                                <input id="ifsc_code" name="ifsc_code" class="form-control" type="text" pattern="[A-Z]{4}[0-9]{7}" placeholder="Enter IFSC Code" required>
                            </div>
                            <div class="form-group "><i class="fa fa-lock input-icon input-icon-show"></i>
                                <label>Password</label>
                                <input id="pass" name="pass_signup" class="form-control" type="password" placeholder="Enter Password" required>
                                <div id="meter_wrapper">
                                    <div id="meter"></div>
                                </div>
                                <span id="pass_type"></span>
                            </div>
                    </div>


                    <div class="col-md-4">
                        <h3 class="mb15">Hostel Details</h3>
                        <div class="form-group "><i class="fa  fa-building-o input-icon input-icon-show"></i>
                            <label>Name</label>
                            <input id="hostel_name" name="hostel_name" class="form-control" placeholder="Hostel Name" type="text" required>
                        </div>
                        <div class="form-group "><i class="fa fa-registered input-icon input-icon-show"></i>
                            <label>Reg No</label>
                            <input id="reg_no" name="reg_no" class="form-control" placeholder="Hostel Registration Number" type="text" pattern="[1-9][0-9]{9}" required>
                        </div>
                        <div class="form-group "><i class="fa fa-phone input-icon input-icon-show"></i>
                            <label>Contact</label>
                            <input id="contact" name="hostel_contact" class="form-control" type="text" pattern="[7-9][0-9]{9}" placeholder="Hostel Contact Number" required>
                        </div>
                        <div class="form-group "><i class="fa fa-map-marker input-icon input-icon-show"></i>
                            <label>Address</label>
                            <input id="address" name="address" class="form-control" type="text" placeholder="Hostel Address" required>
                        </div>
                        <div class="form-group "><i class="fa fa-map-marker input-icon input-icon-show"></i>
                            <label>City</label>
                            <input id="city" name="city" class="form-control" type="text" placeholder="Hostel City" required>
                        </div>
                        <div class="form-group "><i class="fa fa-map-marker input-icon input-icon-show"></i>
                            <label>Zip Code</label>
                            <input id="zip" name="zip_code" class="form-control" type="text" pattern="[1-9][0-9]{5}" placeholder="Hostel Zip Code" required>
                        </div>
                        <div class="form-group "><i class="fa fa-rupee input-icon input-icon-show"></i>
                            <label>Fees</label>
                            <input id="fees" name="fees" class="form-control" type="text" placeholder="Hostel Fees (Annual)" required>
                        </div>
                        <div class="form-group "><i class="fa fa-building-o input-icon input-icon-show"></i>
                            <label>Floors</label>
                            <input id="floors" name="floors" class="form-control" type="number" placeholder="Number of Floors" required>
                        </div>
                        <div class="form-group "><i class="fa fa-building-o input-icon input-icon-show"></i>
                            <label>Rooms</label>
                            <input id="rooms" name="rooms" class="form-control" type="number" placeholder="Number of Rooms" required>
                        </div>
                        <div class="form-group "><i class="fa fa-users input-icon input-icon-show"></i>
                            <label>Students</label>
                            <input id="capacity" name="capacity" class="form-control" type="number" placeholder="Hostel Capacity" required>
                        </div>

                        <div class="form-group " style="margin-top: 20px; margin-left: -11px">
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
                                    <td>
                                        <label class="container-checkbox">Study/Reading Room
                                        <input id="reading" name="reading" type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                            </table>

                            <div class="form-group" style="margin-left: 10px;">
                                <textarea class="form-control" name="other_facilities" id="other_facilities" rows="3" placeholder="Other Facilities"></textarea>
                            </div>
                        </div>

                        <br>
                        <i class="fa fa-picture-o input-icon input-icon-show"></i>
                        <label style="font-weight: bold">Hostel Images</label>
                        <div class="custom-file" id="customFile">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="files[]" aria-describedby="fileHelp" multiple>
                            <label class="custom-file-label" for="exampleInputFile">
                                   Select file...
                            </label>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <input class="btn btn-info" type="submit" value="Sign up" name="register_manager">
                            <input class="btn btn-info" type="reset" value="Clear" style="margin-left: 20px; padding: 6px 18px">
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
