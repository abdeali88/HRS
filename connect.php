<?php
$user_name = filter_input(INPUT_POST, 'user_name_signup'); 
$user_email = filter_input(INPUT_POST, 'user_email_signup'); 
$user_pass = filter_input(INPUT_POST, 'user_pass_signup'); 

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if(mysqli_connect_error()){
    die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else{
    $insert_user = "INSERT INTO users(e_mail,name,password) values('$user_name','$user_email','$user_pass')";
    if($conn->query($insert_user)){
        echo "Insertion Sucessful";
    }
    else{
        echo "Error: ".$insert_user."<br>".$conn->error;
    }
    $conn->close();
}