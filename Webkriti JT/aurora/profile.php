<?php
/**
 * Created by PhpStorm.
 * User: tjuhi
 * Date: 3/1/2017
 * Time: 1:10 AM
 */
include ("session.php");
$id=$_SESSION['login_user'];

error_reporting(0);
$query="SELECT user_name,college_name,email FROM registration WHERE user_name = '" . $id . "';";

$que_nri_1="SELECT COUNT(*) FROM nrityanjali WHERE user_name = '" . $id . "';";
$que_nri_2="SELECT date,venue,time FROM event WHERE event_name = 'nrityanjali';";
$que_nri_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Nrityanjali' AND row_id=3;";
$que_nri_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Nrityanjali' AND row_id=4;";

$que_wor_1="SELECT COUNT(*) FROM wordemort WHERE user_name = '" . $id . "';";
$que_wor_2="SELECT date,venue,time FROM event WHERE event_name = 'wordemort';";
$que_wor_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Wordemort' AND row_id=1;";
$que_wor_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Wordemort' AND row_id=2;";


$que_thre_1="SELECT COUNT(*) FROM thirdeye WHERE user_name = '" . $id . "';";
$que_thre_2="SELECT date,venue,time FROM event WHERE event_name = 'thirdeye';";
$que_thre_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Third Eye' AND row_id=5;";
$que_thre_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Third Eye' AND row_id=6;";


$que_repor_1="SELECT COUNT(*) FROM reportage WHERE user_name = '" . $id . "';";
$que_repor_2="SELECT date,venue,time FROM event WHERE event_name = 'reportage';";
$que_repor_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Reportage' AND row_id=9;";
$que_repor_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Reportage' AND row_id=10;";


$que_siti_1="SELECT COUNT(*) FROM singingtheindigos WHERE user_name = '" . $id . "';";
$que_siti_2="SELECT date,venue,time FROM event WHERE event_name = 'singingtheindigos';";
$que_siti_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Singing The Indigos' AND row_id=11;";
$que_siti_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Singing The Indigos' AND row_id=12;";


$que_mintwi_1="SELECT COUNT(*) FROM minutetowinit WHERE user_name = '" . $id . "';";
$que_mintwi_2="SELECT date,venue,time FROM event WHERE event_name = 'minutetowinit';";
$que_mintwi_org_1="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Minute To Win It' AND row_id=7;";
$que_mintwi_org_2="SELECT organiser,phone,email FROM organisers WHERE event_name = 'Minute To Win It' AND row_id=8;";



mysql_select_db('aurora',$db1);

$result = mysql_query($query) or die(mysql_error());

$res_nri_1 = mysql_query($que_nri_1) or die(mysql_error());
$res_nri_2 = mysql_query($que_nri_2) or die(mysql_error());
$res_nri_org_1 = mysql_query($que_nri_org_1) or die(mysql_query());
$res_nri_org_2 = mysql_query($que_nri_org_2) or die(mysql_query());


$res_wor_1 = mysql_query($que_wor_1) or die(mysql_error());
$res_wor_2 = mysql_query($que_wor_2) or die(mysql_error());
$res_wor_org_1 = mysql_query($que_wor_org_1) or die(mysql_query());
$res_wor_org_2 = mysql_query($que_wor_org_2) or die(mysql_query());

$res_thre_1 = mysql_query($que_thre_1) or die(mysql_error());
$res_thre_2 = mysql_query($que_thre_2) or die(mysql_error());
$res_thre_org_1 = mysql_query($que_thre_org_1) or die(mysql_query());
$res_thre_org_2 = mysql_query($que_thre_org_2) or die(mysql_query());


$res_repor_1 = mysql_query($que_repor_1) or die(mysql_error());
$res_repor_2 = mysql_query($que_repor_2) or die(mysql_error());
$res_repor_org_1 = mysql_query($que_repor_org_1) or die(mysql_query());
$res_repor_org_2 = mysql_query($que_repor_org_2) or die(mysql_query());


$res_siti_1 = mysql_query($que_siti_1) or die(mysql_error());
$res_siti_2 = mysql_query($que_siti_2) or die(mysql_error());
$res_siti_org_1 = mysql_query($que_siti_org_1) or die(mysql_query());
$res_siti_org_2 = mysql_query($que_siti_org_2) or die(mysql_query());

$res_mintwi_1 = mysql_query($que_mintwi_1) or die(mysql_error());
$res_mintwi_2 = mysql_query($que_mintwi_2) or die(mysql_error());
$res_mintwi_org_1 = mysql_query($que_mintwi_org_1) or die(mysql_query());
$res_mintwi_org_2 = mysql_query($que_mintwi_org_2) or die(mysql_query());


