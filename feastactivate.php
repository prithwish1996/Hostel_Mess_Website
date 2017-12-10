<?php session_start();
?>
<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else{
	include"dbconnect.php";
	$query1 = "select id from feastactivate";
	$q1 = mysqli_query($link,$query1);
	while($row1 = mysqli_fetch_array($q1))
	{
		if($row1[0]==1)
		{
			$query2 = "update feastactivate set id='0'";
			if(mysqli_query($link,$query2))
			{
				echo ' <script type="text/javascript">
             alert("Feast has Been Successfully Deactivated");
            </script>
          ';
			}

		


		}
		else
		{
			$query2 = "update feastactivate set id='1'";
			if(mysqli_query($link,$query2))
			{
				echo ' <script type="text/javascript">
             alert("Feast has Been Successfully Activated");
            </script>
          ';
			}

		


		}
	}
	echo"<script>window.open('feasthome.php','_self');</script>";
}