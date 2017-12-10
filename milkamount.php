<?php session_start(); ?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a></strong>
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

include "header.php";
include 'dbconnect.php';


if(isset($_POST['extra']))
{

$extra = mysqli_real_escape_string($link, $_POST['extra']);
$query = "UPDATE billfactors  SET extra='$extra' where id=1";
mysqli_query($link,$query);
// echo 'done';
}

}

?>

<HTML>
<head>
<title>Total Milk Amount</title>

</head>
<body>

<form action="openstock.php" method="post">

<font id="establishment" color="white">Total Milk Amount</font><br><br>
<input type="number" step="0.01" min="0" name="milk" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>