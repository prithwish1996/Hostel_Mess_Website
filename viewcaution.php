<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="dues.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="viewcaution.php">ViewCaustionDeposit/</a></strong>
  <p><strong></strong</p>
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

  $query = "select ID,NAME,CAUTION_DEPOSIT from users";
  $q = mysqli_query($link,$query);
  // $r = mysqli_num_rows($q);
  // echo"$r";
  echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>ID's</h3></th><th><h3>NAME</h3></th><th><h3>CAUTION_DEPOSIT</h3></th></tr>";
  $k = 0;
  while($row=mysqli_fetch_array($q))
  {
    if($k%2==0)
    {
    echo "<tr bgcolor='#979A9A'>";
    echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
    echo "<td><p id='row'>" . $row['NAME'] . "</p></td>";
    echo "<td><p id='row'>" . $row['CAUTION_DEPOSIT'] . "</p></td>";
    echo "</tr>";
    ++$k;
  }
  else {
    echo "<tr bgcolor='#D0D3D4'>";
    echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
    echo "<td><p id='row'>" . $row['NAME'] . "</p></td>";
    echo "<td><p id='row'>" . $row['CAUTION_DEPOSIT'] . "</p></td>";
    echo "</tr>";
    ++$k;
  }
  }
}
  ?>
  </body>
</html>