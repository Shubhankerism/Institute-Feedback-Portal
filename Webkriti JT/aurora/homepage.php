<!DOCTYPE html>
<html>
<head>
    <?php

    if(isset($_POST["sign_up"])){
        $hostname='localhost';
        $username='root';
        $password='';

        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=aurora",$username,$password);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
            $query= "SELECT COUNT(*) FROM registration WHERE user_name='$_POST[user_name]'";


            // Variable to check
            $email = $_POST["email"];

            // Remove all illegal characters from email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // Validate e-mail




           $result = $dbh->prepare($query);
           $result->execute();
           $num_rows = $result->fetchColumn();

            if($num_rows>=1){
            echo "<script type= 'text/javascript'>alert('User Already Exists: ');</script>";
            }else{
            $psw=$_POST["psw"];
            $hashAndSalt = password_hash($psw, PASSWORD_BCRYPT);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $sql = "INSERT INTO registration (name, user_name, password, college_name, email)
VALUES ('" . $_POST["name"] . "','" . $_POST["user_name"] . "','" . $hashAndSalt . "','" . $_POST["college_name"] . "','" . $_POST["email"] . "')";
                if ($dbh->query($sql)) {
                    echo "<script type= 'text/javascript'>alert('Registration Successful');</script>";
                    if(!empty($_POST['check_list'])) {
                        foreach($_POST['check_list'] as $check) {
                               $sql2 = "INSERT INTO " . $check . " (user_name, email)
                               VALUES ('" . $_POST["user_name"] . "','" . $_POST["email"] . "')";

                               $sql3= "UPDATE " . $check . " SET " . $check . ".user_id=(SELECT registration.user_id FROM registration where registration.user_name=" . $check . ".user_name)";

                                                              if ($dbh->query($sql2)){
                                                              //echo "<script type= 'text/javascript'>alert('Registration successful!!');</script>";
                                                               //echoes the value set in the HTML form for each checked checkbox.
                                                                            //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                                                                            //in your case, it would echo whatever $row['Report ID'] is equivalent to.
                                                                            }
                                                                             if ($dbh->query($sql3)){

                                                                                                            
                                                                                                                         }
                                                                                                                        // echo "<script type= 'text/javascript'>alert('Registration successful!!');</script>";






                }} }}else {
                    echo "<script type= 'text/javascript'>alert('Enter a valid email address...');</script>";
                }
}
            $dbh = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }




    //login
    include("config.php");
    session_start();

    error_reporting(0);

    if(isset($_POST["login"])) {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($db,$_POST['uname']);
        $mypassword = mysqli_real_escape_string($db,$_POST['psw']);

        $sql = "SELECT * FROM registration WHERE user_name = '$myusername'";
       
        $result = $db->query($sql);
        $controlhash = $result->fetch_assoc();
        $db_pw_res = $controlhash['password'];

        $count = mysqli_num_rows($result);

        
if(password_verify($mypassword,$db_pw_res)){
            $_SESSION['login_user']=$myusername;

            header("location: profile.php");
        }else {
            echo "<script type= 'text/javascript'>alert('login not successful');</script>";
        }

    }







    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing:border-box}
        body {font-family: Verdana,sans-serif;}
        .mySlides {display:none}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: black;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: black;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
        }
    </style>

    <link rel="stylesheet" href="css/styles.css">
    <script src="javascript/scripts.js"></script>
</head>
<body background="background.jpg">
<div id="mySidenav" class="sidenav" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <span class="glyphicons glyphicons-home"></span>
    <a href="#about">About</a><br><br>
    <a href="#events">Events</a><br><br>
    <a href="#organisers">Organisers</a><br><br>
    <a href="#contact">Contact</a>

</div>
<div id="main" align="right">
    <button class="button1" onclick="document.getElementById('myModal').style.display='block'">Log In/Register</button>&emsp;&emsp;&emsp;

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
</div>

<center> <font face="font2" size=70><u> AURORAE 2k17</u> </font></center>
<br>

