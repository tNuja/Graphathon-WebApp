<?php
error_reporting(0);
require("includes/constDatabase.php");
$username=""; $add=""; $email=""; $password=""; 
if(isset($_POST['email']))
{
	SignUp(); 
}
function NewUser() { 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$username = mysqli_real_escape_string($con,$_POST['uname']);
$add = mysqli_real_escape_string($con,$_POST['add']);
$email = mysqli_real_escape_string($con,$_POST['email']); 
$password =mysqli_real_escape_string($con,$_POST['psw']); 
$name_photo=$_FILES['photo']['name'];
$temp_photo=$_FILES['photo']['tmp_name'];
$type_photo=$_FILES['photo']['type'];
if($type_photo=="image/jpg" || $type_photo=="image/jpeg" || $type_photo=="image/bmp" || $type_photo=="image/png")
	{
            $target="images/";
                    $target_file= $target.basename($_FILES['photo']['name']);
		if(move_uploaded_file($temp_photo,$target_file))
					{
$query = "INSERT INTO hosps (hosp_name,hospEmail,pass,hosp_img,address,regtime) VALUES ('$username','$email','$password','images/$name_photo','$add',NOW())";
$data = mysqli_query($con,$query)or die(mysqli_error($con)); 
if($data) 
    { echo "YOUR REGISTRATION IS COMPLETED..."; 
    echo '
     <a href="login.php" style="color:dodgerblue">Click Here to Setup</a>';
    } 
    else
    {
        echo "<script type='text/javascript'>alert('Unable to process your request!');
                    window.location='register.php';
                        </script>"; 
    }
    }
    else{
        echo "<script type='text/javascript'>alert('Error!');
                    window.location='register.php';
                        </script>"; 
    }
        }
    else{
       echo "<script type='text/javascript'>alert('Invalid image type!');
                    window.location='register.php';
                        </script>";  
    }
        }
function SignUp() 
{ 
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
    if(!empty($_POST['uname'])) {
    $query = mysqli_query($con,"SELECT * FROM hosps WHERE hosp_name = '$_POST[uname]' AND hospEmail = '$_POST[email]'") or die(mysqli_error($con));
    if(!$row = mysqli_fetch_array($query)) 
            { 
                NewUser(); 
            }   
            else{
                echo "SORRY...YOU ARE ALREADY A REGISTERED USER...\n";
                echo '
                <a href="login.php" style="color:dodgerblue">Click Here to LOGIN</a>';
            }
    }
}
?>