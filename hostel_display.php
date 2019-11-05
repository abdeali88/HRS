<?php

if(isset($_POST['search'])){
    $city = mysqli_real_escape_string($conn, $_POST['city']); 
    $fees = mysqli_real_escape_string($conn,(int)$_POST['fees']); 
    $five =  isset($_POST['five']) ? 1 : 0;
    $four =  isset($_POST['four']) ? 1 : 0;
    $three =  isset($_POST['three']) ? 1 : 0;
    $two =  isset($_POST['two']) ? 1 : 0;
    $one =  isset($_POST['one']) ? 1 : 0;
    $check_in = $_POST['start'];
    $check_out = $_POST['end'];
    $_SESSION['start'] = $check_in;
    $_SESSION['end'] = $check_out;

    ?> 
    <script> 
    document.getElementById('hostel_city').value='<?php echo $city ?>';
    document.getElementById('fees').value='<?php echo $fees ?>';
    document.getElementById('Check_in').value='<?php echo $check_in ?>';
    document.getElementById('Check_out').value='<?php echo $check_out ?>';
    </script>

    <?php 

    if($check_in>=$check_out){
        echo "<script> alert('Please Enter a valid checkout date!');</script>";
    }

    // $check_in = str_replace('-', '/', $check_in);
    
    $query = "SELECT * FROM hostel WHERE city='$city' and fees<=$fees";
    $hostel = mysqli_query($conn,$query); 
    $count=mysqli_num_rows($hostel);
    
    if(mysqli_num_rows($hostel) > 0){
    while($row = mysqli_fetch_assoc($hostel)){   
        $reg_no = $row['reg_no'];
        $hostels_available = array();

        $query_1 = "SELECT COUNT(check_out) as out_total FROM student_regd WHERE reg_no='$reg_no' and check_out<='$check_in'";
        $cap_increase = $conn->query($query_1);
        $cap_increase_1 = mysqli_fetch_assoc($cap_increase);

        $query_2 = "SELECT COUNT(check_in) as in_total FROM student_regd WHERE reg_no='$reg_no' and check_in<='$check_in'";
        $cap_decrease = $conn->query($query_2);
        $cap_decrease_1 = mysqli_fetch_assoc($cap_decrease);

        // echo $cap_increase_1['out_total'];
        // echo $cap_decrease_1['in_total'];

        $actual_capacity = $row['capacity'] + $cap_increase_1['out_total'] - $cap_decrease_1['in_total'];

        if($actual_capacity > 0)
        {
            array_push($hostels_available, $row);
        }
        else
        {

        }

        if(sizeof($hostels_available) > 0)
        {
            foreach ($hostels_available as $row){
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
                                    <a class="info" href="hostel.php?id=<?php echo $reg_no; ?>">Reserve Now </a>
                                </div>
                            </div>
                            <div class="text-rent">
                                <h3 id="Hotel_name" class="text-color" style="margin-bottom:15px;"><?php echo $hostel_name ?></h3>
                            </div>
                            <div class="mb0">

                                <i class="fa fa-map-marker text-color" ></i>
                                <span id="l1" ><?php echo $city ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-rupee text-color"></i>
                                <span class=""><?php echo $fees ?>/yr</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-users text-color"></i>
                                <span class=""><?php echo $actual_capacity ?>&nbsp;(Seats Available)</span>

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
        echo "<div class='container'>";
        echo "<p style='color:red;font-size:20px; '>No Hostels found...</p>";
        echo "</div>";
        echo "<br><br><br><br><br>";
    }
}


}
else{
    echo "<div class='container'>";
    echo "<p style='color:red;font-size:20px;' >No Hostels found...</p>";
    echo "</div>";
    echo "<br><br><br><br><br>";
 }

}

else{

   echo "<div class='container'>";
   echo  "<p style='color:red; font-size:20px;' >Enter Filters to find your ideal Hostel!</p>";
   echo "</div>";
   echo "<br><br><br><br><br>";
}

?> 