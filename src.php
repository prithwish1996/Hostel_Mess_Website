<?php session_start();?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a><a href="closestock.php">Establishment/</a><a href="establishment.php">ClosingStock/</a><a href="milk15.php">MilkforFirst15Days/</a><a href="milk30.php">MilkforSecond15Days/</a><a href="tpgc.php">TotalPermanentGuest/</a><a href="totalfine.php">TotalFine/</a><a href="src.php">SRC</a></strong>
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

if(isset($_POST['tf']))
{

$tf = mysqli_real_escape_string($link, $_POST['tf']);
// echo"$tpgc";
$query = "UPDATE billfactors  SET total_fine='$tf' where id=1";
mysqli_query($link,$query);
}
}
// echo 'done';

?>



<HTML>
<head>
<title>Service Charge</title>

</head>
<body>

<form action="generate.php" method="post">

<font id="establishment" color="white">Service Charge+Domain Charges</font><br><br>
<input type="number" step="0.01" min="0"  name="src" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>