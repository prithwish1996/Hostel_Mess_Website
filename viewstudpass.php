<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="dues.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiordepass.php">Password/</a><a href="viewstudpass.php">ViewInmatesPassword/</a></strong>
  <p><strong></strong</p>
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

 $query = "select ID,NAME,password from users";
  $q = mysqli_query($link,$query);
  echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>ID</h3></th><th><h3>NAME</h3></th><th><h3>PASSWORD</h3></th></tr>";
  $k = 0;
  while($row=mysqli_fetch_array($q))
  {
    if($k%2==0)
    {

      // echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>STATUS</h3></th><th><h3>USERNAME</h3></th><th><h3>PASSWORD</h3></th></tr>";
    echo "<tr bgcolor='#979A9A'>";
    echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
    echo "<td><p id='row'>" . $row['NAME'] . "</p></td>";
    echo "<td><p id='row'>" . $row['password'] . "</p></td>";
    echo "</tr>";
    ++$k;
  }
  else {

    // echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>STATUS</h3></th><th><h3>USERNAME</h3></th><th><h3>PASSWORD</h3></th></tr>";
    echo "<tr bgcolor='#D0D3D4'>";
    echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
    echo "<td><p id='row'>" . $row['NAME'] . "</p></td>";
    echo "<td><p id='row'>" . $row['password'] . "</p></td>";
    echo "</tr>";
    ++$k;
  }
  }
}
?>
