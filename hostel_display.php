<?php

if(isset($_POST['search'])){
    $city = mysqli_real_escape_string($conn, $_POST['city']); 
    $fees = mysqli_real_escape_string($conn,(int)$_POST['fees']); 
    $five =  isset($_POST['five']) ? 1 : 0;
    $four =  isset($_POST['four']) ? 1 : 0;
    $three =  isset($_POST['three']) ? 1 : 0;
    $two =  isset($_POST['two']) ? 1 : 0;
    $one =  isset($_POST['one']) ? 1 : 0;
    $rating = 0;
    if($one==1){$rating=1;}
    if($two==1){$rating=2;}
    if($three==1){$rating=3;}
    if($four==1){$rating=4;}
    if($five==1){$rating=5;}
    echo "$rating";

    
    $query = "SELECT * FROM hostel WHERE city='$city' and fees<=$fees and rating>=$rating";
    $hostel = mysqli_query($conn,$query); 
    $count=mysqli_num_rows($hostel);
    
    if(mysqli_num_rows($hostel) > 0){
    while($row = mysqli_fetch_assoc($hostel)){   
        $hostel_name = $row["hostel_name"];
        $fees = $row["fees"];
        $city = $row["city"];
        $rating = $row["rating"];
        $reg_no = $row["reg_no"];
        $image = $conn->query("SELECT * from images where reg_no=$reg_no limit 1");
        $row_image = $image->fetch_assoc();
        $imageURL = 'uploads/'.$row_image["file_name"];
        $mess = $row["mess"];  
        $gym =  $row["gym"];  
        $wifi =  $row["wifi"];  
        $bank =  $row["bank"];  
        $medical =  $row["medical"];  
        $telephone =  $row["telephone"];  
        $amphi =  $row["amphi"];  
        $transport =  $row["transport"];  
        $laundry =  $row["laundry"];  
        $reading =  $row["study"];  
        $facility = array();
        if($mess==1){array_push($facility,"Mess");}
        if($gym==1){array_push($facility,"Gym");}
        if($wifi==1){array_push($facility,"Wi-Fi");}
        if($bank==1){array_push($facility,"Bank");}
        if($medical==1){array_push($facility,"Medical");}
        if($telephone==1){array_push($facility,"Telephone");}
        if($amphi==1){array_push($facility,"Amphitheatre");}
        if($transport==1){array_push($facility,"Transport");}
        if($laundry==1){array_push($facility,"Laundry");}
        if($reading==1){array_push($facility,"Reading Room");}

?>
    <div id="div" class="container">
        <div class="row">
                <div class="col-md-12 margin ">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 item-box">
                            <div class="hovereffect2">
                                <img width="600px" height="300px" vspace="10px" class="img-responsive" src="<?php echo $imageURL; ?>" alt="Hostel Image">
                                <div class="overlay" >
                                    <a class="info" href="hostel.php?id=' . $reg_no . '">Reserve Now </a>
                                </div>
                            </div>
                            <div class="text-rent">
                                <h3 id="Hotel_name" class="text-color" style="margin-bottom:15px;"><?php echo $hostel_name ?></h3>
                            </div>
                            <div class="mb0">

                                <i class="fa fa-map-marker text-color" ></i>
                                <span id="l1" ><?php echo $city ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-rupee text-color"></i>
                                <span class=""><?php echo $fees ?>/yr</span>

                            </div>
                            <div class="mb0" style="margin-top:-70px;">

                            <!-- <i class="fa fa-check-square-o"></i> -->
                            <?php
                            foreach($facility as $value) {
                            ?>
                            <i class="fa fa-check-square-o text-color" ></i>
                            <span class=""><?php echo $value ?></span>&nbsp;&nbsp;&nbsp;
                            <?php
                            }?>
                            
                            </div>

                        </div>
                </div>
        </div>       
    </div>
<?php 

}
}

else{
    ?>
    <p style='color:red'>No Hostels found...</p>
<?php }

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
        $mess = $row["mess"];  
        $gym =  $row["gym"];  
        $wifi =  $row["wifi"];  
        $bank =  $row["bank"];  
        $medical =  $row["medical"];  
        $telephone =  $row["telephone"];  
        $amphi =  $row["amphi"];  
        $transport =  $row["transport"];  
        $laundry =  $row["laundry"];  
        $reading =  $row["study"];  
        $facility = array();
        if($mess==1){array_push($facility,"Mess");}
        if($gym==1){array_push($facility,"Gym");}
        if($wifi==1){array_push($facility,"Wi-Fi");}
        if($bank==1){array_push($facility,"Bank");}
        if($medical==1){array_push($facility,"Medical");}
        if($telephone==1){array_push($facility,"Telephone");}
        if($amphi==1){array_push($facility,"Amphitheatre");}
        if($transport==1){array_push($facility,"Transport");}
        if($laundry==1){array_push($facility,"Laundry");}
        if($reading==1){array_push($facility,"Reading Room");}
        

?>
    <div id="div" class="container">
        <div class="row">
                <div class="col-md-12 margin ">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 item-box">
                            <div class="hovereffect2">
                                <img width="600px" height="300px" vspace="10px" class="img-responsive" src="<?php echo $imageURL; ?>" alt="Hostel Image">
                                <div class="overlay" >
                                    <a class="info" href="hostel.php?id=' . $reg_no . '">Reserve Now </a>
                                </div>
                            </div>
                            <div class="text-rent">
                                <h3 id="Hotel_name" class="text-color" style="margin-bottom:15px;"><?php echo $hostel_name ?></h3>
                            </div>
                            <div class="mb0">

                                <i class="fa fa-map-marker text-color" ></i>
                                <span id="l1" ><?php echo $city ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-rupee text-color"></i>
                                <span class=""><?php echo $fees ?>/yr</span>

                            </div>
                            <div class="mb0" style="margin-top:-70px;">

                            <!-- <i class="fa fa-check-square-o"></i> -->
                            <?php
                            foreach($facility as $value) {
                            ?>
                            <i class="fa fa-check-square-o text-color" ></i>
                            <span class=""><?php echo $value ?></span>&nbsp;&nbsp;&nbsp;
                            <?php
                            }?>
                            
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
