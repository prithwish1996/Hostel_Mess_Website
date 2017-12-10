<?php session_start();?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a><a href="closestock.php">Establishment/</a><a href="establishment.php">ClosingStock/</a><a href="milk15.php">MilkforFirst15Days/</a><a href="milk30.php">MilkforSecond15Days/</a><a href="tpgc.php">TotalPermanentGuest/</a></strong>
</body>
</html>
<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {
  # code...

include"header.php";
include 'dbconnect.php';

if(isset($_POST['milk30']))
{

$milk30 = mysqli_real_escape_string($link, $_POST['milk30']);
// echo"$tpgc";
$query = "UPDATE billfactors  SET milk30='$milk30' where id=1";
mysqli_query($link,$query);
}
}
// echo 'done';

?>



<HTML>
<head>
<title>Total Permanent Guest Charge</title>

</head>
<body>

<form action="totalfine.php" method="post">

<font id="establishment" color="white">Total Permanent Guest Charge</font><br><br>
<input type="number" step="0.01" min="0"  name="tpgc" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>