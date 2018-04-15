<?php

$server='localhost';
$username='root';
$password='';
$db='feedback system';
$conn=mysqli_connect($server,$username,$password,$db);
session_start();
// if($conn)
// echo "CONNECTED";

$fname=$_GET['facultyname'];
//echo $fname;

$q1="Select f_id from faculty where fname='$fname';";
$res1=mysqli_query($conn,$q1);
while($t1=mysqli_fetch_assoc($res1))
{
	$fid=$t1['f_id'];
	$q2="select avg(r1) as v1, avg(r2) as v2, avg(r3) as v3, avg(r4) as v4, avg(r5) as v5, avg(r6) as v6, avg(r7) as v7, avg(r8) as v8, avg(r9) as v9, avg(r10) as v10 from response where f_id=$fid;";
	$res2=mysqli_query($conn,$q2);
	while($t2=mysqli_fetch_assoc($res2))
	{
		$a1=$t2['v1']*20;
		$a2=$t2['v2']*20;
		$a3=$t2['v3']*20;
		$a4=$t2['v4']*20;
		$a5=$t2['v5']*20;
		$a6=$t2['v6']*20;
		$a7=$t2['v7']*20;
		$a8=$t2['v8']*20;
		$a9=$t2['v9']*20;
		$a10=$t2['v10']*20;
	}
}

//echo $a10;
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $fname; ?></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<style type="text/css">
		  	.chip {
		    display: inline-block;
		    padding: 0 25px;
		    height: 250px;
		    width: 800px;
		    font-size: 64px;
		    line-height: 50px;
		    text-align: center;
		    
		    background-color: #f4e588;
		    
		}

		.chip img {
		    float: left;
		    margin: 0 10px 0 -25px;
		    height: 265px;
		    width: 250px;
		    
		}
  	</style>
</head>
<body style="background-color: #f4e588;">


<div class="container" style="background-color: white; opacity: 0.8;">

	<br>
<!-- 	<div style="font-family: carson;  text-align: center;">
		<h1 style="font-size: 52px;"><?php echo $fname; ?></h1>
	</div> -->
	<center>	
	<div class="chip">
  		<img src="default.png" alt="Person" width="10" height="96">
  		<div style="margin: 90px 10px ; font-family:'nexa light';"><?php echo $fname; ?> <br> <small style="font-size: 2vw;">Designation</small></div>
	</div>
	</center>
	<hr>
	<br><br>
	<pre style="text-align: center; font-size: 1.5vw; font-family: 'nexa light';">PERFORMANCE REPORT</pre>
	<br><br>
	<label class="control-label">Objectives and the plan of the subject were specified:</label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a1; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a1; ?>%">
	    <?php echo $a1; ?>%
	  </div>
	</div><br>

	<label class="control-label">Coverage and depth of subject:</label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a2; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a2; ?>%">
	    <?php echo $a2; ?>%
	  </div>
	</div><br>
	
	<label class="control-label">The topics provided new knowledge:</label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a3; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a3; ?>%">
	    <?php echo $a3; ?>%
	  </div>
	</div><br>

	<label class="control-label">In terms of organisation, clearity and presentation of fundamental concepts, the lectures were: </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a4; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a4; ?>%">
	    <?php echo $a4; ?>%
	  </div>
	</div><br>

	<label class="control-label">Instructor's oral presentation was:</label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a5; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a5; ?>%">
	    <?php echo $a5; ?>%
	  </div>
	</div><br>

	<label class="control-label">Instructor's whiteboard(or ppt) presentation was: </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a6; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a6; ?>%">
	    <?php echo $a6; ?>%
	  </div>
	</div><br>	

	<label class="control-label">The quizzes reflected the course plan:  </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a7; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a7; ?>%">
	    <?php echo $a7; ?>%
	  </div>
	</div><br>

	<label class="control-label">Rather than rote learning, understanding was tested:  </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a8; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a8; ?>%">
	    <?php echo $a8; ?>%
	  </div>
	</div><br>

	<label class="control-label">Examinations were of proper length and level: </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a9; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a9; ?>%">
	    <?php echo $a9; ?>%
	  </div>
	</div><br>

	<label class="control-label">The marks given were fair and transparent: </label><br>
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active" role="progressbar"
	  aria-valuenow="<?php echo $a10; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a10; ?>%">
	    <?php echo $a10; ?>%
	  </div>
	</div><br>

</div>
</body>
</html>