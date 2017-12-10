<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewmilkjoin.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="rednview.php">MessReduction&View/</a><a href="viewred.php">ViewReduction</a></strong>
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
  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }
      $query = "select ID from reduction where active='1' ";
      $sql = mysqli_query($link,$query);
      $k=0;
      if((mysqli_num_rows($sql)==0))
      {
        echo"<br>";
        echo"<h2><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNO REDUCTION</h2>";
      }
      else {
        
        echo "<br><br><table border='4'><tr bgcolor='#D0D3D4'><th><h3>REDUCTION ID's</h3></th><th><h3>NAMES</h3></th></tr>";
      while($row= mysqli_fetch_array($sql))
      {
        if($k%2==0)
        {
        echo "<tr bgcolor='#979A9A'>";
        // echo "<tr>";
        echo "<td><p id='row'>" . $row[0] . "</p></td>";
        $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
        echo "</tr>";
        $k++;
      }
      else
      {
      echo "<tr bgcolor='#D0D3D4'>";
      // echo "<tr>";
      echo "<td><p id='row'>" . $row[0] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
      $k++;
    }

    }
  echo "</table>";
}
}



?>