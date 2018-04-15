<?php
session_start();
session_unset();
unset($_SESSION[$_GET['check']]);
session_destroy();
header('location:index.php');
exit();
?>