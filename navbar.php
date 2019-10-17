<!DOCTYPE html>

<?php
if(isset($_POST['submit_ad']))
{

$pass="admin";
$userpass=$_POST['password'];
//this is a navbar
// session_start();
// $_SESSION['check']=1;

//echo $userpass;
if(!strcmp($pass,$userpass))
{
	 session_start();
 $_SESSION['check']=1;
	header('Location:admin.php');
}
else
{
	
	echo "<script>alert('INCORRECT PASSWORD!'); 
		  window.location='index.php';</script>";

	//header('Location:index.php');

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
</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top" >
	
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainnavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">INSTITUTE FACULTY FEEDBACK PORTAL</a>		
		</div>

		<div class="collapse navbar-collapse" id="mainnavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php" target="_blank">About</a></li>
					<li><a href="contact.php" target="_blank">Contact</a></li>
					<!--<li class="navbar-right"><a href="#popup" data-toggle="modal">LOGIN</a></li>-->
				</ul>
				
				<div class="nav navbar-nav navbar-right navbar-btn" style="margin-right: 0px;">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#popup">
							LOGIN
							<span class="label label-default"> Admin </span>
					</button>	 		
				</div>

		</div>
	</div>
</nav>

<div class="modal fade" role = "dialog" id="popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-title">
						<h3 align="center">
							<b><u>ADMIN<u></b>
						</h3>
					</div>
				</div>
				<form role="form" action="navbar.php" method="post">
				<div class="modal-body">
					
						<div class="input-group">
   						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="password" placeholder="Password">	
						</div>
				</div>
				<div class="modal-footer">
					<!-- <button class="btn btn-primary btn-block"> 
						LOG IN
					</button> -->
					<input type="submit" name="submit_ad"  class="btn btn-primary btn-block" >
				</div>
				</form> 
			</div>
			
		</div>
</div>
<br><br>
</body>
</html>
