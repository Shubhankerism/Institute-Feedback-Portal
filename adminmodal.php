<?php
if(isset($_POST['submit_ad']))
{

$pass="admin";
$userpass=$_POST['password'];
echo $userpass;
if(!strcmp($pass,$userpass))
{
	header('Location:admin.php');
}
else
{
	header('Location:index.php');
	echo "<script> alert('INCORRECT PASSWORD!');</script>";

}
}
?>