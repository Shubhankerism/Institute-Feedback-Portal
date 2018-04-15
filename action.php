<?php
	
	$server='localhost';
	$username='root';
	$password='';
	$db='feedback system';
	$conn=mysqli_connect($server,$username,$password,$db);
	/*if($conn)
	{
		echo "Connected!";
	}
	else
	{
		echo "NOT connected";
	}*/

	$year=$_POST['year'];
	$course=$_POST['course'];
	$roll=$_POST['roll'];
	  
	$q = "SELECT * FROM student where year=$year AND course='$course' AND roll_num=$roll";
	/*$sid=$conn->query($q1);
	echo $sid['s_id'];*/
	$res=mysqli_query($conn,$q);	
	$sid=mysqli_fetch_assoc($res);
	$reqid= $sid["s_id"];
	//$count= "SELECT count(sub_id) FROM form where s_id= "
	$q="SELECT count(sub_id) as tot FROM form where s_id=$reqid";
	$count=mysqli_query($conn,$q);
	$totalcount=mysqli_fetch_assoc($count);
	$count=$totalcount['tot'];
	echo "count:".$count;

	if($count<6)
		echo "LOGIN successful!";
	else
		echo "failed!";


	$cur_sem=(date("Y")-$year)*2;
	if(date('m')>8)
		$cur_sem++;
	echo $cur_sem;
	$q2="SELECT sub_id from semester where sem=cur_sem";
	// $res=mysqli_query($conn,$q2);
	// $sid=mysqli_fetch_assoc($res);



?>