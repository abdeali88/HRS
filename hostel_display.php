<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}



if(isset($_POST['search'])){
    $city = mysqli_real_escape_string($conn, $_POST['city']); 
    $fees = mysqli_real_escape_string($conn,$_POST['fees']); 
    $five =  isset($_POST['five']) ? 1 : 0;
    $four =  isset($_POST['four']) ? 1 : 0;
    $three =  isset($_POST['three']) ? 1 : 0;
    $two =  isset($_POST['two']) ? 1 : 0;
    $one =  isset($_POST['one']) ? 1 : 0;
    if($one){$rating=1;}
    if($two){$rating=2;}
    if($three){$rating=3;}
    if($four){$rating=4;}
    if($five){$rating=5;}

    $hostel = $conn->query("SELECT * from hostel where city=$city and fees<$fees"); 
    $errors = array();
    if($hostel){
    if($hostel->num_rows > 0){
    while($row = $hostel->fetch_assoc()){   
        $hostel_name = $row["hostel_name"];
        $rating = $row["rating"];
        $fees = $row["fees"];  
        $city = $row["city"];
        $reg_no = $row["reg_no"];
        $image = $conn->query("SELECT * from images where reg_no=$reg_no limit 1");
        $row_image = $image->fetch_assoc();
        $imageURL = 'uploads/'.$row_image["file_name"];

?>
    <div id="div" class="container">
        <div class="row">
                <div class="col-md-12 margin ">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-box">
                            <div class="hovereffect2">
                                <img width="300px" height="200px" vspace="10px" class="img-responsive" src="<?php echo $imageURL; ?>" alt="Hostel Image">
                                <div class="overlay" >
                                    <a class="info" href="hostel.php?id=' . $reg_no . '">Reserve Now</a>
                                </div>
                            </div>
                            <div class="text-rent">
                                <h3 id="Hotel_name"><?php echo $hostel_name ?></h3>
                            </div>
                            <div class="mb0">

                                <i class="fa fa-map-marker"></i>
                                <span id="l1" class=""><?php echo $city ?></span><br>
                                <i class="fa fa-rupee"></i>
                                <span class=""><?php echo $fees ?>/yr</span>

                            </div>

                        </div>
                </div>
        </div>       
    </div>
<?php 

}
}

else{
    array_push($errors,"No record found");
    ?>
    <p style='color:red'>No Hostels found...</p>
<?php }

}
else{
    ?><p style='color:red'>Databse Error...</p><?php 
}
}



else{
    $hostel = $conn->query("SELECT * from hostel"); 
    $errors = array();
if($hostel->num_rows > 0){
    while($row = $hostel->fetch_assoc()){
        $hostel_name = $row["hostel_name"];
        $rating = $row["rating"];
        $fees = $row["fees"];  
        $city = $row["city"];
        $reg_no = $row["reg_no"];
        $image = $conn->query("SELECT * from images where reg_no=$reg_no limit 1");
        $row_image = $image->fetch_assoc();
        $imageURL = 'uploads/'.$row_image["file_name"];

?>
    <div id="div" class="container">
        <div class="row">
                <div class="col-md-12 margin ">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-box">
                            <div class="hovereffect2">
                                <img width="300px" height="200px" vspace="10px" class="img-responsive" src="<?php echo $imageURL; ?>" alt="Hostel Image">
                                <div class="overlay" >
                                    <a class="info" href="hostel.php?id=' . $reg_no . '">Reserve Now</a>
                                </div>
                            </div>
                            <div class="text-rent">
                                <h3 id="Hotel_name"><?php echo $hostel_name ?></h3>
                            </div>
                            <div class="mb0">

                                <i class="fa fa-map-marker"></i>
                                <span id="l1" class=""><?php echo $city ?></span><br>
                                <i class="fa fa-rupee"></i>
                                <span class=""><?php echo $fees ?>/yr</span>

                            </div>

                        </div>
                </div>
        </div>       
    </div>
<?php 

}
}

else{
    array_push($errors,"No record found");
    ?>
    <p>No data found...</p>
<?php }}

?> 