<?php require_once("constDatabase.php"); ?>
<?php
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		session_start();
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
			
		}
		
		// 4. Destroy the session
		session_destroy();
		header('location:../index.php?msg=You are now logged out.');
		exit;
			
?>