$num_rows_1 = mysql_fetch_array($res_nri_1);
$num_rows_2 = mysql_fetch_array($res_wor_1);
$num_rows_3 = mysql_fetch_array($res_thre_1);
$num_rows_4 = mysql_fetch_array($res_repor_1);
$num_rows_5 = mysql_fetch_array($res_siti_1);
$num_rows_6 = mysql_fetch_array($res_mintwi_1);
echo mysql_error();




while($row = mysql_fetch_array($result, MYSQLI_ASSOC))
{
    $name=$row['user_name'];

    $college_name=$row['college_name'];

    $email=$row['email'];
}





if (isset($_POST["chg_psw"])) {
    $sql = "SELECT * FROM registration WHERE user_name = '$id'";
    $result = $db->query($sql);
    $controlhash = $result->fetch_assoc();
    $db_pw_res = $controlhash['password'];


    if (password_verify($_POST['currentPassword'],$db_pw_res)) {
        $psw=$_POST["newPassword"];
        $hashAndSalt = password_hash($psw, PASSWORD_BCRYPT);
        mysql_query("UPDATE registration set password='" . $hashAndSalt . "' WHERE user_name='" . $id . "'");
        echo "<script type= 'text/javascript'>alert('Password Changed Successfully');</script>";
    } else
        echo "<script type= 'text/javascript'>alert('Current Password is not correct');</script>";
}





?>
<html>

<head>
    <title>Welcome </title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles1.css">
    <script src="javascript/scripts.js"></script>

</head>


<body background="background.jpg" link="white">

<div id="main" align="right">
    <button id="myBtn" class="button1" onclick="document.getElementById('myModal').style.display='block'" >Change Password</button>
&emsp;
    <a href="logout.php"><button class="button1" ">Sign Out</button></a>
</div>



<h1><font face="font2">Welcome <?php echo $login_session; ?></font></h1>
<br>
<div class="about"><h2 ALIGN="CENTER"><font face="font2"><u> Your Profile</u></font></h2>
    <table>
        <tr>
            <td> <b> USER NAME:</b>&ensp;<?php echo $name ?></td>
        </tr>
        <tr>
            <td> <b> COLLEGE NAME: </b> &ensp;<?php echo $college_name ?></td>
        </tr>
        <tr>
            <td> <b> EMAIL: </b> &ensp;<?php echo $email ?></>
        </tr>
    </table>
