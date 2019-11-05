<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hrs";
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $manager_email = $_SESSION['manager_email'];
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $hostels = mysqli_query($conn,$query);

    if(mysqli_num_rows($hostels) > 0)
    {
        $row = mysqli_fetch_assoc($hostels);
     
        function make_query($conn)
        {
        $id = $_SESSION['reg_no'];
        $query = "SELECT * FROM images where reg_no='$id'";
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
           $output .= '<div class="carousel-item" style="text-align: center;min-height: 280px;">';
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



<div class=container>
<h3 style="margin-left:15px;font-family:'Acme';"><strong>Hostel Details</strong></h3>
<div class="container">
   <div id="myCarousel" class="carousel slide" style="background: #2f4357;margin-top: 20px;" data-ride="carousel">
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

<div class="container">
    <p >
        <h5 style="font-family: 'Acme', sans-serif; font-size:22px; margin-bottom:15px;"><?php echo $row['facilities'];?></h5>
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
                echo"<div class='col-md-3'>";
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
                echo"<div class='col-md-3'>";
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
			<td>Contact</td>
			<td style="padding-left: 100px;"><?php echo $row['hostel_contact']?></td>
		</tr>
        <tr>
            <td>FLOORS</td>
            <td style="padding-left: 100px;"><?php echo$row['floors']?></td>
        </tr>
        <tr>
            <td>AVAILABLE ROOMS</td>
            <td style="padding-left: 100px;"><?php echo $row['no_of_rooms']?></td>
        </tr>
        <tr>
            <td>CAPACITY</td>
            <td style="padding-left: 100px;"><?php echo $row['floors']?></td>
        </tr>
        <tr>
            <td>FEES PER YEAR</td>
            <td style="padding-left: 100px;"><?php echo$row['fees']?></td>
        </tr>
    </table>
<?php
}
?>
<br><br>
<a href="hostel_update.php"><button class='btn btn-primary' style="font-family: 'Acme'">Update</button></a>
<br><br>
</div>
</div>
