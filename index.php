<!DOCTYPE html>
<?php

	use PHPMailer\PHPMailer\PHPMailer;

	require 'phpmailer\phpmailer\src\PHPMailer.php';
	require 'phpmailer\phpmailer\src\Exception.php';
	require 'phpmailer\phpmailer\src\SMTP.php';
	if(isset($_POST['submit']))
{
	session_start();
	$server='localhost';
	$username='root';
	$password='';
	$db='feedback system';
	$conn=mysqli_connect($server,$username,$password,$db);
	$year=$_POST['year'];
	$course=strtoupper($_POST['course']);
	$roll=$_POST['roll'];
	//echo "roll:".$roll;
	$_SESSION["year"]=$year;
	$q = "SELECT * FROM student where year=$year AND course='$course' AND roll_num=$roll";
	/*$sid=$conn->query($q1);
	echo $sid['s_id'];*/
	$res=mysqli_query($conn,$q);	
	$reqid=mysqli_fetch_assoc($res);
	$sid= $reqid["s_id"];
	if(isset($sid))
	{
	$q="SELECT count(sub_id) as tot FROM form where s_id=$sid";
	$res=mysqli_query($conn,$q);
	$totalcount=mysqli_fetch_assoc($res);
	$count=$totalcount['tot'];
	$_SESSION["sid"]=$sid;
	//echo "count:".$count;
	if($count<6){
		//echo "LOGIN successful!";
		$lcourse=strtolower($course);
		$myemail=$lcourse.'_'.$year.$roll.'@iiitm.ac.in';
		$otp=rand(10000,99999);
		//echo $otp;
		//echo "console.log("+$otp+")";
		
				// Import PHPMailer classes into the global namespace
				// These must be at the top of your script, not inside a function
				// use PHPMailer\PHPMailer\PHPMailer;

				// require 'phpmailer\phpmailer\src\PHPMailer.php';
				// require 'phpmailer\phpmailer\src\Exception.php';
				// require 'phpmailer\phpmailer\src\SMTP.php';

				//Load Composer's autoloader
				//require 'vendor/autoload.php';

				$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try {
				    //Server settings
				    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
				    $mail->isSMTP();                                      // Set mailer to use SMTP
				    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				    $mail->SMTPAuth = true;                               // Enable SMTP authentication
				    $mail->Username = 'shubhanker621@gmail.com';                 // SMTP username
				    $mail->Password = '@9415428621@';                           // SMTP password
				    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				    $mail->Port = 587;                                    // TCP port to connect to

				    //Recipients
				    $mail->setFrom('shubhanker621@gmail.com', 'Shubhanker');
				    $mail->addAddress($myemail, 'User');     // Add a recipient
				/*    $mail->addAddress('ellen@example.com');               // Name is optional
				    $mail->addReplyTo('info@example.com', 'Information');
				    $mail->addCC('cc@example.com');
				    $mail->addBCC('bcc@example.com');*/

				    //Attachments
				   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

				    //Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'OTP for Feedback Form';
				    $mail->Body    = "<b>".$otp."</b> is your OTP.<br>Thanks for using the Feedback Portal.<br> Drop in your valuable feedback at +91-9454932137. <br><br><i>Shubhanker Srivastava<br>2016 IPG 104</i>";
				   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				    $mail->send();
				    //echo 'Message has been sent';
				} catch (Exception $e) {
				    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
		echo '<script>
				 var otpr = prompt("Enter the OTP sent at your webmail ['.$myemail.'] :", "00000");
				 var otps='.$otp.'; 
				 
				 if(otpr==otps)
				 	window.location="form.php";
				 else
				 	alert("Wrong OTP! Try Again!");
			  </script>';

		//header('Location:form.php');
		// $email=$course.'_'.$year.$roll.'@iiitm.ac.in';
		// echo "<script>alert('".$email."');";
		// echo "<script> otp(); </script>";
	}

	else
		echo '<script> alert("Sorry! You can\'t login. You have already filled your forms."); </script>';	
	}
	else
	{
		echo "<script> alert('Enter valid roll number!');</script>";
	}

}
?>

<html>
<head>
	<title>Feedback Portal</title>  
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		.line{
  			font-family:"Arial";
  			text-align: center;
  			font-weight: bold;
  			font-size: 2vw;
  		}
  				body, html {
		    height: 100%;
		    margin: 0;



		    /* The image used */
		    background-image: url("mail.jpg");

		    /* Full height */
		    height: 100%; 

		    /* Center and scale the image nicely */
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		}
  		/*.box{
  			width: 96%;
    		padding: 5px;
		    margin: 25px;
		    border: 1px solid black;
    		outline-style: solid;
    		outline-color: grey;
    		outline-width: thin;
		}*/

  		/*.move{
  			
  			color: red;
  			font-family: "Times New Roman";
  		}*/

  	</style>
</head>
<body style="/*width: 100%; height: 400px; background-size: cover;">
<br><br><br><br>
<?php include 'navbar.php'; ?>
<!-- <h1 style="font-family: 'rockwell'; color: #000000; font-size: 4vw; text-align: center; text-shadow: 2px 2px #c0c0c0;">
	Feedback Portal
</h1> -->

<!--<div class="jumbotron text-center" style="margin-bottom:0">
<h1> Feedback Portal</h1>
</div>--><br><br><br><br><br><br><br><br>
<!-- <marquee scrollamount="10">
	<div class="lead" style="color: #c0c0c0"><mark>
	&nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  &nbsp; The feedback will stay strictly confidential!  </mark>
	</div>	
</marquee> -->	
<br>
<br>
<div class="box">
<br>
<br>
<div class="line" style="color: black; font-family: 'nexa light'; font-size: 2vw; /*text-shadow: 2px 2px white">
	Enter your ROLL NUMBER as issued by the college:
</div>
<br>
<div align="center" >
	<form action="index.php" method="POST">
		<span class="label label-primary" style="font-size: 1vw;">Year</span>&nbsp;&nbsp;<input type="number" name="year" placeholder=" eg: 2016" required>&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="label label-primary" style="font-size: 1vw;">Course</span>&nbsp;&nbsp;<input type="text" name="course" placeholder=" eg: IPG" required>&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="label label-primary" style="font-size: 1vw;">Roll Number</span>&nbsp;&nbsp;<input type="number" name="roll" placeholder=" eg: 104" required>
		<br>
		<br>
		<input class="btn btn-success" type="submit" name="submit" > 


	</form>	
	<br>
	<div  style="color: red; font-family: 'nexa light'; font-size: 1.05vw;"><mark>The feedback will stay strictly confidential.</mark></div>
</div>
<br>
<br>
</div>

<div class="modal fade" role = "dialog" id="otp">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
					<div class="modal-title">
						<h3 align="center">
							Enter OTP!
						</h3>
					</div>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="input-group">
   						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="password" placeholder="Password">	
						</div>
					</form>					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-block"> 
						LOG IN
					</button>
				</div>
			</div>
			
		</div>
</div>

</body>
<?php
//session_destroy();
?>
</html>

