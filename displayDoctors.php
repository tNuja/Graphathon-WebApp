<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
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
<!--<link rel="stylesheet" href="modal.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
        <?php
            include("includes/head-side.html");
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
    <div style="color:#777"><?php echo $rec['about']; ?>
  </div>
        
        <i class="w3-padding w3-text-teal fa fa-calendar" style="margin-left:-17px"></i><button id="myBtn" data-toggle="modal" data-target="#myModal" style="border:none;color:orange">Book an Appointment</button>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          <!-- Modal content -->
          <div class="modal-content">
              <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Book an Appointment</h4> <br>
            <form action="book.php" method="post">
                <p style="color:#217c76">Select Day</p>
                <input type="date" name="myDate" value="2018-04-13">
                <p style="color:#217c76">Select a Time Slot</p>
               <select name="time">
                      <option value="10:00 am - 10:30 am">10:00 am -- 10:30 am</option>
                      <option value="12:00 pm - 12:30 pm">12:00 pm -- 12:30 pm</option>
                      <option value="03:00 pm - 03:30 pm">03:00 pm -- 03:30 pm</option>
                      <option value="05:00 pm - 05:30 pm">05:00 pm -- 05:30 pm</option>
               </select> 
                <br>
                <p style="color:#217c76">Name:</p>
                      <input type="text" name="name" required><br>
                     <p style="color:#217c76">Number:</p>
                      <input type="text" name="number" required>
                       <input type="hidden" name="doc" value="<?php print $rec['doc_id']; ?>"/>
                      <input type="submit" class="btn btn-primary">
                  </form>
              </div> </div>
          </div>
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
