<?php session_start();
?>
<html>
<link rel="stylesheet" href="generate.css">
<body>
<div class="background"></div>
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

$opstock = mysqli_real_escape_string($link, $_POST['opstock']);
$query = "UPDATE billfactors  SET openstock='$opstock' where id=1";
mysqli_query($link,$query);

}

?>

<HTML>
<head>
<title>Closing Stock</title>

</head>
<body>

<form action="establishment.php" method="post">

<font id="establishment" color="white">Closing Stock</font><br><br>
<input type="number" step="0.01" min="0" name="closestock" required><br><br>
<input id="submit" type="submit" name="submit" value="Submit">

</form>

</body>
</HTML>