<?php session_start();
?>
 <!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewjoin.css">
<body>
  <div class="background"></div>
  <strong> <br> <a href="optionusers.php">Home/</a><a href="messblockmenu.php">MessBlock/</a><a href="viemessblock.php">ViewMessBlock</a></strong>
  </html>
<?php
 if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else{
  include "header.php";
  include"dbconnect.php";

  $query4 = "select id from messblock";
 $sql4 = mysqli_query($link,$query4);
		echo"<br>";
	echo "<table align='center' id='mb' border='4'><tr><th><h3>BLOCKED ID's</h3></th></tr>";

    while($row= mysqli_fetch_array($sql4))
    {

      echo "<tr>";
      echo "<td><p id='row'>" . $row[0] . "</p></td>";
      echo "</tr>";
}

    echo "</table>";







  }

?>
