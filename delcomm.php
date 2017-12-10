<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="dues.css">
<body>
  <div class="background"></div>
  </html>
  <?php
  if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else
  {
  include "header.php";
  include"dbconnect.php";
 $query = "delete from commpass where BOOLEAN='0'";
  
  if(mysqli_query($link,$query))
  {
    echo '<script language="javascript">';
echo 'alert("Previous Committee Has been Successfully Deleted")';
echo '</script>';
  }
  else {
    echo '<script language="javascript">';
echo 'alert("ERROR!!!")';
echo '</script>';
  }
  echo"<script>window.open('optionusers.php','_self');</script>";
}
  ?>