<?php session_start();
?>
<HTML>
<head>
<title>Athulya Girls Hostel</title>
<link rel="stylesheet" href="feast2.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastout.php">FeastOut/</a></a></strong>
<h2 align="center"><b><u>FEAST OUT</u></b></h2>
</body>
</html>
<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include"dbconnect.php";
include"header.php";
$query1 = "select * from users";
$q1 = mysqli_query($link, $query1);


echo'<form method = "post"><table border="4"> 
<tr bgcolor="#979A9A"><th>ID</th><th>NAMES</th><th>CHECKBOX</th></tr>';
while($row1=mysqli_fetch_array($q1))
{
	echo"<tr>";
	echo "<td>" . $row1[0] . "</td>";
	echo "<td>" . $row1[1] . "</td>";
	echo"<td><input type='checkbox' name='$row1[0]' value='$row1[0]'></td>";
	echo"</tr>";
	
}
echo"</table>";?>
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to Add this ID\'s in FEAST OUT LIST?')" name="submit" value="Submit"></form>
<?
if(isset($_POST['submit']))
{
	$num = mysqli_num_rows($q1);
	$query1 = "select * from users";
$q1 = mysqli_query($link, $query1);
	// echo"$num";
	// $loop = 0;
	while($row1=mysqli_fetch_array($q1))
	{

		// echo"$row1[0]";
		if (isset($_POST[''.$row1[0].'']))
		{
			$id = $row1[0];
			$name =$row1[1];
			// echo"hi";
			// echo"<br>ascae<br>";
			//  echo"$name<br>";
			$query2 = "insert into feastout values ('$id','$name')";
			mysqli_query($link,$query2);
		
		
		}
		// $loop = $loop + 1;
	}	
	// echo"<br>$loop";
	echo ' <script type="text/javascript">
     alert("ID\'s are Successfully Added in the FeastOut List");
    </script>
  ';
}

echo"<button id='viewfo' onclick='myFunction()'>View Feast Out List</button><script>function myFunction(){window.open('feastoutview.php','_self')}</script>";
}


?>
