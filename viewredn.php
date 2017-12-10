<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewred.css">
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
  include"dbconnect2.php";
  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }
      $query = "select ID from reduction where active='1' ";
      $sql = mysql_query($query);
      if((mysql_num_rows($sql)==0))
      {
        echo"<br>";
        echo"<h2><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNO REDUCTION</h2>";
      }
      else {
        echo "<br><br><table border='1'><tr><th>REDUCTION ID's</th></tr>";
      while($row= mysql_fetch_array($sql))
      {

        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }

}




?>
