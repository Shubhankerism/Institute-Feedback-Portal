<!DOCTYPE html>
<?php
  $server='localhost';
  $username='root';
  $password='';
  $db='feedback system';
  $conn=mysqli_connect($server,$username,$password,$db);
  $abc;
  $subid;
  session_start();
  if(!isset($_SESSION['sid'])) {
      header("Location: index.php"); 
    }
  $stud=$_SESSION["sid"];

  if($_SESSION['year']==NULL)
    echo "<script>window.stop();</script>";
  error_reporting(0);
?>
<html>
<head>
	<title>Fill the form</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
/*	/* The sidebar menu 
.sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 12.5%; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #111; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: bold;
    font-size: 15px;
    color: white;
    display: inline-block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}*/*/
</style>
<!-- <script type="text/javascript">
  function show()
  {
    
     /*alert("wdc");
     var my_variable_name = "<?php //echo $abc; ?>";*/
     //while(<?php isset($abc)&&isset($subid)?>)
     {
     document.getElementById('first').style.display = "none";
     document.getElementById('formid').style.display = "block";
     }
  }
</script> -->
</head>
<body link=white>

<div class="container-fluid " >
  <br>
  
	<div class="well page-header col-sm-12" align="center" style="font-family: carson;">
		<h1>
      <?php  
          //session_start();
          //echo date("Y")."  ".$_SESSION["year"];
          $cur_sem=(date("Y")-$_SESSION["year"])*2;
          if(date('m')>8)
            $cur_sem++;
          echo "Semester ".$cur_sem;
      ?>   
    </h1>
	</div>
 </div> 

 <div class="container-fluid">
  <div class="alert alert-danger" id="alert_fac" style="display: none;"  style="text-align: center;"> <b> <center>Kindly select one faculty member.
  </center> </b></div>

  <div class="alert alert-success" id="fac_name" style="display: none; text-align: center; font-family: 'nexa light'; font-size: 2vw;" > <b> <center>
    <?php
      $t=$_GET['id'];
      $q="select fname from faculty where f_id=$t";
      $res=mysqli_query($conn,$q);
      while($fid=mysqli_fetch_assoc($res))
        echo $fid['fname'];
      $q="SELECT subject.sname as name FROM subject inner join fac_sub on subject.sub_id=fac_sub.sub_id AND fac_sub.f_id=$t";
      $res=mysqli_query($conn,$q);
      while($fid=mysqli_fetch_assoc($res))
        echo "<br>Subject: ".$fid['name'];
    ?>
  </center> </b></div>

<!-- <div class="sidenav col-sm-3"> -->

  <nav class="navbar navbar-inverse navbar-fixed-top" >
  
  <div class="container-fluid">
    <div class="navbar-header">
  <a href="#" class="navbar-brand">FACULTY LIST:</a>    
    </div>

    <div class="collapse navbar-collapse" id="mainnavbar" >
        <ul class="nav navbar-nav" >
          <li >
            <?php
    $q="select sub_id from semester where sem=$cur_sem";
    
    $res=mysqli_query($conn,$q);
    
    while ( $temp=mysqli_fetch_assoc($res)) 
    {

      $subid=$temp["sub_id"];
      $_SESSION["subid"]=$subid;

      $q="select f_id from  fac_sub where sub_id=$subid";
      $res2=mysqli_query($conn,$q);
      while($fid=mysqli_fetch_assoc($res2)){
             $abc=$fid["f_id"];

      $q2="select fname from faculty where f_id=$abc";
      $res3=mysqli_query($conn,$q2);
      while($fname=mysqli_fetch_assoc($res3)){
        $q4="select count(*) as val from form where s_id=$stud AND sub_id=$subid";
        //echo $q4;
        $res4=mysqli_query($conn,$q4);
        while($temp4=mysqli_fetch_assoc($res4))

        {
          
          $count=$temp4['val'];
          if($count==1){
            //echo "disabled!";
            echo '<button class="btn btn-danger navbar-btn disabled">'.$fname["fname"].'</button>';

            echo '&emsp;&emsp;';
          }
          else{
          //  echo "enabled!";
            
            echo'<button  class="btn btn-basic navbar-btn" > 
            <a href="form.php?id=' . $abc .'&&sub=' . $subid .'" style:"color: white;" >';
            echo $fname["fname"]; echo "</a></button>&emsp;&emsp;";
            /*$q5="select count(*) as val from form where s_id=$stud";
            //echo $q4;
            $res5=mysqli_query($conn,$q5);
            while($temp5=mysqli_fetch_assoc($res5)){
              if($temp5['val']==6)
              {
                header('location:logout.php');
              }
             } */
          }

        }
        
      }
      
      }

    }
    ?>
    
          </li>
          
        </ul>
        <div class="nav navbar-nav navbar-right navbar-btn" style="margin-right: 5px;">
          <a href='logout.php'>
          <button type="button" class="btn btn-success" >
              LOG OUT
          </button>
          </a>    
        </div>
    </div>
  </div>
