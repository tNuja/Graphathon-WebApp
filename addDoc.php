<?php
error_reporting(0);
require("includes/constDatabase.php");
require("includes/user_session.php");

if(isset($_POST['docname']))
{
	D(); 
}

function NewDoc() { 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$docnam =$_POST['docname'];
$abt =$_POST['about'];
$name_photo=$_FILES['photo']['name'];
$type_photo=$_FILES['photo']['type'];
$temp_photo=$_FILES['photo']['tmp_name'];
$error_photo=$_FILES['photo']['error'];
$hospid=$_POST['hospId'];
if($type_photo=="image/jpg" || $type_photo=="image/jpeg" || $type_photo=="image/bmp" || $type_photo=="image/png")
	{
            $target="images/";
                    $target_file= $target.basename($_FILES['photo']['name']);
		if(move_uploaded_file($temp_photo,$target_file))
					{
                     
        $query_insert="INSERT INTO `docs` (`doc_id`, `doc_name`,`about` ,`hosp_id`, `doc_img`) VALUES (NULL, '$docnam','$abt', '$hospid' , 'images/$name_photo')";
						
		$insertiontodatabase=mysqli_query($con,$query_insert) or die(mysqli_error($con));
		if($insertiontodatabase)
    { echo "<script type='text/javascript'>alert('Doctor added successfully!');
                    window.location='docList.php';
                        </script>"; 
    } 
}
 else {
    echo "<script type='text/javascript'>alert('Error in Uploading!');
                    window.location='docList.php';
                        </script>"; 
    }
        }
}
function D() 
{ 
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
    if(!empty($_POST['docname'])) 
    {
        $pdn=$_POST['docname'];
    $query = mysqli_query($con,"SELECT * FROM docs WHERE doc_name = '$pdn'" ) or die(mysqli_error($con));
    if(!$row = mysqli_fetch_array($query)) 
    { 
        NewDoc(); 
    }   
    else{

        echo "<script type='text/javascript'>alert('Doctor already added!');
                    window.location='docList.php';
                        </script>";
        

        }
    }
}

?>