</div>
<br>
<div class="about"><h2 ALIGN="CENTER"><font face="font2"><u> Your Event Details</u></font></h2>
    <?php


    if($num_rows_1[0]>=1){
        $event="Nrityanjali";

        while($row_n = mysql_fetch_array($res_nri_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_nri_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_nri_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }


        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
    <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
   
</table>";
    }

    echo "<hr>";


    if($num_rows_2[0]>=1){
        $event="Wordemort";

        while($row_n = mysql_fetch_array($res_wor_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_wor_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_wor_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }


        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
   <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
</table>";
    }

    echo "<hr>";


    if($num_rows_3[0]>=1){
        $event="Third Eye";

        while($row_n = mysql_fetch_array($res_thre_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_thre_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_thre_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }



        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
    <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
</table>";
    }

    echo "<hr>";


    if($num_rows_4[0]>=1){
        $event="Reportage";

        while($row_n = mysql_fetch_array($res_repor_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_repor_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_repor_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }



        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
    <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
</table>";
    }

    echo "<hr>";


    if($num_rows_5[0]>=1){
        $event="Singing The Indigos";

        while($row_n = mysql_fetch_array($res_siti_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_siti_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_siti_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }




        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
    <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
</table>";
    }

    echo "<hr>";


    if($num_rows_6[0]>=1){
        $event="Minute To Win It";

        while($row_n = mysql_fetch_array($res_mintwi_2, MYSQLI_ASSOC))
        {
            $date=$row_n['date'];

            $time=$row_n['time'];

            $venue=$row_n['venue'];
        }

        while($rows_n_1 = mysql_fetch_array($res_mintwi_org_1, MYSQLI_ASSOC))
        {
            $organiser_n_1 = $rows_n_1['organiser'];

            $phone_n_1 = $rows_n_1['phone'];

            $email_n_1 = $rows_n_1['email'];
        }

        while($rows_n_2 = mysql_fetch_array($res_minti_org_2, MYSQLI_ASSOC))
        {
            $organiser_n_2 = $rows_n_2['organiser'];

            $phone_n_2 = $rows_n_2['phone'];

            $email_n_2 = $rows_n_2['email'];
        }




        echo "<b>";
        echo $event;
        echo "</b>" ;
        echo "<br>";
        echo "<table>
    <tr>
        <td> <b> DATE: </b> $date </td>
    </tr>
    <tr>
        <td> <b> TIME: </b> $time </td>
    </tr>
    <tr>
        <td><b> VENUE:  </b> $venue </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_1: </b> $organiser_n_1 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_1 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_1 </td>
    </tr>
    <tr>
        <td> <b> ORGANISER_2: </b> $organiser_n_2 </td>
    </tr>
    <tr>
        <td> <b> PHONE NO.: </b> $phone_n_2 </td>
    </tr>
    <tr>
        <td><b> EMAIL:  </b> $email_n_2 </td>
    </tr>
</table>";
    }






    ?>

</div>
<?php

echo "<br>";
echo "<br>";

echo '<div class="edit events"><h2 ALIGN="CENTER"><font face="font2"><u> Edit Events </u></font></h2>';
echo '<table align=center border=0>';
echo '<tr>';
echo '<td>';
echo '<form action="" method="post" >
<button type="submit" class="btn" name="del">Want to withdraw from these events ??</button>
';
echo '<br>';
if($num_rows_1[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="nrityanjali"> Nrityanjali';
}

echo '<br>';

if($num_rows_2[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="wordemort"> Wordemort';
}

echo '<br>';

if($num_rows_3[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="thirdeye"> Thirdeye';
}

echo '<br>';

if($num_rows_4[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="reportage"> Reportage';
}

echo '<br>';

if($num_rows_5[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="singingtheindigos"> Singing the indigos';
}

echo '<br>';

if($num_rows_6[0]>=1){
    echo '<input type="checkbox" name="check_list[]" value="minutetowinit"> Minute to win it';
}

echo '<br>';

echo '</form>';

echo '</td>';

echo '<td>';

echo '<form action="" method="post">
    <button type="submit" class="btn" name="ins">Want to try these events as well?</button>
';

if($num_rows_1[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="nrityanjali"> Nrityanjali';
}

echo '<br>';

if($num_rows_2[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="wordemort"> Wordemort';
}

echo '<br>';

if($num_rows_3[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="thirdeye"> Thirdeye';
}

echo '<br>';

if($num_rows_4[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="reportage"> Reportage';
}

echo '<br>';

if($num_rows_5[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="singingtheindigos"> Singing the indigos';
}

echo '<br>';

if($num_rows_6[0]<1){
    echo '<input type="checkbox" name="check_list[]" value="minutetowinit"> Minute to win it';
}

echo '<br>';


echo '</form>';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</div>';


if(isset($_POST["del"])){
    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $check) {
            $sql2 = "DELETE FROM " . $check . " WHERE user_name = '" . $id . "';";

            $res = mysql_query($sql2) or die(mysql_error());
            echo mysql_error();

        }

    }
}




if(isset($_POST["ins"])){
    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $check) {
            $sql3 = "INSERT INTO " . $check . " (user_name,email) VALUES('" . $id . "','" . $email . "');";

            $res = mysql_query($sql3) or die(mysql_error());
            echo mysql_error();

        }

    }
}





?>


<div id="myModal" class="modal1">

    <!-- Modal content -->
    <div class="modal-content-1">
        <div class="modal-header-1">
            <span onclick="document.getElementById('myModal').style.display='none'" class="close1" title="Close Modal">&times;</span>
            <center>
                <h2><u>Change Password</u></h2>
            </center>
            <div class="modal-body-1">
                <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                    <div style="width:500px;">
                        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">

                            <tr>
                                <td width="40%"><label><font color="white"> Current Password</font></label></td>
                                <td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
                            </tr>
                            <tr>
                                <td><label><font color="white"> New Password</font></label></td>
                                <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
                            </tr>
                            <td><label><font color="white"> Confirm Password</font></label></td>
                            <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"><font color="white"></font> </span></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="chg_psw" value="Submit" class="btnSubmit" ></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer-1">

        </div>
    </div>
</div>


<script>

    function validatePassword() {
        var currentPassword,newPassword,confirmPassword,output = true;

        currentPassword = document.frmChange.currentPassword;
        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;

        if(!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML = "required";
            output = false;
        }
        else if(!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
        }
        else if(!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
        }
        if(newPassword.value != confirmPassword.value) {
            newPassword.value="";
            confirmPassword.value="";
            newPassword.focus();
            alert('Passwords do not match');
            output = false;
        }
        return output;
    }
</script>



</body>

</html>