<?php
	
	session_start();
	$server='localhost';
	$username='root';
	$password='';
	$db='feedback system';
	$conn=mysqli_connect($server,$username,$password,$db);
	$year=$_POST['year'];
	$course=$_POST['course'];
	$roll=$_POST['roll'];
	//echo "roll:".$roll;
	$_SESSION["year"]=$year;
	$q = "SELECT * FROM student where year=$year AND course='$course' AND roll_num=$roll";
	/*$sid=$conn->query($q1);
	echo $sid['s_id'];*/
	$res=mysqli_query($conn,$q);	
	$reqid=mysqli_fetch_assoc($res);
	$sid= $reqid["s_id"];
	$q="SELECT count(sub_id) as tot FROM form where s_id=$sid";
	$res=mysqli_query($conn,$q);
	$totalcount=mysqli_fetch_assoc($res);
	$count=$totalcount['tot'];
	$_SESSION["sid"]=$sid;
	//echo "count:".$count;
	if($count<6){
		echo "LOGIN successful!";
		echo '<script> alert("enter otp");</script>';
		header('Location:form.php');
	}

	else
		//<script> alert("Sorry! You can't login. You have already filled your forms.") </script>;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>