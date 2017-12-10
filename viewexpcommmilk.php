<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewjoin.css">
<body>
  <div class="background"></div>
  <strong>  <a href="expcomm.php">Home/</a><a href="viewexpcommmilk.php">ViewMilkJoinList</a></strong>
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




     
    $query = "select ID from dummymilkfirsthalf where id!=0";
    $sql = mysqli_query($link,$query);

    // if((mysql_num_rows($sql)==0))
    // {
    //   echo"<br>";
    //   echo"<h2>No data Found in Late Join</h2>";
    // }
    // else
      echo "<table id='nj' border='4'><tr><th><h3>MILK FIRST HALF ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($row= mysqli_fetch_array($sql))
    {

      echo "<tr>";
      echo "<td><p id='row'>" . $row[0] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
    }
    echo "</table>";

    $query1 = "select ID from dummymilksecondhalf where id!=0";
    $sql1 = mysqli_query($link,$query1);

    // if((mysql_num_rows($sql)==0))
    // {
    //   echo"<br>";
    //   echo"<h2>No data Found in Late Join</h2>";
    // }
    // else
      echo "<table id='lj' border='4'><tr><th><h3>MILK SECOND HALF ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($row1= mysqli_fetch_array($sql1))
    {

      echo "<tr>";
      echo "<td><p id='row'>" . $row1[0] . "</p></td>";
      $querynew = "select NAME from users where ID='$row1[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
    }
    echo "</table>";
   


}



?>