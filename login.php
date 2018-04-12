<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<body>
        <div class="col-md-6" style="margin-left:200px; margin-top:100px">
            <h3>Sign In</h3>
            <h4 style="margin-left:300px"><a href="#myModal" data-toggle="modal" style="background-color:#f2f2f2;border:none;color:#217c76"><i class="fa fa-plus"></i> A Doctor?Sign-In here</a></h4>
            <div  id="myModal" class="modal fade">
            <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign-In Doc</h4>
          <br>
          <form action="conLogin.php" method="POST">
                <div class="form-group"> 
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="docemail" required placeholder="Enter Email"> 
                </div>
                <div class="form-group"> 
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" required placeholder="Enter Password"> 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div> </div> </div> </div>
            <img src="images/img_avatar2.png" alt="Avatar" class="avatar" style="height:100px">
            <form action="conLogin.php" method="POST">
                <div class="form-group"> 
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" required placeholder="Enter Email"> 
                </div>
                <div class="form-group"> 
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" required placeholder="Enter Password"> 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
            <h4 style="margin-left:300px"><a href="signup.php" style="background-color:#f2f2f2;border:none;color:#217c76"><br><br><br><i class="fa fa-plus"></i> Not a User.Sign-Up here</a></h4>
        </div>
</body>
</html>