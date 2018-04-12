<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="includes/w3-style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  
<body>
<?php include("includes/head-side2.html"); ?>
       <div class="w3-main col-md-6" style="margin-left:304px">
           <h2>Upload Patient Report</h2><br>
         <form action="upload.php" method="POST" enctype="multipart/form-data">
             <div class="form-group"> 
                    <label for="reptit">Report Title</label>
                    <input class="form-control" type="text" name="reptit" required placeholder="Give Report Title"> 
                </div>
             <div class="form-group"> 
                 <label for="report">Upload Report</label><br>
                    <i class="fa fa-file"></i><input type="file" name="file" size="5000">
             </div>
                <div class="form-group"> 
                    <label for="repnum">Report Number</label>
                    <input class="form-control" type="text" name="repnum" required placeholder="Enter Report Number"> 
                </div>
                <div class="form-group"> 
                    <label for="patname">Patient Name</label>
                    <input class="form-control" type="text" name="patname" required placeholder="Enter Patient Name"> 
                </div>
                <input type="submit" value="Upload" class="btn btn-primary"/>
                
            </form>  
       </div>
</body>
</html>