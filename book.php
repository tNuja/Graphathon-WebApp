<!DOCTYPE html>
<html>
<body>
<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$quex="SELECT * from users where user_Name='$loged_user' ";
$rowb=mysqli_query($con,$quex) or die(mysqli_error($con));
$user = mysqli_fetch_array($rowb);
$userid=$user[user_id];
$date=$_POST['myDate'];
$time=$_POST['time'];
$fname=$_POST['name'];
$num=$_POST['number'];
$doc=$_POST['doc'];
$query2=mysqli_query($con,("SELECT * from docs where doc_id=$doc")) or die(mysqli_error($con));
$req=mysqli_fetch_array($query2);
    $hospid=$req['hosp_id'];
$query_insert="INSERT INTO `bookings` (`booking_id`,`doc_id`,`hosp_id`, `user_id`,`day`,`slot`,`name`,`number`) VALUES (NULL,'$doc','$hospid', '$userid','$date','$time','$fname','$num')";
$insertiontodatabase=mysqli_query($con,$query_insert) or die(mysqli_error($con));
		if($insertiontodatabase)
		{    
                    echo "<script type='text/javascript'>alert('Appointment was booked successfully! Check My Appointments for details.');
                    window.location='home.php';
                        </script>";
		 }
		else
		{
		header('location:home.php?msg=Error');	
		} ?>
</body>
</html>