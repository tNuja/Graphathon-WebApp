<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<body>
        <div class="col-md-6" style="margin-left:200px; margin-top:100px">
            <h3>Sign Up</h3>
            <img src="images/icon1.png" alt="Avatar" class="avatar" style="height:100px">
            <form action="conSignup.php" method="POST">
                <div class="form-group">
                <label for="name">Username</label>
                    <input class="form-control" type="text" name="uname" required placeholder="Enter YourName"> 
                </div>
                    <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" required placeholder="Enter Email"> 
                 </div>
               <div class="form-group"> 
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="psw" required placeholder="Enter Password">
               </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
</body>
</html>