<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

if(!isset($_SESSION['manager_email'])){
    header('location:manager_page.php');
}

if(isset($_POST['register_manager']))
{
    $man_name =  $_SESSION['manager_name'];
    $man_email =$_SESSION['manager_email'];
    $man_contact =  $_SESSION['manager_contact'];
    $bank_name =  $_SESSION['bank_name'];
    $branch_name =  $_SESSION['branch_name'];
    $acc_no = $_SESSION['acc_no'];
    $ifsc_code =  $_SESSION['ifsc_code'];
    $pass_signup =  $_SESSION['manager_password'];

    $hostel_name = mysqli_real_escape_string($conn, $_POST['hostel_name']); 
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']); 
    $hostel_contact = mysqli_real_escape_string($conn, $_POST['hostel_contact']); 
    $city = mysqli_real_escape_string($conn, $_POST['city']); 
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']); 
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $fees = mysqli_real_escape_string($conn, (int)$_POST['fees']); 
    $floors = mysqli_real_escape_string($conn,(int)$_POST['floors']); 
    $rooms = mysqli_real_escape_string($conn, (int)$_POST['rooms']); 
    $capacity = mysqli_real_escape_string($conn, (int)$_POST['capacity']); 

    $mess = isset($_POST['mess']) ? 1 : 0;
    $gym = isset($_POST['gym']) ? 1 : 0;
    $wifi = isset($_POST['wifi']) ? 1 : 0;
    $bank = isset($_POST['bank']) ? 1 : 0;
    $medical = isset($_POST['medical']) ? 1 : 0;
    $telephone = isset($_POST['telephone']) ? 1 : 0;
    $amphi = isset($_POST['amphi']) ? 1 : 0;
    $transport = isset($_POST['transport']) ? 1 : 0;
    $laundry = isset($_POST['laundry']) ? 1 : 0;
    $reading = isset($_POST['reading']) ? 1 : 0;

    $other_facilities = mysqli_real_escape_string($conn, $_POST['other_facilities']); 
    
    $errors=array();

    if(mysqli_connect_error()){
        die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
        $mul_hostel_contact = "SELECT * FROM hostel WHERE hostel_contact='$hostel_contact'";
        $mul_regno = "SELECT * FROM hostel WHERE reg_no='$reg_no'";

        $results_2 = mysqli_query($conn,$mul_hostel_contact);
        $results_1 = mysqli_query($conn,$mul_regno);

        if(mysqli_num_rows($results_1)>0)
        {
            array_push($errors,"Registration Number is already taken");
            ?> <script> alert("Hostel Registration Number is already Registered!");</script> <?php   
        }
        elseif(mysqli_num_rows($results_2)>0)
        {
            array_push($errors,"Hostel Contact is already taken");
            ?> <script> alert("Hostel Contact is already Registered!");</script> <?php   
        }

        $targetDir = "uploads/";
        $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';


    if(!empty(array_filter($_FILES['files']['name']))){
        if(count($errors)==0){
    
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."', NOW(),'".$reg_no."'),";
                }else{
                    array_push($errors,"Error in uploading Image");
                    ?><script>alert("Error in uploading Image!");</script><?php
                    // $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                array_push($errors,"FileType is invalid");
                ?><script>alert("INVALID Image Type!");</script><?php
                // $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
    }
        
        if(!empty($insertValuesSQL) && count($errors)==0){
            // Insert image file name into database
            $insertValuesSQL = trim($insertValuesSQL,',');
            $insert = $conn->query("INSERT INTO images (file_name, uploaded_on,reg_no) VALUES $insertValuesSQL");
            if($insert){
                // $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                // $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                // $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                // $statusMsg = "Files are uploaded successfully.".$errorMsg;
              
                    $insert_manager = "INSERT INTO manager(email,name,password,contact,bank_name,branch_name,account_no,ifsc_code) values('$man_email','$man_name','$pass_signup','$man_contact','$bank_name','$branch_name','$acc_no','$ifsc_code')";
                    $insert_hostel = "INSERT INTO hostel(reg_no,hostel_name,address,city,zip_code,hostel_contact,floors,capacity,no_of_rooms,fees,mess,wifi,gym,bank,medical,telephone,amphi,transport,laundry,study,facilities,man_email) values('$reg_no','$hostel_name','$address','$city','$zip_code','$hostel_contact','$floors','$capacity','$rooms','$fees','$mess','$wifi','$gym','$bank','$medical','$telephone','$amphi','$transport','$laundry','$reading','$other_facilities','$man_email')";
                    mysqli_query($conn,$insert_manager);
                    mysqli_query($conn,$insert_hostel);
                    $_SESSION['hostel_name']=$hostel_name;
                    $_SESSION['reg_no']=$reg_no;
                    $_SESSION['hostel_contact']=$hostel_contact;
                    $_SESSION['city']=$city;
                    $_SESSION['zip_code']=$zip_code;
                    $_SESSION['address']=$address;
                    $_SESSION['fees']=$fees;
                    $_SESSION['floors']=$floors;
                    $_SESSION['rooms']=$rooms;
                    $_SESSION['capacity']=$capacity;
                    $_SESSION['other_facilities']=$other_facilities;

                    $_SESSION['success'] =  "You are logged in";
                    header('location:manager_dashboard.php');
            }else{
                // $statusMsg = "Sorry, there was an error uploading your file.";
                array_push($errors,"ERROR in uploading file");
                ?><script>alert("There was an error uploading your file!");</script><?php    
            }
        }
    }else{
        // $statusMsg = 'Please select a file to upload.';
        array_push($errors,"No file selected");
        ?><script>alert("Please select a file to upload!");</script><?php
    }
    
    }
}
?>