<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 6</div>
        <img src="images/1.jpg" style="width:100%">
        <div class="text"><b>DANCE</b></div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 6</div>
        <img src="images/2.jpg" style="width:100%">
        <div class="text"><b>MUSIC</b></div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 6</div>
        <img src="images/3.jpg" style="width:100%">
        <div class="text"><b>PUBLIC SPEAKING</b></div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">4 / 6</div>
        <img src="images/4.jpg" style="width:100%">
        <div class="text"><b>FINE ARTS</b></div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">5 / 6</div>
        <img src="images/5.jpg" style="width:100%">
        <div class="text"><b>LITERARY ARTS</b></div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">6 / 6</div>
        <img src="images/6.jpg" style="width:100%">
        <div class="text"><b>AND LOADS OF FUN...</b></div>
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span onclick="document.getElementById('myModal').style.display='none'" class="close" title="Close Modal">&times;</span>
            <center>
                <h2><font face="font2"> AURORAE 2K17</font></h2>
            </center>
        </div>
        <div class="modal-body">

            <div class="tab">
                <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Log In')">Log In &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a>
                <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Register')">Register &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a>
            </div>

            <div id="Log In" class="tabcontent">
                <form action="" method="post">

                    <div class="container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit" class="btn" name="login">Login</button>
                    </div>

                </form>
            </div>

            <div id="Register" class="tabcontent">
                <form action="" method="post">
                    <div class="container">

                        <label><b>Full Name</b></label>
                        <input type="text" placeholder="Name" name="name" required>

                        <label><b>College Name</b></label>
                        <input type="text" placeholder="College Name" name="college_name" required>

                        <label><b>User Name</b></label>
                        <input type="text" placeholder="User Name" name="user_name" required>

                        <label><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" id="txtNewPassword" required>

                        <label><b>Confirm Password</b></label>
                        <input type="password" placeholder="Confirm Password" name="psw-repeat" id="txtConfirmPassword" onkeyup="checkPasswordMatch();"  required>

                        <br>
                        <div class="registrationFormAlert" id="divCheckPasswordMatch" style="display:none">

                            </div>
                        <br>

                        <label><b>Choose Your Events</b></label>
                        <br>
                        <br>
                        <table border="0">
                            <td>
                            <td>
                                <input type="checkbox" name="check_list[]" value="nrityanjali"> Nrityanjali
                                <br>
                                <br>
                                <input type="checkbox" name="check_list[]" value="wordemort"> Wordemort
                                <br>
                                <br>
                                <input type="checkbox" name="check_list[]" value="singingtheindigos"> Singing The Indigos
                                <br>
                                <br>
                            </td>
                            </td>

                            <td>
                            <td>
                                <input type="checkbox" name="check_list[]" value="reportage"> Reportage
                                <br>
                                <br>
                                <input type="checkbox" name="check_list[]" value="thirdeye"> Third Eye
                                <br>
                                <br>
                                <input type="checkbox" name="check_list[]" value="minutetowinit"> Minute To Win It
                                <br>
                                <br>
                            </td>
                            </td>
                        </table>

                        <div class="clearfix">
                            <button type="submit" class="btn" name="sign_up" id="register" disabled>Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
</div>



<br><br>
<div class="about"><a name="about"><h3 ALIGN="CENTER"><font face="font2"><u> ABOUT US</u></font></h3><p align="center">

    Aurora 2k17 is ready to bewitch the hearts of the masses with an idiosyncratic blend of shimmer,<br> mystique, stupendous talent, breathtaking performances, enrapturing panache , unnerving bands, aesthetic<br> dance moves, soulful voices, top-notch art & sublime actors from 20th-22nd February-2017.<br>
    AURORA gets its name from Aurora- 'a natural electrical phenomenon characterized by the<br> appearance of streamers of reddish or greenish light in the sky, especially near the northern or southern magnetic pole<br> called aurora borealis or aurora australis'.
    Aurora dovetails all the different colors and flavors of India together in one place<br> and makes the colors come alive with its jinx, casting a spell on the audience. “Aurora” the cultural fest of<br> ABV-IIITM Gwalior has set its benchmark amidst all the cultural fests of India witnessing a<br> ginormous participation of over 40k+ students from the various corners of India and an exuberant audience crossing over<br> half a lakh. This year Aurora 2k17 is all set to recreate the 20‟s adroitness and prestidigitation with all the zeal and verve.
</p>
</a></div>
<br><br>
<div class="events"><a name="events">
    <h3 ALIGN="CENTER"><font face="font2"><u>EVENTS</u></font></h3>
    <table align="center" cellspacing=90px>
        <tr>
            <td><a href="#modal">
                <img src="images/dance.jpg" height=300px width=300px class="shrink"></a>
                <p><b>NRITYANJALI</b></p>
            </td>
            <td><a href="#modal2">
                <img src="images/music.jpg" height=300px width=300px class="shrink"></a>
                <p><b>SINGING THE INDIGOS</b></p>
            </td>
            <td>
                <img src="images/journalism.jpg" height=300px width=300px class="shrink">
                <p><b>REPORTAGE</b></p>
            </td>
        </tr>
        <tr>
            <td>
                <img src="images/arts.jpg" height=300px width=300px class="shrink">
                <p><b>THIRD EYE</b></p>
            </td>
            <td>
                <img src="images/word.jpg" height=300px width=300px class="shrink">
                <p><b>WORDEMORT</b></p>
            </td>
            <td>
                <img src="images/jam.jpg" height=300px width=300px class="shrink">
                <p><b>MINUTE TO WIN IT</b></p>
            </td>


        </tr>

    </table></a>
