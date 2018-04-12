<?php
require_once("includes/constDatabase.php");
require_once("includes/user_session.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$quex="SELECT * from reports";
$rowb=mysqli_query($con,$quex) or die(mysqli_error($con));
$user = mysqli_fetch_array($rowb);
$userid=$user[user_id];
$query = mysqli_query($con,"SELECT * FROM reports WHERE user_id = '$userid'") or die(mysqli_error($con));
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
</style>
   <body>
       <?php include("includes/head-side.html"); ?>
       <div class="w3-main" style="margin-left:300px">
<div id="body">
   <?php if(mysqli_num_rows($query)==0)
{
	echo "You have no reports.";
} 
else{ ?>
  <table >
	<tr style="font-size:25px">
    	<th>Hospital/Clinic</th>
        <th>Report Name</th>
        <th>Uploaded On</th>
        </tr> 
<?php while($ret=mysqli_fetch_array($query))
{
    $rep=$ret['report_path'];
?>
	<tr style="font-size:15px">
    	<td><?php echo $ret['hosp_name']; ?></td>
    	<td><?php echo $ret['report_name']; ?></td>
        <td><?php echo $ret['upload_date']; ?></td>
        <td><a href="<?php echo $rep; ?>" class="w3-button" download><i class="fa fa-cloud-download"></i></a> </td>
        
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