</nav>
    
    


<div>
  <?php  
  $id1=$_GET['id'];
  $id2=$_GET['sub'];
/*   if($abc!=" "&&$subid!=" ")
  {
    echo "<script>document.getElementById('first').style.display = 'none';
     document.getElementById('formid').style.display = 'block';</script>";
  }*/
  ?>
</div>
<div>

<!-- <div id="first">
  Click on the name to get the form!
</div> -->

<div id="formid" >	
<form class="form-horizontal" id="form" action="response.php?fid=<?php echo $id1;?>&&subid=<?php echo $id2; ?> " method="post">
  <div class="form-group">
    <label class="control-label col-sm-4">Objectives and the plan of the subject were specified:</label>
    <div class="col-sm-1">
      <span class="label label-danger text-center">Very Poorly</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio" value=1 name="r1" required>1</label>
	  <label class="radio-inline"><input type="radio" value=2 name="r1" required>2</label>
	  <label class="radio-inline"><input type="radio" value=3 name="r1" required>3</label>
	  <label class="radio-inline"><input type="radio" value=4 name="r1" required>4</label>
	  <label class="radio-inline"><input type="radio" value=5 name="r1" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success text-center">Very Clearly</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">Coverage and depth of subject:</label>
    <div class="col-sm-1">
      <span class="label label-danger">Very Poor</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio" value=1 name="r2" required>1</label>
	  <label class="radio-inline"><input type="radio" value=2 name="r2" required>2</label>
	  <label class="radio-inline"><input type="radio" value=3 name="r2" required>3</label>
	  <label class="radio-inline"><input type="radio" value=4 name="r2" required>4</label>
	  <label class="radio-inline"><input type="radio" value=5 name="r2" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Excellent</span>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-4">The topics provided new knowledge:</label>
    <div class="col-sm-1">
      <span class="label label-danger">Hardly</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio" value=1 name="r3" required>1</label>
	  <label class="radio-inline"><input type="radio" value=2 name="r3" required>2</label>
	  <label class="radio-inline"><input type="radio" value=3 name="r3" required>3</label>
	  <label class="radio-inline"><input type="radio" value=4 name="r3" required>4</label>
	  <label class="radio-inline"><input type="radio" value=5 name="r3" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Mostly</span>
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-4">In terms of organisation, clearity and presentation of fundamental concepts, the lectures were: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Poor</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1  name="r4" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r4" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r4" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r4" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r4" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Excellent</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">Instructor's oral presentation was: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Poor</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1 name="r5" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r5" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r5" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r5" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r5" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Excellent</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">Instructor's whiteboard(or ppt) presentation was: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Poor</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1  name="r6" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r6" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r6" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r6" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r6" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Excellent</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">The quizzes reflected the course plan: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Poorly</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1  name="r7" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r7" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r7" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r7" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r7" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Excellently</span>
	</div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">Rather than rote learning, understanding was tested: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Hardly</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1  name="r8" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r8" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r8" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r8" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r8" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Thoroughly</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">Examinations were of proper length and level: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Rarely</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1 name="r9" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r9" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r9" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r9" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r9" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Always</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4">The marks given were fair and transparent: </label>
    <div class="col-sm-1">
      <span class="label label-danger">Rarely</span>
    </div>
    <div class="col-sm-3 text-center">  
    <label class="radio-inline"><input type="radio"  value=1 name="r10" required>1</label>
	  <label class="radio-inline"><input type="radio"  value=2  name="r10" required>2</label>
	  <label class="radio-inline"><input type="radio"  value=3 name="r10" required>3</label>
	  <label class="radio-inline"><input type="radio"  value=4 name="r10" required>4</label>
	  <label class="radio-inline"><input type="radio"  value=5 name="r10" required>5</label>
	</div>
	<div class="col-sm-1"> 
	  <span class="label label-success">Always</span>
    </div>
  </div> 
  <br><br><br>
  <div class="form-group col-sm-12" align="center">
    <?php
    //echo "<script> alert(".$subid.")</script>";
    if(isset($id1) && $id1!='' )
    {
    ?>
    <input type="submit" name="Submit" class="btn btn-info">
    <script type="text/javascript">document.getElementById('fac_name').style.display='block';</script>
 <?php
  }
    else
  {
 ?>

    
    <script type="text/javascript">document.getElementById('alert_fac').style.display='block';</script>
    <input type="submit" name="Submit" class="btn btn-info disabled" >
<?php 
}
?>
  <!-- <a href='logout.php'>Click here to log out</a> -->
  </div>
  
</form>
</div>

</div>
</div>

</body>
<?php
//session_destroy();
?>
</html>