<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(isset($_SESSION['user_email'])){
    header('location:user_dashboard.php');
}

if(isset($_POST['register_user']))
{
$user_name = mysqli_real_escape_string($conn, $_POST['user_name_signup']); 
$user_email = mysqli_real_escape_string($conn, $_POST['user_email_signup']); 
$user_pass =  mysqli_real_escape_string($conn, $_POST['user_pass_signup']); 
$user_pass = md5($user_pass);
$errors=array();
if(mysqli_connect_error()){
    die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
    $check_mul = "SELECT * FROM users WHERE e_mail='$user_email'";
    $results = mysqli_query($conn,$check_mul);
    if(mysqli_num_rows($results)==1)
    {
        array_push($errors,"Email is already taken");
        ?> <script> alert("Email is already taken");</script> <?php 
    }
    if(count($errors)==0)
    {
        $insert_user = "INSERT INTO users(e_mail,name,password) values('$user_email','$user_name','$user_pass')";
        mysqli_query($conn,$insert_user);
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['success'] =  "You are logged in";
        header('location:user_dashboard.php');
    }
}
}
if(isset($_POST['login_user'])){
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email_login']); 
    $user_pass =  mysqli_real_escape_string($conn, $_POST['user_pass_login']);
    $user_pass = md5($user_pass);
    $errors=array();
    if(mysqli_connect_error()){
        die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
        $auth = "SELECT * FROM users WHERE e_mail='$user_email'";
        $results_email = mysqli_query($conn,$auth);
        $rows = mysqli_fetch_assoc($results_email);
        $user_name = $rows['name'];
     
        if(empty($rows)){ 
            array_push($errors,"Invalid Email");
            ?><script> alert("Invalid Email!"); </script><?php
        }
        if($rows['e_mail']==$user_email && $rows['password']!=$user_pass){ 
            array_push($errors,"Invalid Password");
            ?><script> alert("Invalid Password!"); </script><?php
        }
        if(count($errors)==0){
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['success'] =  "You are logged in";
            header('location:user_dashboard.php');
        }    
    }
}
?>
