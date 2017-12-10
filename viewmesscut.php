<?php session_start();
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="viewmesscut.css">
</head>
<body>
  <div class="background"></div>

  <strong> <br> <a href="optionusers.php">Home/</a><a href="viewmesscut.php">ViewMessCut/</a></strong>
  <p><strong></strong</p>

  <?php
   if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else{
  include "header.php";
  include"dbconnect.php";
  $query = "select * from messcut2";
  $q = mysqli_query($link,$query);
  $k=0;
  echo "<br><table><tr bgcolor='#D0D3D4'><th><h4>ID's</h4></th><th><h4>NAMES</h4></th><th><h4>MESS CUT DUES</h4></th></tr>";
  while($row=mysqli_fetch_array($q))
  {
    if($k%2==0)
    {
 //   echo "<tr bgcolor='#979A9A'>";
    echo "<td>" . $row['id'] . "</td>";
    $q1 = "select NAME from users where ID='".$row['id']."'";
    $q2 = mysqli_query($link,$q1);
    while($r1 = mysqli_fetch_array($q2))
    {
      
      echo "<td>" . $r1['NAME'] . "</td>";
      break;
    }
    echo "<td>" . $row['messcutdue'] . "</td>";

    echo "</tr>";
    ++$k;
  }
  else {
    echo "<tr bgcolor='#D0D3D4'>";
    echo "<td>" . $row['id'] . "</p></td>";
    $q1 = "select NAME from users where ID='".$row['id']."'";
    $q2 = mysqli_query($link,$q1);
    while($r1 = mysqli_fetch_array($q2))
    {
      
      echo "<td>" . $r1['NAME'] . "</td>";
      break;
    }
    echo "<td>" . $row['messcutdue'] . "</td>";
    echo "</tr>";
    ++$k;
  }
  }
  }
  ?>

</body>
</html>