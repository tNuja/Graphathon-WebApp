<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$quex="SELECT * from hosps where hosp_name='$loged_user' ";
$rowb=mysqli_query($con,$quex) or die(mysqli_error($con));
$hosp = mysqli_fetch_array($rowb);
$hospid=$hosp[hosp_id];
 ?> 
<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="includes/w3-style.css">

   <body>
       <?php include("includes/head-side2.html"); ?>
       <div class="w3-main" style="margin-left:302px">
        <div id="body"> 
            <div style="width: 100%;">
<div>
    <h2 style="color:#217c76;"><?php echo ($hosp['hosp_name']);?></h2>
  <img src="<?php echo ($hosp['hosp_img']);?>"
     alt="pic" style="height:400px;width:600px; padding:7px; -webkit-box-shadow:  0px 0px 5px 1px #FFD57D;
     box-shadow:  0px 0px 5px 1px #FFD57D; "/>
</div>
                <div>
                    <h3>Details</h3>
                    <br>
                    <h4 style="color:#777;"><i class="fa fa-map-marker"></i><?php echo " ";echo $hosp['address']; ?></h4>
                    <h4 style="color:#217c76;"><i class="fa fa-envelope"></i><?php echo " "; echo $hosp['hospEmail']; ?></h4>
                </div>
                
            </div>
        </div> </div>
   </body>
</html>

