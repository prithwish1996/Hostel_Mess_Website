<?php session_start(); ?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewdummypur.css">
<body>
  <div class="background"></div>
  <strong>  <a href="expcomm.php">Home/</a><a href="viewdummypur.php">ViewDummyPurchases/</a></strong>
<h2 id="heading">VIEW DUMMY PURCHASES</h2>
  <p><strong></strong</p>

  </html>
  <?php
  if($_SESSION['expcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else {


  include "header.php";
  include"dbconnect.php";
  $d = date("d");
  // echo"$d";
    $query = "select * from dummypurchases";
    $q = mysqli_query($link,$query);
    $k=0;
    echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>DATE</h3></th><th><h3>EXPENDITURE_PAID</h3></th><th><h3>EXPENDITURE_UNPAID</h3></th><th><h3>ESTABLISHMENT_PAID</h3></th><th><h3>ESTABLISHMENT_UNPAID</h3></th></tr>";
    while($row=mysqli_fetch_array($q))
    {
      if($k%2==0)
      {
      echo "<tr bgcolor='#979A9A'>";
      echo "<td><p id='row'>" . $row['DATE'] . "</p></td>";
      echo "<td><p id='row'>" . $row['EXPENDITURE_PAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['EXPENDITURE_UNPAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['ESTABLISHMENT_PAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['ESTABLISHMENT_UNPAID'] . "</p></td>";
      echo "</tr>";
      ++$k;
    }
    else {
      echo "<tr bgcolor='#D0D3D4'>";
      echo "<td><p id='row'>" . $row['DATE'] . "</p></td>";
      echo "<td><p id='row'>" . $row['EXPENDITURE_PAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['EXPENDITURE_UNPAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['ESTABLISHMENT_PAID'] . "</p></td>";
      echo "<td><p id='row'>" . $row['ESTABLISHMENT_UNPAID'] . "</p></td>";
      echo "</tr>";
      ++$k;
    }
  }}

  ?>