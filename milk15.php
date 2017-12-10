<?php session_start();
?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a><a href="closestock.php">Establishment/</a><a href="establishment.php">ClosingStock/</a><a href="milk15.php">MilkforFirst15Days/</a></strong>
</body>
</html>
<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include"header.php";
include 'dbconnect.php';

if(isset($_POST['establishment']))
{

$establishment = mysqli_real_escape_string($link, $_POST['establishment']);
$query = "UPDATE billfactors  SET establishment='$establishment' where id=1";
mysqli_query($link,$query);
}
}
// echo 'done';

?>

<HTML>
<head>
<title>Milk for 1st 15 Days</title>

</head>
<body>

<form action="milk30.php" method="post">

<font id="establishment" color="white">Milk Amount for first 15 days</font><br><br>
<input type="number" step="0.01" min="0" name="milk15" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>