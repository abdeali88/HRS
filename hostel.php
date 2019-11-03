<?php
session_start();
if(!isset($_SESSION['manager_email']) && !isset($_SESSION['user_email'])){
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
         
      }
      else{
        echo "No records found";
      }
    }
  else{
    echo "Database error";
  }



function make_query($conn)
{
$id=$_GET['id'];
$query = "SELECT * FROM images where reg_no=$id";
$result = mysqli_query($conn, $query);
return $result;
}

function make_slide_indicators($conn)
{
 $output = ''; 
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#myCarousel" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#myCarousel" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="carousel-item active">';
  }
  else
  {
   $output .= '<div class="carousel-item">';
  }
  $output .= '
   <img width="910px" height="640px" src="uploads/'.$row["file_name"].'" alt="Hostel Image" />
   
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
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
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel-item{
    text-align: center;
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.bs-example{
	margin: 20px;
}
table { border-collapse: separate; border-spacing: 10px; }


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


<div class="container">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($conn); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($conn); ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
     <span class="carousel-control-prev-icon"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
     <span class="carousel-control-next-icon"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
</div>


<br>
<div class="container">
	<p >
		<h5 style="font-family: 'Acme', sans-serif; font-size:22px;">One of the top picks in <?php echo $city;?><h5>
		<br>
		<h5 style="font-family: 'Acme', sans-serif; font-size:22px; margin-bottom:15px;"><?php echo $facilities;?></h5>
		<br>
		<div class="row" style="font-size:18px">
		<?php
			
			if($row['mess'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-group'></i>&nbsp;Mess</strong>";
                echo'</div>';
			}
			
			
			if($row['wifi'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-wifi'></i>&nbsp;Free Wifi</strong>";
                echo'</div>';
			}
			
			
			if($row['gym'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-hand-rock-o'></i>&nbsp;Gym</strong>";
                echo'</div>';
			}
			
			
			if($row['bank'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-bank'></i>&nbsp;Bank Facility</strong>";
                echo'</div>';
			}
			
			
			if($row['medical'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-medkit'></i>&nbsp;Medical Facility</strong>";
                echo'</div>';
			}
			
            echo'</div>';
            echo "<br>";
			echo'<div class="row" style="font-size:18px">';
			
			if($row['telephone'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-mobile'></i>&nbsp;Telephone</strong>";
                echo'</div>';
			}
			
			
			if($row['amphi'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-square'></i>&nbsp;Amphitheatre</strong>";
                echo'</div>';
			}
			
			
			if($row['transport'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-cab'></i>&nbsp;Transportation</strong>";
                echo'</div>';
			}
			
			
			if($row['laundry'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-circle'></i>&nbsp;Laundry</strong>";
                echo'</div>';
			}
			
			
			if($row['study'] == 1)
			{
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-book'></i>&nbsp;Study Room</strong>";
                echo'</div>';
			}
			
		?>
		</div>
	</p>
</div>
<br>
<div class="container">
	<table style="font-family: 'Acme', sans-serif; font-size:20px;">
		<tr>
			<td>FLOORS</td>
			<td><?php echo$row['floors']?></td>
		</tr>
		<tr>
			<td>AVAILABLE ROOMS</td>
			<!-- <td><strong><?php echo$row['rooms']?></strong></td> -->
		</tr>
		<tr>
			<td>CAPACITY</td>
			<td><?php echo$row['floors']?></td>
		</tr>
		<tr>
			<td>FEES PER YEAR</td>
			<td><?php echo$row['fees']?></td>
		</tr>
	</table>
</div>

<div class="container">
	<h4 style="text-align: center;">
        <strong>Found your Ideal Hostel?</strong>
    </h4>
		<br>
		<!-- Enter the  URL for payment page with the correct parameters-->
		<button style="display: block; margin: 0 auto;" class='btn btn-primary' onclick="location.href ='register_user.php?id=<?php echo $reg_no; ?>'">Register and Pay</button>
	
</div>

<br><br>

<div class="container">
	<h4 style="text-align: center;">
		<strong>Didn't find the right Hostel?</strong></h4>
		<br>
		<button style="display: block; margin: 0 auto;" onclick="location.href = 'hostel_page.php';" id="search" class='btn btn-primary'>Continue Search</button>
</div>
<br><br>




<script type='text/javascript'>
   
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