<?php session_start();
?>
<!doctype html>
<html lang="en">
<head>



<link rel="stylesheet" href="Viewallusers.css">
</head>
<body>
  <div class="background"></div>
  
  <strong>  <a href="optionusers.php">Home/</a><a href="interioruser.php">Inmates/</a><a href="Viewallusers.php">ViewAll_Inmates/</a></strong>
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
  $query = "select ID,NAME,DEPT,ROOM_NO,I_CARD_NO,YEAR,CAUTION_DEPOSIT from users";
  $q = mysqli_query($link,$query);
  $k=0;
  echo "<br><table><tr bgcolor='#D0D3D4'><th><h4>ID's</h4></th><th><h4>NAME</h4></th><th><h4>DEPT</h4></th><th><h4>ROOM_NO</h4></th><th><h4>I_CARD_NO</h4></th><th><h4>YEAR</h4></th><th><h4>CAUTION_DEPOSIT</h4></th></tr>";
  while($row=mysqli_fetch_array($q))
  {
    if($k%2==0)
    {
 //   echo "<tr bgcolor='#979A9A'>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['NAME'] . "</td>";
    echo "<td>" . $row['DEPT'] . "</td>";
    echo "<td>" . $row['ROOM_NO'] . "</td>";
    echo "<td>" . $row['I_CARD_NO'] . "</td>";
    echo "<td>" . $row['YEAR'] . "</td>";
    echo "<td>" . $row['CAUTION_DEPOSIT'] . "</td>";
    echo "</tr>";
    ++$k;
  }
  else {
    echo "<tr bgcolor='#D0D3D4'>";
    echo "<td>" . $row['ID'] . "</p></td>";
    echo "<td>" . $row['NAME'] . "</td>";
    echo "<td>" . $row['DEPT'] . "</td>";
    echo "<td>" . $row['ROOM_NO'] . "</td>";
    echo "<td>" . $row['I_CARD_NO'] . "</td>";
    echo "<td>" . $row['YEAR'] . "</td>";
    echo "<td>" . $row['CAUTION_DEPOSIT'] . "</td>";
    echo "</tr>";
    ++$k;
  }
  }

}
  ?>
</body>

</html>