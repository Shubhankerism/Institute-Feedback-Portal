<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact Us</title>
<style>
html {
  box-sizing: border-box;
}

    body, html {
    height: 100%;
    margin: 0;



    /* The image used */
    background-image: url("bbg.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}


.card {
  box-shadow: 0 20px 20px 0 rgba(0, 0, 0, 0.2);
  background-color:  #c0c0c0;
  /*background-image: url('bbg.jpg');*/
  border-width: : 2px;
  
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
  
}

h3{
  font-size: 24px;
  font-family: "arial";

}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  align-self: center;
  width: 21%;
  
}

.title{
   font-size: 25px;
   font-family: 'carson';  
   color: black;
 }
img {
    /*border-radius: 20%;*/
}

.button:hover {
  background-color: #555;
}
</style>
</head>
<body style="background-color: #69696C">
<<?php 
include 'navbar.php';
 ?>

<!--<div class="jumbotron text-center" style="margin-bottom:0">
  <h1 font-family="arial">Meet the team!</h1>
</div>-->

<br><br>

<div class="container">
<h1 style="font-family: 'nexa light'; color:black; font-size: 4vw; text-align: center; text-shadow: 2px 2px #c0c0c0; background-color: white; opacity: 0.8;">
  <hr>
  Meet the Team!
  <hr>
  
</h1>
<br><br>
<br>
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <img src="images/Shubhanker.jpg" alt="Shubhanker" style="width:100%;">
      <div class="container">
        <h3 style="font-family: 'carson';  color: black;">Shubhanker Srivastava</h3>
        <p class="title">2016-IPG-104</p>
        <p><a href="https://www.facebook.com/shubhanker.srivastava.1" target="_blank"><button class="button"><i class="fa fa-facebook-square" style="font-size:30px ;color:white"></i></button></a></p>
      </div>
    </div>
  </div>

    <div class="col-sm-3">
    <div class="card">
      <img src="images/dummy.jpg" alt="placeholder" style="width:100%;">
      <div class="container">
        <h3 style="font-family: 'carson';  color: black;">Name</h3>
        <p class="title">Roll number</p>
         <p><a href="https://www.facebook.com/username" target="_blank"><button class="button"><i class="fa fa-facebook-square" style="font-size:30px ;color:white"></i></button></a></p>
      </div>
    </div>
  </div>

   <div class="col-sm-3">
    <div class="card">
      <img src="images/dummy.jpg" alt="placeholder" style="width:100%;">
      <div class="container">
        <h3 style="font-family: 'carson';  color: black;">Name</h3>
        <p class="title">Roll number</p>
         <p><a href="https://www.facebook.com/username" target="_blank"><button class="button"><i class="fa fa-facebook-square" style="font-size:30px ;color:white"></i></button></a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <img src="images/dummy.jpg" alt="placeholder" style="width:100%;">
      <div class="container">
        <h3 style="font-family: 'carson';  color: black;">Name</h3>
        <p class="title">Roll number</p>
         <p><a href="https://www.facebook.com/username" target="_blank"><button class="button"><i class="fa fa-facebook-square" style="font-size:30px ;color:white"></i></button></a></p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
