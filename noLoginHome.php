<?php
require_once("includes/constDatabase.php");
//require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$query=" Select * from hosps " ;
$hospad=mysqli_query($con,$query);
 ?> 

<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="includes/w3-style.css">

   <body>
       <?php include("includes/noLoginHead-side.html"); ?>
       <div class="w3-main" style="margin-left:300px">
        <div id="body"> 
            <?php
        while($rec=mysqli_fetch_array($hospad)){ 
        $hspid=$rec['hosp_id'];
        
     ?>
            <div style="width: 100%;">
<div style="float:left">
  <img src="<?php echo ($rec['hosp_img']);?>"
     alt="pic" style="border-radius:50%; height:250px; width:250px; padding:7px; -webkit-box-shadow:  0px 0px 5px 1px #FFD57D;
     box-shadow:  0px 0px 5px 1px #FFD57D; "/>
</div>
    <div style="margin-left:604px">
    <div  style="color:#217c76;line-height: 4.8;"><?php echo $rec['hosp_name']; ?>
    </div>
    <div style="color:#777;line-height: 4.8;"><?php echo $rec['address']; ?>
  </div>
        <div> <form id="details" method="post" action="noLoginDisplayDoctors.php">
 <input type="hidden" name="hospid" value="<?php print $hspid; ?>"/>
        <i class="w3-padding w3-text-teal fa fa-info-circle" style="align-content: center"></i><input type="submit" name="details" value="Details"/>
          </form>
        </div>
        </div>
       </div>
            <div style="clear:both"></div>
        <?php }
    ?>
       </div>
           </div>

    </body>
</html>