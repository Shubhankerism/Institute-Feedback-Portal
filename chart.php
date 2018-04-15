<!DOCTYPE html>
<html>
<head>
    <title></title>
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
<body>


<?php
$server='localhost';
    $username='root';
    $password='';
    $db='feedback system';
    $conn=mysqli_connect($server,$username,$password,$db);
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

<div class="container" >
<div style="width: 50%; height: 100%;" align="center">

<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
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
</div>
</body>
</html>