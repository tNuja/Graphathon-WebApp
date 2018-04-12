<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<body>
        <div class="col-md-6" style="margin-left:200px; margin-top:80px">
            <h3>Register With Us</h3>
            <img src="images/hosp.png" alt="Avatar" class="avatar" style="height:100px">
            <form action="conRegister.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="name">Hospital/Clinic Name</label>
                    <input class="form-control" type="text" name="uname" required placeholder="Enter Name"> 
                </div>
                <div class="form-group">
                <label for="name">Address</label>
                    <input class="form-control" type="text" name="add" required placeholder="Address"> 
                </div>
                <div class="form-group">
              <label for="photo"><i class="fa fa-file-image-o"></i> Upload Hospital photo</label>
                <input type="file" name="photo" id="photo">
               </div>
                    <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" required placeholder="Enter Email">  
                 </div>
               <div class="form-group"> 
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="psw" required placeholder="Enter Password"> 
                    <button type="submit" class="btn btn-primary">Submit</button>   
        </div>
            </form>
        </div>
</body>
</html>
