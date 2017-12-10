<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewcoupon.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="insidecoupon.php">Coupon/</a><a href="viewcoupons.php">ViewCoupons</a></strong>

  </html>
  <?php
  if($_SESSION['prcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else
  {
  include "header.php";
  include"dbconnect.php";
  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }
      $query = "select * from coupon";
      $query1 = "select * from latecoupon";
      $sql = mysqli_query($link,$query);
      $sql1 = mysqli_query($link,$query1);
$k=0;

    if((mysqli_num_rows($sql)==0))
    {
      echo"<br>";
      //echo"<h2>No data Found in Late Coupon</h2>";
    }
    else
    {
  echo "<br><br><table id='nj' border='4'><tr bgcolor='#D0D3D4'><th><h3>NORMAL COUPONS's</h3></th><th><h3>DATES</h3></th><th><h3>NAME</h3></th><th><h3>ROOM NO.</h3></th><th><h3>MENU</h3></th>
  <th><h3>BREAKFAST</h3></th><th><h3>LUNCH</h3></th><th><h3>TEA</h3></th><th><h3>TEA+SNACKS</h3></th><th><h3>SNACKS</h3></th><th><h3>MILK</h3></th><th><h3>DINNER</h3></th></tr>";
while($row= mysqli_fetch_array($sql))
{
  if($k%2==0)
  {
  echo "<tr bgcolor='#979A9A'>";
  echo "<td><p id='row'>" . $row['id'] . "</p></td>";
  echo "<td><p id='row'>" . $row['dates'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Name'] . "</p></td>";
  echo "<td><p id='row'>" . $row['room'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Menu'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Breakfast'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Lunch'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Tea'] . "</p></td>";
  echo "<td><p id='row'>" . $row['TeaSnacks'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Snacks'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Milk'] . "</p></td>";
  echo "<td><p id='row'>" . $row['Dinner'] . "</p></td>";

  echo "</tr>";
  ++$k;
}
else
{
echo "<tr bgcolor='#D0D3D4'>";
echo "<td><p id='row'>" . $row['id'] . "</p></td>";
echo "<td><p id='row'>" . $row['dates'] . "</p></td>";
echo "<td><p id='row'>" . $row['Name'] . "</p></td>";
echo "<td><p id='row'>" . $row['room'] . "</p></td>";
echo "<td><p id='row'>" . $row['Menu'] . "</p></td>";
echo "<td><p id='row'>" . $row['Breakfast'] . "</p></td>";
echo "<td><p id='row'>" . $row['Lunch'] . "</p></td>";
echo "<td><p id='row'>" . $row['Tea'] . "</p></td>";
echo "<td><p id='row'>" . $row['TeaSnacks'] . "</p></td>";
echo "<td><p id='row'>" . $row['Snacks'] . "</p></td>";
echo "<td><p id='row'>" . $row['Milk'] . "</p></td>";
echo "<td><p id='row'>" . $row['Dinner'] . "</p></td>";

echo "</tr>";
++$k;
}
}
echo "</table>";}
// echo"qwdqdeqd";
$k=0;
if((mysqli_num_rows($sql1)==0))
{
  echo"<br>";
  //echo"<h2>No data Found in Normal Coupon</h2>";
}
else {

// echo"sfvmek";
 echo "<br><br><table id='lj' border='4'><tr bgcolor='#D0D3D4'><th><h3>LATE COUPONS's</h3></th><th><h3>DATES</h3></th><th><h3>NAME</h3></th><th><h3>ROOM NO.</h3></th><th><h3>MENU</h3></th>
 <th><h3>BREAKFAST</h3></th><th><h3>LUNCH</h3></th><th><h3>TEA</h3></th><th><h3>TEA+SNACKS</h3></th><th><h3>SNACKS</h3></th><th><h3>MILK</h3></th><th><h3>DINNER</h3></th></tr>";
    while($ro= mysqli_fetch_array($sql1))
    {
      if($k%2==0)
      {
    echo "<tr bgcolor='#979A9A'>";
    echo "<td><p id='row'>" . $ro['id'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['dates'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Name'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['room'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Menu'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Breakfast'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Lunch'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Tea'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['TeaSnacks'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Snacks'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Milk'] . "</p></td>";
    echo "<td><p id='row'>" . $ro['Dinner'] . "</p></td>";

    echo "</tr>";
    $k++;
    }
    else
    {
  echo "<tr bgcolor='#D0D3D4'>";
  echo "<td><p id='row'>" . $ro['id'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['dates'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Name'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['room'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Menu'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Breakfast'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Lunch'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Tea'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['TeaSnacks'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Snacks'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Milk'] . "</p></td>";
  echo "<td><p id='row'>" . $ro['Dinner'] . "</p></td>";

  echo "</tr>";
  $k++;
  }
  }
    echo "</table>";
}

}


?>