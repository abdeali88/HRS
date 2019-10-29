<?php
session_start();
if(!isset($_SESSION['success'])){
    header('location:user_page.php');  
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hostel Management</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/trevo.css">
    <link rel="stylesheet" type="text/css" href="css/hostel_page_1.css">
    
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                        <li class="nav-item  active">
                            <a class="nav-link" href="hostel_page.php">HOSTELS
                                    <span class="sr-only">(current)</span>
                            </a>
                        </li>
        
                        <?php
                            if(isset($_SESSION['success']))
                            {
                                if(isset($_SESSION['manager_email']))
                                {
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='manager_dashboard.php'>DASHBOARD</a>";
                                echo "</li>";
                                }
                                elseif(isset($_SESSION['user_email'])){
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='user_dashboard.php'>DASHBOARD</a>";
                                echo "</li>";
                                }
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' id='logout' value='Logout' name='logout_user' href='logout_manager.php'>LOGOUT</a>";
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
    </div>
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
                                <input id="hostel_city" required name="city" class=" form-control " placeholder="City, Hostel Name" type="text" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group "><i class="fa fa-inr input-icon "></i>
                        <label class="labell">Fees</label>
                        <input id="Hotel_location" required name="fees" class=" form-control " placeholder="Budget" type="text" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group "><i class="fa fa-star input-icon "></i>
                        <label class="labell">Rating</label>   
                            <div class="stars">
        
                                  <input class="star star-5" name="five" id="star-5" type="radio" name="star"/>
                              
                                  <label class="star star-5" for="star-5"></label>
                              
                                    <input class="star star-4 " name="four" id="star-4" type="radio" name="star"/>
                              
                                  <label class="star star-4" for="star-4"></label>
                              
                                  <input class="star star-3" name="three" id="star-3" type="radio" name="star"/>
                              
                                  <label class="star star-3" for="star-3"></label>
                              
                                  <input class="star star-2" name="two" id="star-2" type="radio" name="star"/>
                              
                                  <label class="star star-2" for="star-2"></label>
                              
                                  <input class="star star-1" name="one" id="star-1" type="radio" name="star"/>
                          
                                  <label class="star star-1" for="star-1"></label>
                
                              </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="" data-date-format="MM d, D">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label class="labell">Check in</label>
                                    <input id="Check_in"  class="form-control " name="start" type="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label class="labell">Check out</label>
                                    <input id="Check_out"  class="form-control" name="end" type="date">
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

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom/hotels.js" type="text/javascript"></script>


</body>

</html>
