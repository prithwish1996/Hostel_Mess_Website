<?php session_start();

$_SESSION['seclogin'] = "0";
$_SESSION['prcommlogin'] = "0";
$_SESSION['expcommlogin'] = "0";
session_destroy();
echo"<script> window.open('login.php','_self');</script>";
?>
