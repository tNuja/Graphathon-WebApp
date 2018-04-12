<?php
error_reporting(0);
require("includes/constDatabase.php");
$username=""; $email=""; $password=""; 
    
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
    $query = mysqli_query($con,"SELECT * FROM users WHERE user_Name = '$_POST[uname]' AND emaiLId = '$_POST[email]'") or die(mysqli_error($con));
    if(!$row = mysqli_fetch_array($query)) 
            { 
                NewUser(); 
            }   
            else{
                echo "SORRY...YOU ARE ALREADY A REGISTERED USER...\n";
                echo '
                <a href="login.php" style="color:dodgerblue">Click Here to LOGIN</a>';
            }
    
function NewUser() { 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$username = mysqli_real_escape_string($con,$_POST['uname']); 
$email = mysqli_real_escape_string($con,$_POST['email']); 
$password =mysqli_real_escape_string($con,$_POST['psw']); 
$query = "INSERT INTO users (user_Name,emaiLId,pass,registration_date) VALUES ('$username','$email','$password',NOW())";
$data = mysqli_query($con,$query)or die(mysqli_error($con)); 
if($data) 
    { echo "YOUR REGISTRATION IS COMPLETED..."; 
    echo '
     <a href="login.php" style="color:dodgerblue">Click Here to LOGIN</a>';
    } 
    }

?>