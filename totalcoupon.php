<?php session_start(); ?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong>  <a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a></strong>
</body>
</html>
<HTML>
<head>
<title>Total Coupon Charge</title>

</head>
<body>

<form action="extra.php" method="post">

<font id="establishment" color="white">Total Coupon Charge</font><br><br>
<input type="number" step="0.01" min="0" name="coupon" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>
<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {


include"dbconnect.php";
include"header.php";
}
 ?>