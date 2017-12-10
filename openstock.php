<?php session_start(); ?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a></strong>
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

$milk = mysqli_real_escape_string($link, $_POST['milk']);
$query = "UPDATE billfactors  SET milk='$milk' where id=1";
mysqli_query($link,$query);
}
// echo 'done';

?>

<HTML>
<head>
<title>Opening Stock</title>

</head>
<body>

<form action="closestock.php" method="post">

<font id="establishment" color="white">Opening Stock</font><br><br>
<input type="number" step="0.01" min="0" name="opstock" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>