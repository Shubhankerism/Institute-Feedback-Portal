<!DOCTYPE html>
<?php
$server='localhost';
$username='root';
$password='';
$db='feedback system';
$conn=mysqli_connect($server,$username,$password,$db);
// if($conn)
// echo "CONNECTED";
// if(isset($_GET['but']))
// {session_start();
// $_SESSION['check']=1;}
session_start();
  if(!isset($_SESSION['check'])) {
      header("Location: index.php"); 
    }
?>

<html>
<head>
	<title>Admin</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #bbff86">


<div class="container" style="background-color: white; opacity: 1;">
	<br>
	<div class="jumbotron">
	<h1 align="center" style="font-family: carson;">Welcome,  admin.</h1>	
	</div>
	<br>
  <!-- <h2>Select Faculty Name:</h2> -->

<?php
// session_start();
// $_SESSION['check']=1;
$q1="Select count(f_id) as tot from faculty;";
$res1=mysqli_query($conn,$q1);
while($t1=mysqli_fetch_assoc($res1))
{
    $tot=$t1['tot'];
}
$q2="SELECT f_id , AVG(r1+r2+r3+r4+r5+r6+r7+r8+r9+r10) as summer FROM `response` GROUP BY `f_id`";
$res1=mysqli_query($conn,$q2);
$fids=[];
$averageperfaculty=[];
while($t1=mysqli_fetch_assoc($res1))
{
    array_push($fids,$t1['f_id']);
    $averageperfaculty[$t1['f_id']]=$t1['summer'];
}
$q2="SELECT * FROM `faculty`";
$res1=mysqli_query($conn,$q2);
$fnames=[];
while($t1=mysqli_fetch_assoc($res1)){
    $fnames[$t1['f_id']]=$t1['fname'];
}

//cho $fids[0]." ".$fnames[$fids[0]]." ".$averageperfaculty[$fids[0]];


?>

<!-- <div class="container" > -->
<div style="width: 100%; height: 100%;" id="divid" >

<!-- <canvas id="myChart" width="400" height="400"></canvas> -->
<canvas id="myChart" ></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var change='bar';
// function changeview()
// {
// 	if(change=='bar')
// 		change='pie';
// 	else
// 		change='bar';
// 	alert(change);
// 	$div(#divid).load(" #divid > *");
// }
var myChart = new Chart(ctx, {
    type: change,
    data: {
        labels: ["<?php echo $fnames[$fids[0]] ?>", "<?php echo $fnames[$fids[1]] ?>", "<?php echo $fnames[$fids[2]] ?>", "<?php echo $fnames[$fids[3]] ?>", "<?php echo $fnames[$fids[4]] ?>", "<?php echo $fnames[$fids[5]] ?>"],
        datasets: [{
            label: 'Performance:',
            data: [<?php echo $averageperfaculty[$fids[0]]*2?>, <?php echo $averageperfaculty[$fids[1]]*2 ?>, <?php echo $averageperfaculty[$fids[2]]*2 ?>, <?php echo $averageperfaculty[$fids[3]]*2 ?>, <?php echo $averageperfaculty[$fids[4]]*2 ?>, <?php echo $averageperfaculty[$fids[5]]*2 ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</div>

<div>
	<pre style="font-size: 1.5vw; text-align: center; font-family: 'nexa light';" >OVERALL AVERAGE PERFORMANCE OF FACULTY AS RATED BY THE STUDENTS.</pre>
</div>

<!-- <button class="btn btn-info" id="change" onclick="changeview();">Switch View</button> -->
<hr>
<br>
  <form method='get' action="display.php">
    <div class="form-group" align="center">
      <h4  style="font-family: 'nexa light'; font-size: 20px;"><b>In case, you want to see individual performance report, select faculty from here:</b></h4>
     
      <select class="form-control" name="facultyname">
      	<?php

		$q="select * from faculty;";
		$res=mysqli_query($conn,$q);
		while($temp=mysqli_fetch_assoc($res))
		{
			$fid=$temp['f_id'];
			$fname=$temp['fname'];
			//$q1="Select r1,r2,r3,r4,r5,r6,r7,r8,r9,r10 from response where f_id=$fid";
			// $res1=mysqli_query($q1);
			// while($temp1=mysqli_fetch_assoc($res1));
			echo "<option>".$fname."</option>";
		}
        
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success" name="but">GO-></button>
    </div>
  </form>
  <hr><br>
  <div style="color: #001fff;" align="center">
  	If you are done then, you can logout here:
  <a href="logout.php"><button type="submit" class="btn btn-info" name="logoutadmin.php">Logout</button></a>
</div>
<br> <br>
</div>




</body>
</html>