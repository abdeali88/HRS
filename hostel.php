<?php
session_start();
if(!isset($_SESSION['man_email']) && !isset($_SESSION['user_email'])){
    // $_SESSION['msg']="You must log in to view this page";
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
// echo "$id";


    $hostel = $conn->query("SELECT * from hostel where reg_no=$id");
    $errors = array();
    if($hostel)
    {
      if($hostel->num_rows > 0)
      {
          $row = $hostel->fetch_assoc();   
          $hostel_name = $row["hostel_name"];
          $rating = $row["rating"];
          $fees = $row["fees"];  
          $city = $row["city"];
          $reg_no = $row["reg_no"];
          $facilities=$row["facilities"];
          $address=$row['address'];
          // $image = $conn->query("SELECT * from images where reg_no=$reg_no limit 1");
          // $row_image = $image->fetch_assoc();
          // $imageURL = $row_image["file_name"];
      }
      else{
        echo "No records found";
      }
    }
  else{
    echo "Database error";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hostel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/user_page.css">
    <link rel="stylesheet" type="text/css" href="css/manager_dashboard.css"> -->
    <link rel="stylesheet" type="text/css" href="css/hostel_entire_details.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<div class="navbar-color">
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background: rgba(0,0,0,0.7);">
            <div class="container">
                <a class="navbar-brand navbar-img" href="home_page_1.html">
                    <img src="img/hotel.png">&nbsp; Hostel Guru
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home_page_1.html">HOME</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="hostel_page.html">HOSTELS
                                    <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <?php
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
    </div>
    <br>
<br>
<!-- <button onclick="topFunction()" id="myBtn" title="Go to top" style="font-family:'Cambria';">Top</button>
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
</script> -->


<?php
$image = $conn->query("SELECT * from images where reg_no=$id");
while($row_image = $image->fetch_assoc())
{
	$imageURL = 'uploads/'.$row_image["file_name"];
?>
<div class="container">
  <div class="mySlides">
    <img src="<?php echo $imageURL; ?>" style='width:100%; height:700px;'>
  </div>

<?php
}
?>
    
  <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
  <a class="next" onclick="plusSlides(1)"><i class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i></a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <?php
$image = $conn->query("SELECT * from images where reg_no=$id");
$i=1;
while($row_image = $image->fetch_assoc())
{
	$imageURL ='uploads/'.$row_image["file_name"];
?>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="<?php echo $imageURL; ?>" style="width:100%; height: 190px;" onclick="currentSlide($i)" alt="">
    </div>
<?php
$i=$i+1;
}
?>
  </div>
</div>


<div class="container">
	<p style="text-align: center; font-family: 'Cambria';">
		One of the top picks in <?php echo $city;?>
		<br>
		<?php echo '<strong>'.$facilities.'</strong>';?>
		<br>
		Most popular facilities
		<br>
		<div class="row">
		<?php
			echo"<div class='col-md-2'>";
			if($row['mess'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-group>Mess</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['wifi'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-wifi>Free Wifi</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['gym'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-hand-rock-o>Gym</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['bank'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-bank>24/7 Bank Faility</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['medical'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-hospital-o>24/7 Medical Facility</strong>";
			}
			echo'</div>';
			echo'</div>';
			echo'<div class="row">';
			echo"<div class='col-md-2'>";
			if($row['telephone'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-mobile>Telephone</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['amphi'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-square>Amphitheatre</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['transport'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-cab>Transportation Available</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['laundry'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-circle>Laundry</i></strong>";
			}
			echo'</div>';
			echo"<div class='col-md-2'>";
			if($row['study'] == 1)
			{
				echo"<strong style='color:green;'><i fa fa-book>Study Room</i></strong>";
			}
			echo'</div>';
		?>
		</div>
	</p>
</div>
<div class="container">
	<table>
		<tr>
			<td>FLOORS</td>
			<td><?php echo$row['floors']?></td>
		</tr>
		<tr>
			<td>AVAILABLE ROOMS</td>
			<td><?php echo$row['rooms']?></td>
		</tr>
		<tr>
			<td>CAPACITY</td>
			<td><?php echo$row['floors']?></td>
		</tr>
		<tr>
			<td>COST PER HEAD</td>
			<td><?php echo$row['fees']?></td>
		</tr>
	</table>
</div>

<div class="container">
	<h4 style="text-align: center;">
		<strong>Found your Ideal Hostel?</strong>
		<br><br>
		<!-- Enter the  URL for payment page with the correct parameters-->
		<button class='btn btn-primary' formaction='payment.php?id=<?php echo $id;?>'>Pay</button>
	</h4>
</div>

<br><br>

<div class="container">
	<h4 style="text-align: center;">
		<strong>Didn't find the right Hostel?</strong>
		<br><br>
		<button class='btn btn-primary'>Continue Search</button>
	</h4>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

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