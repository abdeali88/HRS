<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

if(isset($_SESSION['manager_email'])){
    header('location:manager_dashboard.php');
}

if(isset($_POST['proceed']))
{
    $man_name = mysqli_real_escape_string($conn, $_POST['man_name']); 
    $man_email = mysqli_real_escape_string($conn, $_POST['email_signup']); 
    $man_contact = mysqli_real_escape_string($conn, $_POST['man_contact']); 
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $branch_name = mysqli_real_escape_string($conn, $_POST['branch_name']);
    $acc_no = mysqli_real_escape_string($conn, $_POST['acc_no']);
    $ifsc_code = mysqli_real_escape_string($conn, $_POST['ifsc_code']);
    $pass_signup = mysqli_real_escape_string($conn, $_POST['pass_signup']);
    
    $errors=array();

    if(mysqli_connect_error()){
        die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
        $mul_email = "SELECT * FROM manager WHERE email='$man_email'";
        $mul_man_contact = "SELECT * FROM manager WHERE contact='$man_contact'";
        $mul_hostel_contact = "SELECT * FROM hostel WHERE hostel_contact='$hostel_contact'";
        $mul_regno = "SELECT * FROM hostel WHERE reg_no='$reg_no'";

        $results_1 = mysqli_query($conn,$mul_email);
        $results_2 = mysqli_query($conn,$mul_man_contact);
   

        if(mysqli_num_rows($results_1)>0)
        {
            array_push($errors,"Email is already taken");
            ?> <script> alert("Email is already Registered!");</script> <?php   
        }
        elseif(mysqli_num_rows($results_2)>0)
        {
            array_push($errors,"Manager Contact is already taken");
            ?> <script> alert("Manager Contact is already Registered!");</script> <?php   
        }
        if(count($errors)==0){
            $_SESSION['manager_email'] = $man_email;
            $_SESSION['manager_name'] = $man_name;
            $_SESSION['manager_contact'] = $man_contact;
            $_SESSION['bank_name'] = $bank_name;
            $_SESSION['branch_name'] = $branch_name;
            $_SESSION['acc_no'] = $acc_no;
            $_SESSION['ifsc_code'] = $ifsc_code;
            $_SESSION['manager_password'] = $pass_signup;
            $_SESSION['reg_no']=$reg_no;
            header('location:single_hostel.php');
        }
    }
}

if(isset($_POST['login_manager'])){
    $man_email = mysqli_real_escape_string($conn, $_POST['email']); 
    $man_pass =  mysqli_real_escape_string($conn, $_POST['pass']); 
    $errors=array();
    if(mysqli_connect_error()){
        die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
        $auth = "SELECT * FROM manager WHERE email='$man_email'";
        $results_email = mysqli_query($conn,$auth);
        $rows = mysqli_fetch_assoc($results_email);
        $man_name = $rows['name'];

        $a = "SELECT * FROM hostel WHERE man_email='$man_email'";
        $b = mysqli_query($conn,$a);
        $c = mysqli_fetch_assoc($b);
        $reg_no = $c['reg_no'];
     
        if(empty($rows)){ 
            array_push($errors,"Invalid Email");
            ?><script> alert("Invalid Email!"); </script><?php
        }
        if($rows['email']==$man_email && $rows['password']!=$man_pass){ 
            array_push($errors,"Invalid Password");
            ?><script> alert("Invalid Password!"); </script><?php
        }
        if($rows['email']==$man_email && $rows['password']==$man_pass && count($errors)==0){
            $_SESSION['manager_email'] = $man_email;
            $_SESSION['manager_name'] = $man_name;
            $_SESSION['reg_no'] = $reg_no;
            $_SESSION['success'] =  "You are logged in";
            header('location:manager_dashboard.php');
        }    
    }
}
?>
