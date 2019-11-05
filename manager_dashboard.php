<?php
session_start();
if(!isset($_SESSION['manager_email'])){
    $_SESSION['msg']="You must log in to view this page";
    header('location:manager_page.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/manager_dashboard.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cards.css ">
    <link rel="stylesheet" href="css/w3schools.css ">
    <link rel="stylesheet" href="css/w3schools2.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
}

#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: grey;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 4px;
}

#myBtn:hover {
    background-color: #555;
}

.first-image {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background: url('img/log3.jpg');
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

.bs-example {
    margin: 20px;
}

table {
    border-collapse: separate;
    border-spacing: 15px;
}
</style>
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

<div class="w3-grey" style="width:3%;position: fixed; top: 80px; left: 10px;">
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_toggle()">☰</button>
</div>
<script>
function w3_toggle() {
  if (document.getElementById("mySidebar").style.display == "block")
  {
  	document.getElementById("mySidebar").style.display = "none";
  }
  else
  {
  	document.getElementById("mySidebar").style.display = "block";
  }
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<button onclick="topFunction()" id="myBtn" title="Go to top" style="font-family:'Cambria';">Top</button>
<script>

var mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

<div class="w3-sidebar w3-light-grey w3-bar-block w3-border-right" id="mySidebar" style="display:none; height:320px; width:17%; position:fixed; top:135px; left:10px;">
  	<h3 class="w3-bar-item" style="font-family:'Cambria'">MENU</h3>
  	<form action="" method="POST">
	  	<input  type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'" name="student_dets" value="STUDENT DETAILS">
	  	<input  type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'" name="hostel_dets" value="HOSTEL DETAILS">
	</form>
</div>
<?php
	if (!empty($_POST['student_dets']))
	{
		include('student_dets.php');
	}
	else if (!empty($_POST['hostel_dets']))
	{
		include('hostel_dets.php');
	}
	else
	{
		include('student_dets.php');
	}
?>

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


</body>
</html>