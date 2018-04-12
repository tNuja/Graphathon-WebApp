<?php
error_reporting(0);
require("includes/constDatabase.php");
if(isset($_POST['email']))
{
	Login(); 
}
else if(isset($_POST['docemail']))
{
	docLogin(); 
}
function Login()
{
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
if(!empty($_POST['email']) && (!empty($_POST['password']))) {
    $query = mysqli_query($con,"SELECT * FROM users WHERE emaiLId = '$_POST[email]' AND pass = '$_POST[password]'") or die(mysqli_error($con));
    if(!$row = mysqli_fetch_array($query)) {
        echo "NOT A MEMBER ?  ";
                echo '
                <a href="signup.php" style="color:dodgerblue">Click Here to SIGNUP</a>';
         }
        else {
            $username=mysqli_query($con,"SELECT * FROM users WHERE emaiLId = '$_POST[email]'") or die(mysqli_error($con));
            $op = mysqli_fetch_array($username);
            $user=$op[user_Name];
		session_start();
		$_SESSION['users']=$user;
		header("location:home.php");
		exit;
        }
}
    }
function docLogin()
{
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
if(!empty($_POST['docemail']) && (!empty($_POST['password']))) {
    $query = mysqli_query($con,"SELECT * FROM hosps WHERE hospEmail = '$_POST[docemail]' AND pass = '$_POST[password]'") or die(mysqli_error($con));
    if(!$row = mysqli_fetch_array($query)) {
        echo "NOT A MEMBER ? Register yourself. ";
                echo '
                <a href="register.php" style="color:dodgerblue">Click Here to REGISTER</a>';
         }
        else {
            $username=mysqli_query($con,"SELECT * FROM hosps WHERE hospEmail = '$_POST[docemail]'") or die(mysqli_error($con));
            $ret = mysqli_fetch_array($username);
            $hosp=$ret[hosp_name];
		session_start();
		$_SESSION['users']=$hosp;
		header("location:docHome.php");
		exit;
        }
}
    }
?>