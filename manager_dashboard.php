<?php
session_start();
if(!isset($_SESSION['success'])){
    $_SESSION['msg']="You must log in to view this page";
    header('location:manager_page.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/user_page.css">
    <link rel="stylesheet" type="text/css" href="css/manager_dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cards.css ">
    <link rel="stylesheet" href="css/w3schools.css ">
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
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='manager_dashboard.php'>DASHBOARD</a>";
                                echo "</li>";
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
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<div class="w3-sidebar w3-light-grey w3-bar-block w3-border-right" id="mySidebar" style="display:none; height:320px; width:17%; position:fixed; top:135px; left:10px;">
  	<h3 class="w3-bar-item" style="font-family:'Cambria'">MENU</h3>
  	<form action="" method="POST">
	  	<input  type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'" name="student_dets" value="STUDENT DETAILS"></input>
	  	<input  type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'" name="student_apps" value="STUDENT APPLICATIONS"></input>
	  	<input  type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'" name="hostel_dets" value="HOSTEL DETAILS"></input>
	  	<div class="w3-dropdown-hover">
	  		<button  class="w3-bar-item w3-button" style="font-family:'Cambria'">CHARTS</button>
	  		<div class="w3-dropdown-content w3-bar-block w3-border">
      			<input type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'; margin-left:30px; width:99%" name="SC" value="BAR CHART"></input>
      			<input type="submit" class="w3-bar-item w3-button" style="font-family:'Cambria'; margin-left:30px;" name="BC" value="SPLINE CHART"></input>
    		</div>
	  	</div>
	</form>
</div>

<?php
    if (!empty($_POST['BC']))
    {
        include('spline_charts.php');
    }
    else if(!empty($_POST['SC']))
    {
        include('bar_charts.php');
    }
?>
<?php
	if (!empty($_POST['student_dets']))
	{
		include('student_dets.php');
	}
	else if (!empty($_POST['student_apps']))
	{
		include('student_apps.php');
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
