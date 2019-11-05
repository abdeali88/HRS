
<div class=container>
<h3 style="margin-left: 94px;font-family:'Acme';"><strong>Registered Students</strong></h3>
<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hrs";
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

    $manager_email = $_SESSION['manager_email'];
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $hostel_dets = mysqli_query($conn,$query);
    while ($hostel_det = mysqli_fetch_assoc($hostel_dets))
    {
      $urn=$hostel_det['reg_no'];
      break;
    }
    $query = "SELECT * FROM student_regd WHERE reg_no='$urn'";
    $reg_stu = mysqli_query($conn,$query);
    $i=0;
    if(mysqli_num_rows($reg_stu) > 0)
    {
    while($student = mysqli_fetch_assoc($reg_stu))
    {
        $mail = $student['email'];
        $query = "SELECT * FROM users WHERE e_mail='$mail'";
        $users = mysqli_query($conn,$query);
        $user = mysqli_fetch_assoc($users);
        $image_url="uploads/".$student["file_name"];
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="<?php echo $image_url;?>" alt="Student" style="width:300px;height:300px;">
            </div>
            <div class="flip-card-back">
              <h3><strong><?php echo $user['name']; ?></strong></h3> 
              <p></p>
              <p style="font-family:'Acme';"><strong>Institute</strong> - <?php echo $student['institute']?></p>
              <p style="font-family:'Acme';"><strong>Course</strong> - <?php echo $student['course']?></p>
              <p style="font-family:'Acme';"><strong>Degree</strong> - <?php echo $student['degree']?></p>
              <p style="font-family:'Acme';"><strong>Year of Study</strong> - <?php echo $student['year']?></p>
              <p style="font-family:'Acme';"><strong>Check-in Date</strong> - <?php echo $student['check_in']?></p>
              <p style="font-family:'Acme';"><strong>Check-out Date</strong> - <?php echo $student['check_out']?></p>
            </div>
          </div>
        </div>
        <br>
    </div>
    <div class='col-md-1'></div>
<?php
        $i = $i + 1;
        if ($i == 3)
        {
            $i=0;
            echo '<br><br><br>';
        }
    }
}
else
{
  
    echo '<h1 style="margin-left: 94px;font-family:\'Acme\';">No students have yet reserved a room in your hostel!</h1>';
    echo "<br><br><br><br><br><br><br><br><br><br><br>";
}
?>

