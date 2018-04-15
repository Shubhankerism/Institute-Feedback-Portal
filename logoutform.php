<?php
session_start();
session_unset();
unset($_SESSION["sid"]);
session_destroy();
header('location:index.php');
exit();
?>