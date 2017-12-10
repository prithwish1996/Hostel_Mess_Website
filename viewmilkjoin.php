<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewmilkjoin.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="viewmilkjoin.php">MilkJoinList/</a></strong>
  <p><strong></strong</p>
  </html>
  <?php
  if($_SESSION['prcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else {

  include "header.php";
  include"dbconnect.php";
  $d = date("d");
  $t = date("t");
  if($d<15||$d==$t)
  {  echo"<br><br><h3 align='center'>MILK JOINING LIST FOR THE FIRST HALF OF THE MONTH</h3>";
    $query = "select * from milkfirsthalf where id!=0";
    $q = mysqli_query($link,$query);
    $k=0;
    echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($row=mysqli_fetch_array($q))
    {
      if($k%2==0)
      {
      echo "<tr bgcolor='#979A9A'>";
      echo "<td><p id='row'>" . $row['id'] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
      ++$k;
    }
    else {
      echo "<tr bgcolor='#D0D3D4'>";
      echo "<td><p id='row'>" . $row['id'] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
      ++$k;
    }
    }
  }
  else {
    echo"<br><br><h3 align='center'>MILK JOINING LIST FOR THE SECOND HALF OF THE MONTH</h3>";
    $query = "select * from milksecondhalf where id!='0'";
    $q = mysqli_query($link,$query);
    $k=0;
    $k=0;
    echo "<br><br><table id='table' border='4'><tr bgcolor='#D0D3D4'><th><h3>ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($row=mysqli_fetch_array($q))
    {
      if($k%2==0)
      {
      echo "<tr bgcolor='#979A9A'>";
      echo "<td><p id='row'>" . $row['id'] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
      ++$k;
    }
    else {
      echo "<tr bgcolor='#D0D3D4'>";
      echo "<td><p id='row'>" . $row['id'] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
      ++$k;
    }
    }
  }
}
?>