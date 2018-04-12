<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$quex="SELECT * from hosps where hosp_name='$loged_user' ";
$rowb=mysqli_query($con,$quex) or die(mysqli_error($con));
$user = mysqli_fetch_array($rowb);
$userid=$user[hosp_id];
$query = mysqli_query($con,"SELECT * FROM bookings WHERE hosp_id = '$userid' order by status asc") or die(mysqli_error($con));

 ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="includes/w3-style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table {
    font-family: "Lato", sans-serif;
   border-spacing: 5px 12px;
  padding: 0 8px 8px 0;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
/* Dropdown Button */
.dropbtn {
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
   <body>
       <?php include("includes/head-side2.html"); ?>
       <div class="w3-main" style="margin-left:300px">
           <h3><?php echo $loged_user; ?>--Appointments</h3>
           <h2></h2>
<div id="body">
   <?php if(mysqli_num_rows($query)==0)
{
	echo "You have no appointments.";
} 
else{ ?>
  <table >
	<tr style="font-size:25px">
    	<th>Patient Name</th>
        <th>Doctor</th>
        <th>Appointment Day</th>
         <th>Time</th>
         <th>Status</th>
        </tr> 
<?php while($ret=mysqli_fetch_array($query))
{
    $query2 = mysqli_query($con,"SELECT doc_name FROM docs WHERE doc_id = '$ret[doc_id]' ") or die(mysqli_error($con));
    $req=mysqli_fetch_array($query2);
    $docname=$req['doc_name'];
?>
	<tr style="font-size:15px">
    	<td><?php echo $ret['name']; ?></td>
    	<td><?php echo $docname; ?></td>
    	<td><?php echo $ret['day']; ?></td>
        <td><?php echo $ret['slot']; ?></td>
        <?php if($ret['status']=='Y') { ?>
        <td><i class="fa fa-check w3-button" style="color:green"></i> Completed</td>
        <?php } elseif($ret['status']=='Z') { ?>
        <td><i class="fa fa-close w3-button" style="color:red"></i> Failed</td>
        <?php } else { ?>
        <td><div class="dropdown"><button class="dropbtn"><i class="fa fa-exclamation-circle" style="color:orange" title="Complete/Incomplete" ></i></button><div class="dropdown-content"><form action="changeStat.php" method="post">
						<input type="hidden" name="status" value="Y"/>
                                                <input type="hidden" name="booking" value="<?php print $ret['booking_id']; ?>"/>
                                                <button type="submit"><i class="fa fa-check "></i></button>Complete
                                                </form>
                   <form action="changeStat.php" method="post">
						<input type="hidden" name="status" value="Z"/>
                                                <input type="hidden" name="booking" value="<?php print $ret['booking_id']; ?>"/>
                                                <button type="submit"><i class="fa fa-close "></i></button>InComplete
                                                </form> </div></div>
            Waiting</td>
        <?php } ?>
    </tr>
<?php
}
}
?>
</table>
</div>
       </div>
       </body>
       </html>

