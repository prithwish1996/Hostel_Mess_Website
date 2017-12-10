<?php session_start();
?>
<HTML>
<head>
<title>Athulya Girls Hostel</title>
<link rel="stylesheet" href="feast2.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastoutview.php">FeastOutList/</a></a></strong>
<h2 align="center"><b><u>FEAST OUT LIST</u></b></h2>
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
include"header.php";
include"dbconnect.php";
$query1 = "select * from feastout";
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
echo"</table>";
?>
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to Remove this ID\'s from FEAST OUT LIST?')" name="submit" value="Remove"></form>
<?php
if(isset($_POST['submit']))
{
	// $num = mysqli_num_rows($q1);
	$query1 = "select * from feastout";
$q1 = mysqli_query($link, $query1);
	// echo"$num";
	// $loop = 0;
	$flag=0;
	while($row1=mysqli_fetch_array($q1))
	{

		// echo"$row1[0]";
		if (isset($_POST[''.$row1[0].'']))
		{
			$id = $row1[0];
			
			 // echo"$id";
			// echo"<br>ascae<br>";
			//  echo"$name<br>";
			$query2 = "delete from feastout where ID='$id'";
			if(mysqli_query($link,$query2))
			{
				$flag=1;

			}
			else
			{
						die(mysqli_error($link));
						break;
			}
		
		
		}
		// $loop = $loop + 1;
	}
	if($flag==1)
	{
		echo ' <script type="text/javascript">
     alert(" Selected ID\'s are Successfully Deleted from the Feast Out List");
    </script>
  ';
	}	
	// echo"<br>$loop";
	echo'<script>window.open("feastoutview.php","_self");</script>';
	
}

echo"<button id='viewfo' class='print' onclick='myFunction()'>Print This Page</button><script>function myFunction(){window.print()}</script>";
}

?>
