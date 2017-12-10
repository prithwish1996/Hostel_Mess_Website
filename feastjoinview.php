<?php session_start();
?>
<HTML>
<head>
<title>Athulya Girls Hostel</title>
<link rel="stylesheet" href="feast2.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastjoinhome.php">FeastJoinHome/</a><a href="feastjoinview.php">ViewFeastJoin/</a></strong>
<h2 align="center"><b><u>VIEW FEAST JOIN</u></b></h2>
</body>
</html>

<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {
include"header.php";
include"dbconnect.php";
$query1 = "select * from feastjoin";
$q1 = mysqli_query($link,$query1);

echo"<table border='3'><tr><th>ID's</th><th>NAMES</th><th>MENU</th></tr>";
while($row1 = mysqli_fetch_array($q1))
{
	$query2 = "select * from users where ID='$row1[0]'";
	$q2 = mysqli_query($link,$query2);
	while($row2 = mysqli_fetch_array($q2))
	{

		echo"<tr><td>$row1[0]</td><td>$row2[1]</td><td>$row1[1]</td></tr>";

	}
}
}




?>