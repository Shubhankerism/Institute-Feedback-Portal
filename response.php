<?php
  $server='localhost';
  $username='root';
  $password='';
  $db='feedback system';
  $conn=mysqli_connect($server,$username,$password,$db);
  if($conn)
  //	echo "Connected";
  session_start();
 // echo $_POST["r1"];
  $q='insert into response values('.$_GET["fid"].','.$_GET["subid"].','.$_POST["r1"].','.$_POST["r2"].','.$_POST["r3"].','.$_POST["r4"].','.$_POST["r5"].','.$_POST["r6"].','.$_POST["r7"].','.$_POST["r8"].','.$_POST["r9"].','.$_POST["r10"].')';
  //echo $q;
  $res=mysqli_query($conn,$q);
  /*  if ($res=mysqli_query($conn,$q)) {
    /*$q1="SELECT count(sub_id) as tot FROM form where s_id=$student";
    $res1=mysqli_query($conn,$q1);
    $totalcount=mysqli_fetch_assoc($res1);
    $count=$totalcount['tot'];
    if (count==6) {
    echo "<script>
                  alert('Your feedback has been accepted. Thanks for using this portal.');
                  window.location='logout.php';
          </script>";
  }
    else
  	 header('Location:form.php');
  }*/
  
  #$temp=mysqli_fetch_assoc($res);
  $q='update form_count set count=count+1 where sub_id='.$_GET["subid"].'';
  $res=mysqli_query($conn,$q);
  #$temp=mysqli_fetch_assoc($res);
  $student=$_SESSION["sid"];
  //echo "<script>alert($student);</script>";
  $q='insert into form values("'.$student.'",'.$_GET["subid"].')';
  $res=mysqli_query($conn,$q);;
  //session_destroy();

    $q1="SELECT count(sub_id) as tot FROM form where s_id=$student";
    $res1=mysqli_query($conn,$q1);
    $totalcount=mysqli_fetch_assoc($res1);
    $count=$totalcount['tot'];
    //echo "<script>alert($count);</script>";
    if ($count>=6) {
    echo "<script>
                  window.location='logoutform.php';
                  alert('Your feedback has been accepted. Thanks for using this portal.');
                  
          </script>";
  }
    else
     header('Location:form.php');
    
?>