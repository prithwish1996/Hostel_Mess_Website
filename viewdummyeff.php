<?php session_start(); ?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="dues.css">
<body>
  <div class="background"></div>
  <strong>  <a href="expcomm.php">Home/</a><a href="viewdummyeff.php">ViewDummyEffectiveDays/</a></strong>
<h3 id="heading">EFFECTIVE DAYS</h3>
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
    $query = "select * from dummyeffdays where ID!='0'";
    $q = mysqli_query($link,$query);
    $k=0;
    echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>ID</h3></th><th><h3>NAMES</h3></th><th><h3>EFFECTIVE DAYS</h3></th></tr>";
    while($row=mysqli_fetch_array($q))
    {
      if($k%2==0)
      {
      echo "<tr bgcolor='#979A9A'>";
      echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
      $querynew = "select NAME from users where ID=".$row['ID']."";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "<td><p id='row'>" . $row['EFFECTIVE_DAYS'] . "</p></td>";
      echo "</tr>";
      ++$k;
    }
    else {
      echo "<tr bgcolor='#D0D3D4'>";
      echo "<td><p id='row'>" . $row['ID'] . "</p></td>";
      $querynew = "select NAME from users where ID=".$row['ID']."";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "<td><p id='row'>" . $row['EFFECTIVE_DAYS'] . "</p></td>";
      echo "</tr>";
      ++$k;
    }
  }}

  ?>