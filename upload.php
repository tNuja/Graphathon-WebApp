<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
if(isset($_POST['repnum']))
{
    $name_file=$_FILES['file']['name'];
    $temp_file=$_FILES['file']['tmp_name'];
     $file_type=$_FILES['file']['type'];
     $repno=$_POST['repnum'];
     $patname=$_POST['patname'];
     $title=$_POST['reptit'];
    //$file_ext=strtolower(end(explode('.',$_FILES['report']['name'])));
     if ($file_type=="application/pdf" )
     {
     if(move_uploaded_file($temp_file,"reports/".$name_file))
					{ 
      
         $query = mysqli_query($con,"SELECT * FROM users WHERE user_Name = '$patname'") or die(mysqli_error($con));
         $user = mysqli_fetch_array($query);
            $userid=$user[user_id];
          mysqli_query($con, "INSERT INTO reports values(NULL,'$repno','$userid','$title','$loged_user','reports/$name_file')")or die(mysqli_error($con));
    echo "<script type='text/javascript'>alert('File Uploaded Successfully!');
                    window.location='uplReport.php';
                        </script>";
     }    
 else{
      echo "<script type='text/javascript'>alert('Uploading Error!');
                    window.location='uplReport.php';
                        </script>";
        }
    }
         
 else {
         echo "<script type='text/javascript'>alert('Invalid file type!');
                    window.location='uplReport.php';
                        </script>";
      
        }
}
?>