<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
if(isset($_POST['status']))
{
    $stat=mysqli_real_escape_string($con,$_POST['status']);
    $id=$_POST['booking'];
    mysqli_query($con, "UPDATE bookings SET status='$stat' WHERE booking_id='$id'")or die(mysqli_error($con));
    echo "<script type='text/javascript'>alert('Status Changed!');
                    window.location='hospApt.php';
                        </script>";
    }
?>