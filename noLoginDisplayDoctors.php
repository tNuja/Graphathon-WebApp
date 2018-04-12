<?php
require_once("includes/constDatabase.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$query=" Select * from docs where hosp_id= '$_POST[hospid]' " ;
$query2=" Select * from hosps where hosp_id= '$_POST[hospid]' " ;
$hosps=mysqli_query($con,$query2);
$ret=mysqli_fetch_array($hosps);
$docs=mysqli_query($con,$query);
 ?> 

<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="includes/w3-style.css">
<link rel="stylesheet" href="modal.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <body>
        <?php
            include("includes/noLoginHead-side.html");
         ?>
   <div style="margin-left:310px">
           <h3><?php echo $ret['hosp_name'];?></h3> 
   <div style="float:left">
       <img src="<?php echo $ret['hosp_img']; ?>" alt="Banner" style="width:300px; height:200px;"><br></div>
        <div style="margin-left:604px">
    <div  style="color:#777;"><i class="fa fa-map-marker"></i><?php echo " ";echo $ret['address']; ?>
    </div>
    <div style="color:#217c76;"><i class="fa fa-envelope"></i><?php echo " "; echo $ret['hospEmail']; ?>
  </div>
        </div>
           <div style="clear:both"></div>
           <br></br>
        <div id="body"> 
            <?php
        while($rec=mysqli_fetch_array($docs)){
            ?>
   
            <div style="width: 100%;">
<div style="float:left">
  <img src="<?php echo ($rec['doc_img']);?>"
     alt="pic" style="border-radius:50%; height:120px; width:120px; padding:7px; -webkit-box-shadow:  0px 0px 5px 1px #FFD57D;
     box-shadow:  0px 0px 5px 1px #FFD57D; "/>
</div>
    <div style="margin-left:604px">
    <div  style="color:#217c76;"><?php echo $rec['doc_name']; ?>
    </div>
    <div style="color:#777;l"><?php echo $rec['about']; ?>
  </div>
        
        <i class="w3-padding w3-text-teal fa fa-calendar" style="margin-left:-17px"></i><a href="login.php">Login To Book An Appointment</a>
        </div>
       </div>
            <div style="clear:both"></div>
        <?php }
    ?>
       </div>
   </div>
    </body>
</html>