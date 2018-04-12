<?php
error_reporting(0);
//require("includes/constDatabase.php");
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', null);
define('DB_NAME', 'larav');

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
    echo "tyj";
    $query = mysqli_query($con,"SELECT * FROM users") or die("Failed:".mysqli_error($con));
    $row = mysqli_fetch_array($query); 
    echo ($row['user_Name']);