<?php session_start(); ?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a></strong>
</body>
</html>
<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {


include "header.php";
include 'dbconnect.php';

$coupon = mysqli_real_escape_string($link, $_POST['coupon']);
$query = "UPDATE billfactors  SET coupon='$coupon' where id=1";
mysqli_query($link,$query);
}
// echo 'done';

?>

<HTML>
<head>
<title>Total Extra</title>

</head>
<body>

<form action="milkamount.php" method="post">

<font id="establishment" color="white">Total Extra</font><br><br>
<input type="number" step="0.01" min="0" name="extra" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>