</div><br><br>
<div class="organisers"><a name="organisers">
    <h3 ALIGN="CENTER"><font face="font2"><u> ORGANISERS</u></font></h3>
    <table align="center" cellpadding=25px>
        <tr>
            <td>
                <div class="outer">
                    <div class="image">
                        <img src="images/7.jpg" class="grow" height=300px width=300px  alt="Pic" />
                        <p class="hidden"><b>Haritha Nair</b></p>
                    </div>
                </div>
            </td>

            <td>
                <div class="outer">
                    <div class="image">
                        <img src="images/8.jpg" height=300px width=300px  alt="Pic" class="grow"/>
                        <p class="hidden1"><b>Saloni Nigam</b></p>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>

                <div class="outer">
                    <div class="image">
                        <img src="images/9.jpg" height=300px width=300px  alt="Pic"class="grow"/>
                        <p class="hidden2"><b>Shresth Verma</b></p>
                    </div>
                </div>
            </td>

            <td>

                <div class="outer">
                    <div class="image">
                        <img src="images/10.jpg" height=300px width=300px  alt="Pic" class="grow"/>
                        <p class="hidden3"><b>Tarun Bathwal</b></p>
                    </div>
                </div>
            </td>
        </tr>


    </table>
</a>
</div>
<br>
<br>
<div class="contact" ><a name="contact">
    <h3 align="center"><font face="font2"><u>CONTACT US</u></font></h3>
    <br>
    <br>
    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;


        <a href="https://www.facebook.com/">
        <img src="images/facebook.png">
        </a>

    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

        <a href="https://www.instagram.com/">
        <img src="images/instagram.png"></a> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

        <a href="https://www.youtube.com/watch?v=gUm_SI8WQ98">
        <img src="images/youtube%20(2).png"></a> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
    <br>
    <br>
    <br>
</a>
</div>
<div id="modal">

    <div class="modal-content">

        <div class="header">

            <h2>Nrityanjali-Solo Dancing Competetion</h2>

        </div>

        <div class="copy">

            <p><font color="black"><center>Drown yourself in divine, grace, beauty, tenderness to<br> delight the eyes
                and souls of the viewers. Participate in the most graceful<br> competition that Aurorae
                has got for you: The Classical Dancing Competition.</center>
                <h4>RULES</h4>
                We would love to see Kathak, Bharatanatyam, Kathakali, Mohiniyattam, Manipuri, Sattriya,
                Kuchipudi and Odissi. No other dance form is allowed. However, different forms will not be judged separately.
                <h4> Time Limit :</h4> 3 - 5 minutes (including setup, clearance and narration time)
                <h4>PRIZES</h4>
                1st Prize: 5,000 INR<br>
                2nd Prize: 3,000 INR<br>
                3rd Prize: 2,000 INRs
            </font></p>

            <a href="#events">Close Link</a> </div>

    </div>

    <div class="overlay"></div>

</div>
<div id="modal2">

    <div class="modal-content">

        <div class="header">

            <h2>Singing the Indigos-Solo Singing Competetion</h2>

        </div>

        <div class="copy">

            <p><font color="black"><center>Come and emancipate yourself to the world of music because story of the life <br>is quicker than
                the wink of an eye. Grab the chance to rock the stage amidst<br> thousands of people! Sing crazy and live crazy.

                Judged by famous celebrities over the past years like Shirley Setia,<br> Singing the Indigos has seen it’s participants scale grand
                heights and achievements over the years!.</center>
                <h4>RULES</h4>
                Participants will have a performance time of 2 minutes.<br>
                No backing music is permitted.
                <h4>PRIZES</h4>
                1st Prize: 5,000 INR<br>
                2nd Prize: 3,000 INR<br>
                3rd Prize: 2,000 INR
            </font></p>

            <a href="#events">Close Link</a> </div>

    </div>

    <div class="overlay"></div>

</div>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }



    function checkPasswordMatch() {
            var password = document.getElementById("txtNewPassword");
                    var confirmPassword = document.getElementById("txtConfirmPassword");
           

                    if (password.value != confirmPassword.value) {
                        document.getElementById("divCheckPasswordMatch").innerText = 'Passwords do not match..!!..';
                        document.getElementById("divCheckPasswordMatch").style.display = "block";
                    } else{
                        document.getElementById("divCheckPasswordMatch").innerText = 'Passwords match..!!..';
                        
                        document.getElementById("divCheckPasswordMatch").style.display = "block";


                }
                var node = document.getElementById('divCheckPasswordMatch');
                textContent = node.textContent;
                if(textContent=="Passwords match..!!.."){
                document.getElementById("register").disabled = false;

}
else{
document.getElementById("register").disabled = true;
}
        }
</script>




</body>
</html>
