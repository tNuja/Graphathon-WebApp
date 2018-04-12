<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$quex="SELECT * from hosps where hosp_name='$loged_user' ";
$rowb=mysqli_query($con,$quex) or die(mysqli_error($con));
$hosp = mysqli_fetch_array($rowb);
$hospid=$hosp[hosp_id];
$query="SELECT * from docs where hosp_id='$hospid' ";
$row=mysqli_query($con,$query) or die(mysqli_error($con));
 ?> 
<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="includes/w3-style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <body>
       <?php include("includes/head-side2.html"); ?>
       <div class="w3-main" style="margin-left:304px">
           <h2 style="color:#217c76;"><?php echo ($loged_user);?></h2>
           <span style="color:#217c76;margin-left:270px;margin-top:100px"><button title="Add Doc" data-toggle="modal" data-target="#myModal" style="background-color:#f2f2f2;border:none;color:#217c76"><i class="fa fa-plus w3-button"></i></button>Add Doctor
             </span>
           <div  id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Doc</h4>
          <br>
          <form action="addDoc.php" method="POST" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label for="docname">Doctor Name</label>
                    <input class="form-control" type="text" name="docname" required placeholder="Enter name"> 
                </div>
                <div class="form-group"> 
                    <label for="about">Specialization</label>
                    <input class="form-control" type="text" name="about" required placeholder="Enter specialization"> 
                </div>
              <div>
              <label for="photo"><i class="fa fa-file-image-o"></i> Upload doc photo</label>
                <input type="file" name="photo" id="photo">
                <input type="hidden" name="hospId" value="<?php echo $hospid; ?>">
                <br/><span class="valid"></span></div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div> </div> </div> </div>
           <h3> DOCTORS</h3><br>
        <div id="body"> 
            <?php
        while($rec=mysqli_fetch_array($row)){
            ?>
            <div style="width: 100%;">
    
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
    </div>
</div>
            </div><br><br><br><br><br>
        <?php } ?>
        </div>  </div>